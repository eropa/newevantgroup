<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mail;

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

    public function sendZaivka(Request $request){
        $data = array('name'=>$request->input('text'));

        Mail::send(['text'=>'mail'], $data, function($message) {
            $message->to('eropa@live.ru', 'клиент')->subject
            ('Заявка с сайта');
            $message->from('evantmailryb@gmail.com','No replay');
        });
        Mail::send(['text'=>'mail'], $data, function($message) {
            $message->to('jenika06@mail.ru', 'клиент')->subject
            ('Заявка с сайта');
            $message->from('evantmailryb@gmail.com','No replay');
        });
        return 1;
    }


    public function addtovar(Request $request){
        //  $request->session()->forget('cardbuy');
        if ($request->session()->has('cardbuy')) {
            /**
             * Если товар есть в корзине
             */
            $arraSaveSession=array();
            $iFlag=0;
            $datas= session('cardbuy');
            foreach ($datas as $data){
                if($data['id']==$request->input('tovarid')){
                    $iFlag++;
                    $arrayAdd=array('id'=>$request->input('tovarid'),
                        'name'=>$request->input('tovarname'),
                        'price'=>$request->input('price'),
                        'counttovar'=>($request->input('counttovar')+$data['counttovar']));
                }else{
                    $arrayAdd=$data;
                }
                $arraSaveSession[]=$arrayAdd;
            }
            if($iFlag==0){
                $arrayAdd=array('id'=>$request->input('tovarid'),
                    'name'=>$request->input('tovarname'),
                    'price'=>$request->input('price'),
                    'counttovar'=>$request->input('counttovar'));
                $arraSaveSession[]=$arrayAdd;
            }
            $request->session()->put('cardbuy', $arraSaveSession);
        }else {
            /**
             * Если корзина пуста то добовляем сюда
             */
            $arrayAdd=array('id'=>$request->input('tovarid'),
                            'name'=>$request->input('tovarname'),
                            'price'=>$request->input('price'),
                            'counttovar'=>$request->input('counttovar')
                );
            $request->session()->push('cardbuy', $arrayAdd);
        }
        return 1;
    }

    public function getCardBuy(){
        $datas= session('cardbuy');
        $html= view('front.cardshow',['datas'=>$datas])->render();
        return $html;
    }

}
