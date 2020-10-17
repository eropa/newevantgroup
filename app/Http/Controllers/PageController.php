<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $data=array();
        $tite="EvantGroup - мебель на заказ";
        
        return view('front.index');
    }
}
