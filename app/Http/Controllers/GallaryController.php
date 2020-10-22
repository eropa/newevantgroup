<?php

namespace App\Http\Controllers;

use App\Models\Fotocat;
use App\Models\Gallary;
use App\Models\Menu;
use App\Models\Page;
use Illuminate\Http\Request;

class GallaryController extends Controller
{

    public function showlist()
    {
        // получаем данные по slug
        $datas=Fotocat::all();
        // проверка есть такое или нет
        if(is_null($datas))
            return abort(404);
        //пказываем предстовление
        $menus1=Menu::where('pos_id',1)->get();
        $menus2=Menu::where('pos_id',2)->get();
        return view('front.gallary',[ 'menus1'=>$menus1,
            'menus2'=>$menus2,'tite'=>"Фото галлерея работ",'datas'=>$datas]);
    }

    public function showfoto($id){
        // получаем данные по slug
        $datas=Fotocat::all();
        $galData=Fotocat::find($id);
        $gallary=Gallary::where('fotocat_id',$id)->get();
        //пказываем предстовление
        $menus1=Menu::where('pos_id',1)->get();
        $menus2=Menu::where('pos_id',2)->get();
        return view('front.showgallary',[ 'menus1'=>$menus1,
            'gallary'=>$gallary,
            'galData'=>$galData,
            'menus2'=>$menus2,
            'tite'=>"Фото галлерея работ",'datas'=>$datas]);
    }

    /*
     *
     */
    public function showfotoAdmin($id){
        $datas=Gallary::where('fotocat_id',$id)->get();
        return view('back.gallary.index',['datas'=>$datas]);
    }

}
