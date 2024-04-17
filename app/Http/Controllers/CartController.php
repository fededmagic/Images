<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Order;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller {

    public function index(Request $request) {

        $totale = 0;

        $imagesInSession = $request->session()->get("images");

        $imagesDetail = []; //informazioni di tutte le immagini in carrello

        if($imagesInSession != null) {

            $imagesDetail = Image::findMany(array_keys($imagesInSession));

            $totale = Image::calculateTotal($imagesDetail, $imagesInSession);
        }  

        $viewData["title"] = "Carrello";
        $viewData["subtitle"] = "Lista immagini nel carrello";

        $viewData["images"] = $imagesDetail;
        $viewData["total"] = $totale;
        $viewData["update_balance"] = Auth::user()->getBalance() - $totale;

        return view("cart.index")->with("viewData", $viewData);
    }

    public function add(Request $request, $id) {

        $imagesInSession = $request->session()->get("images");
        $imagesInSession[$id] = $request->input("qta");

        $request->session()->put("images", $imagesInSession);

        return redirect()->route("cart.index");
    }

    public function clear(Request $request) {

        //azzera gli elementi della sessione
        $request->session()->forget("images");

        return back();
    }

    public function delete(Request $request, $id) {

        $request->session()->forget("images." . $id);

        return back();
    }

    public function purchase(Request $request) {

        $viewData = [];
        $imagesInSession = $request->session()->get("images");
        $userId = Auth::user()->getId();

        $order = new Order();
        $order->setUserId($userId);

        $imagesDetail = Image::findMany(array_keys($imagesInSession));
        $total = Image::calculateTotal($imagesDetail, $imagesInSession);

        $order->setTotal($total);
        $order->save();

        foreach($imagesDetail as $image) {

            $quantity = $imagesInSession[$image->getId()];
            $item = new Item();
            $item->setQuantity($quantity);
            $item->setValue($image->getValue());
            $item->setOrderId($order->getId());
            $item->setImageId($image->getId());
            $item->save();
        }

        $string = $request->tipologia;
        if($string == "Portafoglio virtuale") {

            $newBalance = Auth::user()->setBalance(Auth::user()->getBalance() - $total);
            if($newBalance < 0) {
                return redirect()->route("myaccount.balance");
            }

            $balanceUpdate = Auth::user()->getBalance();
            Auth::user()->save();

            $viewData["strPagamento"] = "Portafoglio virtuale aggiornato con successo!";
            $viewData["balance"] = "Il tuo portafoglio ammonta a €" . $balanceUpdate;
        }
        else {

            $viewData["strPagamento"] = "Ricordati di preparare i soldi alla consegna";
            $viewData["balance"] = "";
        }

        $request->session()->forget("images");

        $viewData["title"] = "Riepilogo ordine";
        $viewData["subtitle"] = "Riepilogo ordine";
        $viewData["order"] = $order;

        return view("cart.purchase")->with("viewData", $viewData);
    }
} 

?>