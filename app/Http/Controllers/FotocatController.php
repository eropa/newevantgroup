<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Fotocat;
use App\Models\Page;
use App\User;
use Illuminate\Http\Request;

class FotocatController extends Controller
{
    public function fotocat(){
        $this->authorize('isAdmin', User::class);
        $datas=Fotocat::all();
        return view('back.fotocat.index',['datas'=>$datas]);
    }

    public function edit($id){
        $this->authorize('isAdmin', User::class);
        $data=Fotocat::find($id);
        if(is_null($data))
            abort(404);
        return view('back.fotocat.edit',['data'=>$data]);
    }


    public function update(Request $request){
        $model=Fotocat::find($request->input('id'));
        $model->name=$request->input('name');
        if($request->file('foto')){
            $file = $request->file('foto');
            $destinationPath = 'gal_type';
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move($destinationPath,$fileName);
            $model->file_name=$fileName;
        }
        $model->save();
        return redirect()->route('admin.fotocat');
    }
}
