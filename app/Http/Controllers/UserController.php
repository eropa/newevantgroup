<?php

namespace App\Http\Controllers;

use App\Models\Infoblok;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user_admin(){
        $this->authorize('isAdmin', User::class);
        return view('back.users.admin');
    }

    public function user_infoblock(){
        $this->authorize('isAdmin', User::class);
        $datas=Infoblok::all();
        return view('back.infoblock.index',['datas'=>$datas]);
    }
}
