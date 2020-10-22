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
}
