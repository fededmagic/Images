<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller{

    public function index() {

        $viewData = [];
        $viewData['title'] = 'Un sito figo di foto dal drone';
        $viewData['subtitle'] = 'Foto dal drone';
    
        return view('home.index')->with("viewData", $viewData);
    }

    public function about() {

        $viewData = [];
        $viewData['title'] = 'Chi siamo';
        $viewData['subtitle'] = 'Come nascono le foto del drone';
        $viewData['description'] = 'DJI Mavic Mini';
        $viewData['author'] = 'Con il supporto di RAI Storia';
    
        return view('home.about')->with("viewData", $viewData);
    }
}

?>