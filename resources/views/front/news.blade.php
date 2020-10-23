@extends('front.app')

@section('content')
    <div class="catalog">
        <div class="container">
            <div class="catalog__inner">
                <div class="catalog__title">НОВОСТИ КОМПАНИИ “Б<span>ыт</span> МЕБЕЛЬ”</div>
                <div class="catalog__sort__news">
                    <form action="#" method="post" enctype="multipart/form-data">
                        <div class="catalog__sort__title">Сортировать по:</div>
                        <select name="sort">
                            <option value="new">Новые</option>
                            <option value="old">Старые</option>
                        </select>
                    </form>
                </div>
                <div class="catalog__list catalog__info">
                    @foreach($datas as $data)
                        <div class="catalog__info__item">
                            <img class="catalog__info__img" src="{{ asset('news/'.$data->foto_file)}}" alt="">
                            <div class="catalog__info__text">
                                <div class="catalog__info__title">{{ $data->title}}</div>
                                <div class="catalog__info__subtitle">
                                    <a href="{{ route('page.news.detal',['id'=>$data->id ])}} ">
                                        {!!  $data->small_html !!}
                                        <span>...</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="catalog__background"></div>
                </div>
            </div>
        </div>
    </div>
@endsection


