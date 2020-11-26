@extends('front.app')

@section('metateg')
    <meta name="og:url" content="{{ route('page.news.showfotourl',['id'=>$fotoData->id]) }}">
    <meta name="og:title" content="Мебель на заказ в г.Рыбница">
    <meta name="og:description" content="Мебель на заказ в г.Рыбница">
    <meta name="og:image" content="{{ asset('gallary/'.$fotoData->file_name)}}">
    <meta name="og:image:alt" content="{{ $fotoData->name}}">
@endsection

@section('content')
    <center>
        <img src="{{ asset('gallary/'.$fotoData->file_name)}}" style="width: 450px">
    </center>
@endsection
