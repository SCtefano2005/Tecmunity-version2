<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('main');
    }
    public function account(){
        return view('Tecmunity.account');
    }
    public function informationPersonal(){
        return view('Tecmunity.infoPersonal');
    }
}
