<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index($id){
        $menus1=Menu::where('pos_id',1)->get();
        $menus2=Menu::where('pos_id',2)->get();
        $datas=$this->getDataApi($id);
        $datas=json_decode($datas);


        return view('front.shopgroup',[
            'tite'=>"EvantGroup - мебель на заказ",
            'menus1'=>$menus1,
            'datas'=>$datas,
            'menus2'=>$menus2,'id'=>$id]);
    }

    protected function getDataApi($id){
        $url = env('sklad_url')."api/getshop";
        $post_data = array (
            "group_id" => $id,
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }


}
