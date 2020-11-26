@extends('front.app')

@section('content')
    <center>
        <img src="{{ asset('gallary/'.$fotoData->file_name)}}" style="width: 450px">
    </center>
@endsection
