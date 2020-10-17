<?php

namespace App\Http\Controllers;

use App\Models\Infoblok;
use App\User;
use Illuminate\Http\Request;

class InfoblokController extends Controller
{
    public function edit($id)
    {
        $this->authorize('isAdmin', User::class);

        $data=Infoblok::where('id',$id)->first();
        if(is_null($data))
            return abort(404);
        return view('back.infoblock.edit',['data'=>$data]);
    }

    public function update(Request $request){
        $this->authorize('isAdmin', User::class);
        $model=Infoblok::find($request->input('id'));
        $model->text_html=$request->input('text_html');
        $model->save();
        return redirect()->route('admin.infoblock');

    }
}
