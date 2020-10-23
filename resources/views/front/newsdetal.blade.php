@extends('front.app')

@section('content')


    <div class="catalog">
        <div class="container">
            <div class="catalog__inner news__list">
                <div class="catalog__title">{{$data->title}}</div>
                <div class="news__detail">
                    {{$data->small_html}}

                    <br>
                    {{$data->text_html}}
                </div>
                <div class="catalog__background"></div>
            </div>
        </div>
    </div>

@endsection




