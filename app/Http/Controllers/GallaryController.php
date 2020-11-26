<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Fotocat;
use App\Models\Gallary;
use App\Models\Menu;
use App\Models\Page;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $this->authorize('isAdmin', User::class);
        $datas=Gallary::where('fotocat_id',$id)->get();
        return view('back.gallary.index',['datas'=>$datas]);
    }

    public function storefoto(){
        $this->authorize('isAdmin', User::class);
        $datas=Fotocat::all();
        return view('back.gallary.add',['datas'=>$datas]);
    }

    public function createfoto(Request $request){
        $this->authorize('isAdmin', User::class);
        $model=new Gallary();
        $model->slug=$request->input('slug');
        $model->fotocat_id=$request->input('fotocat_id');
        $model->name=$request->input('name');
        if($request->file('file_name')){
            //   File::put("files/abc.txt", "This is content in txt file");
            $file = $request->file('file_name');
            $destinationPath = 'gallary';
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move($destinationPath,$fileName);
            $model->file_name=$fileName;
        }
        $model->save();
        return redirect()->route('admin.gallarylist',['id'=>$request->input('fotocat_id')]);
    }

    public function deletefoto($id){
        $this->authorize('isAdmin', User::class);
        Gallary::destroy($id);
        return redirect()->back();
    }

    public function deletecatfoto($id){
        $this->authorize('isAdmin', User::class);
        Fotocat::destroy($id);
        return redirect()->back();
    }

    public function edit($id){
        $this->authorize('isAdmin', User::class);
        $data=Gallary::find($id);
        if(is_null($data))
            abort(404);
        $cats=Fotocat::all();
        return view('back.gallary.edit',['data'=>$data,'cats'=>$cats]);
    }

    public function updatedate(Request $request){
        $this->authorize('isAdmin', User::class);
        $model=Gallary::find($request->input('id'));
        if(is_null($model))
            abort(404);
        $model->slug=$request->input('slug');
        $model->fotocat_id=$request->input('fotocat_id');
        $model->name=$request->input('name');
        if($request->file('file_name')){
            //   File::put("files/abc.txt", "This is content in txt file");
            $file = $request->file('file_name');
            $destinationPath = 'gallary';
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move($destinationPath,$fileName);
            $model->file_name=$fileName;
        }
        $model->save();
        return redirect()->route('admin.gallarylist',['id'=>$request->input('fotocat_id')]);
    }


}
