<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;

class ShopController extends Controller
{
    public function index($id){
        $menus1=Menu::where('pos_id',1)->get();
        $menus2=Menu::where('pos_id',2)->get();
        $datas=$this->getDataApi($id);
        $datas=json_decode($datas);
        $datagroups=json_decode(  $this->getGroupList());




        return view('front.shopgroup',[
            'tite'=>"EvantGroup - мебель на заказ",
            'menus1'=>$menus1,
            'datas'=>$datas,
            'datagroups'=>$datagroups,
            'menus2'=>$menus2,'id'=>$id]);
    }

    protected function getGroupList(){
        $url = env('sklad_url')."api/getcategshop";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

    protected function getDataApi($id){
        $url = env('sklad_url')."api/getshop";
        $post_data = array (
            "group_id" => $id,
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

    public function clearCard(Request $request){
        $request->session()->flush();
    }


    public function deletecards(Request $request){
        if ($request->session()->has('cardbuy')) {
            /**
             * Если товар есть в корзине
             */
            $arraSaveSession=array();
            $datas= session('cardbuy');
            foreach ($datas as $data){
                if($data['id']!=$request->input('tovarid')){
                    $arraSaveSession[]=$data;
                }
            }
            $request->session()->put('cardbuy', $arraSaveSession);
        }
        $datas= session('cardbuy');
        $html= view('front.cardshow',['datas'=>$datas])->render();
        return $html;
    }

    public function sendzakaz(Request $request){
        $datas= session('cardbuy');
        $user=Auth::user();

        $url = env('sklad_url')."api/setzaivka";
        $ch = curl_init();
        $post_data = array (
            "datazaivka" => json_encode($datas),
            "user_id"=>$user->id,
            "comment"=>"-------"
        );
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        $output = curl_exec($ch);
        curl_close($ch);

        Mail::send(['text'=>'mailzakaz'], ['datas'=>$datas,'user'=>$user],function($message) {
            $message->to('eropa@live.ru', 'клиент')->subject
            ('Заявка с сайта на товар ');
            $message->from('evantmailryb@gmail.com','No replay');
        });
       Mail::send(['text'=>'mailzakaz'], ['datas'=>$datas,'user'=>$user],function($message) {
            $message->to('jenika06@mail.ru', 'клиент')->subject
            ('Заявка с сайта на товар');
            $message->from('evantmailryb@gmail.com','No replay');
        });
        $request->session()->flush();
        return 1;
    }


}
