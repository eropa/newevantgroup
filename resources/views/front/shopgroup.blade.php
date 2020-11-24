@extends('front.app')

@section('content')
    <div class="catalog">
        <div class="container">
            <div class="catalog__inner">
                <div class="catalog__title">Мебельная фурнитура и комплектующие для мебели</div>
                <div class="catalog__list">

                    @foreach($datas as $data)
                        @if($data->type=="group")
                        <div class="catalog__list__item" style="
                                background: url(http://sklad.evantgroup.com/groups/{{$data->image}}) center no-repeat;
                                background-size: cover;">
                            <div class="catalog__link">
                                <a href="{{ route('shop.showgroup',['id'=>$data->id]) }}">{{$data->name}}</a>
                            </div>
                        </div>
                        @else
                            <div class="catalog__value__item">
                                <div class="list__item__info">
                                    <div class="list__item__img">
                                        <img
                                            style="max-width: 60%;"
                                            src="http://sklad.evantgroup.com/ass_tovar/{{$data->image}}" alt="">
                                    </div>
                                    <div class="list__item__text">
                                        <div class="list__item__name">{{$data->name}}</div>
                                        <div class="list__item__acticle">{{$data->id}}</div>
                                    </div>
                                </div>
                                <div class="list__item__value">
                                    <div class="list__item__price">{{$data->price}} р.</div>
                                    <div class="list__item__basket  js-open-modal addcards"
                                         data-tovarid="{{$data->id}}"
                                         data-tovarname="{{$data->name}}"
                                         data-tovarprice="{{$data->price}}"
                                         data-modal="1"
                                    ></div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <div class="catalog__background"></div>
                </div>

                <div class="categories__filtres">
                    <div class="categories">
                        <div class="categories__title">Категории товаров</div>
                        @foreach($datagroups as $itemgroup)
                            <li>{{$itemgroup->id}} {{$itemgroup->name}}</li>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
