<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class MyAccountController extends Controller {

    public function index() {

        $viewData = [];
        $viewData['title'] = 'Riepilogo ordini';
        $viewData['subtitle'] = 'I miei ordini';
        $viewData['orders'] = Order::where("user_id", Auth::user()->getId())->get();
    
        return view('myaccount.orders')->with("viewData", $viewData);
    }

    public function balance() {

        $viewData = [];
        $viewData['title'] = 'Riepilogo ordini';
        $viewData['subtitle'] = 'I miei ordini';
        $viewData['balance'] = Auth::user()->getBalance();
    
        return view('myaccount.balance')->with("viewData", $viewData);
    }

    public function update_balance() {

        $balance = Auth::user()->getBalance() * $request->input("importo");
        Auth::user()->setBalance($balance);

        return back();
    }
}