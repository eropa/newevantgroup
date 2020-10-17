<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    public function UserList(){
        $datas=User::all();
        return response()->json($datas);
    }

    public function UserStore(Request $request){
        $model=new User();
        $model->name=$request->input('addName');
        $model->email=$request->input('addEmai');
        $model->password= Hash::make($request->input('addPassword'));
        $model->role=$request->input('addRole');
        $model->save();
        return 1;
    }

    public function getFoto(Request $request){
        $data=Foto::all();
        return response()->json($data);
    }

}
