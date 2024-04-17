<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminImagesController extends Controller{

    public function index() {

        $viewData = [];
        $viewData['title'] = 'Pannello admin';
        $viewData['images'] = Image::all();

        return view('admin.images.index')->with("viewData", $viewData);
    }

    public function store(Request $request) {
        
        $this->formValidation($request);

        $newImage = new Image();
        $newImage->setName($request->input("name"));
        $newImage->setDescription($request->input("description"));
        $newImage->setValue($request->input("value"));
        $newImage->setUrl("noimg.jpg");

        $newImage->save();

        if($request->hasFile("url")) {

            $urlName = $this->saveImage($request, $newImage->getName());
            $newImage->setUrl($urlName);
            $newImage->save();
        }

        return back();
    }

    public function delete($id) {

        Image::destroy($id);
        return back();
    }

    public function edit($id) {

        $viewData = [];

        $viewData["image"] = Image::findOrFail($id);
        $viewData["title"] = "Modifica il prodotto " . $viewData["image"]->getName();

        return view("admin.images.edit")->with("viewData", $viewData);
    }

    public function update(Request $request, $id) {

        $this->formValidation($request);

        $image = Image::findOrFail($id);
        $image->setName($request->input("name"));
        $image->setDescription($request->input("description"));
        $image->setValue($request->input("value"));

        $image->save();

        if($request->hasFile("url")) {

            $urlName = $this->saveImage($request, $image->getName());
            $image->setUrl($urlName);
            $image->save();
        }

        return redirect()->route("admin.images.index");
    }
 
    private function formValidation(Request $request) {

        $request->validate([

            "name" => "required | max:255",
            "description" => "required",
            "value" => "required | numeric | gt:0",
            "url" => "image"
        ]);
    }

    private function saveImage(Request $request, $name) {

        $urlName = $name . "." . $request->file("url")->extension();
        Storage::disk('public')->put(
            $urlName,
            file_get_contents($request->file('url')->getRealPath())
        );

        return $urlName;
    }
}

?>