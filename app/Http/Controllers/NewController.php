<?php

namespace App\Http\Controllers;

use App\Models\Gallary;
use App\Models\Menu;
use App\Models\News;
use App\Models\Page;
use App\User;
use Illuminate\Http\Request;

class NewController extends Controller
{
    public function ListAdmin(){
        $datas=News::all();
        return view('back.news.index',['tite'=>"Новости",'datas'=>$datas]);
    }

    public function index(){
        //пказываем предстовление
        $menus1=Menu::where('pos_id',1)->get();
        $menus2=Menu::where('pos_id',2)->get();
        $datas=News::all();
        return view('front.news',[ 'menus1'=>$menus1,
            'menus2'=>$menus2,'tite'=>"Новости",'datas'=>$datas]);
    }



    public function show($id){
        //пказываем предстовление
        $menus1=Menu::where('pos_id',1)->get();
        $menus2=Menu::where('pos_id',2)->get();
        $data=News::find($id);
        return view('front.newsdetal',[ 'menus1'=>$menus1,
            'menus2'=>$menus2,'tite'=>$data->title,'data'=>$data]);
    }

    public function create(){
        return view('back.news.add');
    }

    public function store(Request $request){
        $this->authorize('isAdmin', User::class);
        $model=new News();
        $model->slug=$request->input('slug');
        $model->newcat_id=0;
        $model->title=$request->input('title');
        $model->text_html=$request->input('text_html');
        $model->small_html=$request->input('small_html');
        if($request->file('foto_file')){
            //   File::put("files/abc.txt", "This is content in txt file");
            $file = $request->file('foto_file');
            $destinationPath = 'news';
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move($destinationPath,$fileName);
            $model->foto_file=$fileName;
        }
        $model->save();
        return redirect()->route('admin.news.list');
    }

}
