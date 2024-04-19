<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImagesController extends Controller {
/*
    private static $images = [

        ['id' => 1, 'name' => 'Cuneo', 'description' => 'Foto aerea di Cuneo', 'url' => 'img02.jpg', 'value' => 9],
        ['id' => 2, 'name' => 'Entracque', 'description' => 'Foto aerea di Entracque', 'url' => 'img01.jpg', 'value' => 8],
        ['id' => 3, 'name' => 'Langhe', 'description' => 'Foto aerea delle Langhe', 'url' => 'img03.jpg', 'value' => 7],
        ['id' => 4, 'name' => 'Castellar', 'description' => 'Foto aerea del cuneese', 'url' => 'img04.jpg', 'value' => 8]
    ];
*/
    public function index() {

        $viewData['title'] = 'Lista immagini';
        $viewData['subtitle'] = 'Lista immagini';
        $viewData['images'] = Image::where("availability", 1)->get();
        
        return view('images.index')->with('viewData', $viewData);
    }

    public function show($id) {

        $image = Image::findOrFail($id);

        $viewData['title'] = 'Dettaglio - ' . $image->getName();
        $viewData['subtitle'] = 'Dettaglio foto ' . $image->getName();
        $viewData['image'] = $image;

        return view('images.show')->with('viewData', $viewData);
    }
}
?>