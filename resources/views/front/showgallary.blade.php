@extends('front.app')

@section('content')
    <!-- Catalog -->
    <div class="catalog">
        <div class="container">
            <div class="catalog__inner">
                <div class="catalog__title">{{$galData->name}}</div>
                <div class="catalog__list">
                    @foreach($gallary as $item)
                        <div class="catalog__gallery"
                             style="background: url(/gallary/{{$item->file_name}}) #ffffff center no-repeat;
                            background-size: cover;">
                        </div>
                    @endforeach

                    <div class="catalog__background"></div>
                </div>

                <div class="categories__filtres">
                    <div class="categories">
                        <div class="categories__title">Категория</div>
                        <section class="accordion">
                            @foreach($datas as $data)
                                <div>
                                    <input id="ac-1" name="accordion-1" type="checkbox"/>
                                    <label for="ac-1" class="accordion__label">
                                        <div class="arrow">
                                            <span class="arrow-left"></span>
                                            <span class="arrow-right"></span>
                                        </div><span>  <p><a href="{{route('gallary.foto',['id'=>$data->id])}}">{{$data->name}}</a></p></span>
                                    </label>
                                </div>
                            @endforeach
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Catalog Info -->
    <div class="catalog__info">
        <div class="container">
            <div class="catalog__text">
                <h1>На данной страницы представлены работы выполенены Нами.</h1>
            </div>
        </div>
    </div>
@endsection
