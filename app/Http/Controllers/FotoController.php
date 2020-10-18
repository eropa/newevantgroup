<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\User;
use Illuminate\Http\Request;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('isAdmin', User::class);
        $datas=Foto::all();
        return view('back.foto.index',['datas'=>$datas]);
    }


    public function add(){
        $this->authorize('isAdmin', User::class);
        return view('back.foto.add');
    }

    public function store(Request $request){
        $this->authorize('isAdmin', User::class);
        $model=new Foto();
        $model->name=$request->input('name');
        $model->about=$request->input('about');
        $model->fotocat_id=0;
        if($request->file('foto')){
         //   File::put("files/abc.txt", "This is content in txt file");
            $file = $request->file('foto');
            $destinationPath = 'fotomain';
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move($destinationPath,$fileName);
            $model->file_name=$fileName;
        }
        $model->save();
        return redirect()->route('admin.foto');
    }

    public function edit($id){
        $this->authorize('isAdmin', User::class);
        $data=Foto::find($id);
        return view('back.foto.edit',['data'=>$data]);
    }

    public function update(Request $request){
        $this->authorize('isAdmin', User::class);
        $model=Foto::find($request->input('id'));
        $model->name=$request->input('name');
        $model->about=$request->input('about');
        $model->fotocat_id=0;
        if($request->file('foto')){
            //   File::put("files/abc.txt", "This is content in txt file");
            $file = $request->file('foto');
            $destinationPath = 'fotomain';
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move($destinationPath,$fileName);
            $model->file_name=$fileName;
        }
        $model->save();
        return redirect()->route('admin.foto');
    }

}
