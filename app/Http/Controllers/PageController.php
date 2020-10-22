<?php

namespace App\Http\Controllers;

use App\Models\Infoblok;
use App\Models\Menu;
use App\Models\Page;
use App\User;
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

    public function showpage($slug){
        // получаем данные по slug
        $data=Page::where('slug',$slug)->first();
        // проверка есть такое или нет
        if(is_null($data))
            return abort(404);
        //пказываем предстовление
        $menus1=Menu::where('pos_id',1)->get();
        $menus2=Menu::where('pos_id',2)->get();
        return view('front.page',[ 'menus1'=>$menus1,
            'menus2'=>$menus2,'tite'=>$data->title,'data'=>$data]);
    }

    public function pagelist(){
        $this->authorize('isAdmin', User::class);
        $pages=Page::all();
        return view('back.page.index',['datas'=>$pages]);
    }

    public function create(){
        $this->authorize('isAdmin', User::class);
        return view('back.page.add');
    }

    public function store(Request $request){
        $this->authorize('isAdmin', User::class);
        $model=new Page();
        $model->title=$request->input('title');
        $model->slug=$request->input('slug');
        $model->keywords=$request->input('keywords');
        $model->descriptor=$request->input('descriptor');
        $model->html_code=$request->input('html_code');
        $model->save();
        return redirect()->route('admin.page');
    }
}
