@extends('front.app')

@section('metateg')
    <meta property="og:url"         content="{{ route('page.news.showfotourl',['id'=>$fotoData->id]) }}">
    <meta property="og:title"       content="Мебель на заказ в г.Рыбница">
    <meta property="fb:app_id"       content="148073311954254">
    <meta property="og:type"        content="article" />
    <meta property="og:description" content="Мебель на заказ в г.Рыбница">
    <meta property="og:image"       content="{{ asset('gallary/'.$fotoData->file_name)}}">
    <meta property="og:image:alt"   content="{{ $fotoData->name}}">
@endsection

@section('content')
    <center>
        <img src="{{ asset('gallary/'.$fotoData->file_name)}}" style="width: 450px">
    </center>
@endsection
