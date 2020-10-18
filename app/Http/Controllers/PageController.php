<?php

namespace App\Http\Controllers;

use App\Models\Infoblok;
use App\Models\Menu;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $menus1=Menu::where('pos_id',1)->get();
        $menus2=Menu::where('pos_id',2)->get();

        $infoblock1=Infoblok::where('slug','right_main')->first();
        $infoblock_list1=Infoblok::where('slug','item1_main')->first();
        $infoblock_list2=Infoblok::where('slug','item2_main')->first();
        $infoblock_list3=Infoblok::where('slug','item3_main')->first();
        $podval1=Infoblok::where('slug','podval1')->first();
        $podval2=Infoblok::where('slug','podval2')->first();
        $podval3=Infoblok::where('slug','podval3')->first();
        $podval4=Infoblok::where('slug','podval4')->first();



        return view('front.index',[
            'tite'=>"EvantGroup - мебель на заказ",
            'menus1'=>$menus1,
            'menus2'=>$menus2,
            'infoblock1'=>$infoblock1,
            'infoblock_list1'=>$infoblock_list1,
            'infoblock_list2'=>$infoblock_list2,
            'infoblock_list3'=>$infoblock_list3,
            'podval1'=>$podval1,
            'podval2'=>$podval2,
            'podval3'=>$podval3,
            'podval4'=>$podval4,
        ]);
    }
}
