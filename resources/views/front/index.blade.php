@extends('front.app')

@section('content')
    <!-- Intro -->
    <div class="intro">
        <div class="container">
            <div class="intro__inner">
                <div class="intro__fon">
                    <img src="img/intro/Intro.png" alt="">
                    <div class="intro__about">
                        <div class="intro__about__item">
                            {!!$infoblock_list1->text_html!!}
                            @can('isAdmin', \App\User::class)
                                <hr><br>
                                <a style="color: black" href="{{route('admin.infoblock.edit',['id'=>$infoblock_list1->id])}}" >
                                    edit
                                </a>
                            @endcan
                        </div>

                        <div class="intro__about__item">
                            {!!$infoblock_list2->text_html!!}
                            @can('isAdmin', \App\User::class)
                                <hr><br>
                                <a style="color: black" href="{{route('admin.infoblock.edit',['id'=>$infoblock_list2->id])}}" >
                                    edit
                                </a>
                            @endcan
                        </div>

                        <div class="intro__about__item">
                            {!!$infoblock_list3->text_html!!}
                            @can('isAdmin', \App\User::class)
                                <hr><br>
                                <a style="color: black" href="{{route('admin.infoblock.edit',['id'=>$infoblock_list3->id])}}" >
                                    edit
                                </a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="intro__colum">
                    <div class="intro__colum__inner">
                        <div class="intro__event">Новость<br>Акция</div>
                        <div class="intro__news">
                            <div class="intro__news__info">
                                {!!$infoblock1->text_html!!}
                                @can('isAdmin', \App\User::class)
                                    d
                                    <hr>
                                    <a href="{{route('admin.infoblock.edit',['id'=>$infoblock1->id])}}" >
                                        edit
                                    </a>
                                @endcan
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Gallery -->
    <div class="gallery">
        <div class="container">
            <div class="gallery__inner">
                <div class="gallery__title">Галерея</div>
                <fotoindex-component></fotoindex-component>

            </div>
        </div>
    </div>
    <!-- Contacts -->
    <div class="contacts">
        <div class="container">
            <div class="contacts__inner">
                <div class="contacts__title">Контакты</div>
                <div class="contacts__list">
                    <div class="contacts__item">
                        {!!$podval1->text_html!!}
                        @can('isAdmin', \App\User::class)
                            <hr>
                            <a href="{{route('admin.infoblock.edit',['id'=>$podval1->id])}}"
                                style="color: black"
                                >
                                edit
                            </a>
                        @endcan
                    </div>
                    <div class="contacts__item">
                        {!!$podval2->text_html!!}
                        @can('isAdmin', \App\User::class)
                            <hr>
                            <a href="{{route('admin.infoblock.edit',['id'=>$podval2->id])}}"  style="color: black">
                                edit
                            </a>
                        @endcan
                    </div>
                    <div class="contacts__item">
                        {!!$podval3->text_html!!}
                        @can('isAdmin', \App\User::class)
                            <hr>
                            <a href="{{route('admin.infoblock.edit',['id'=>$podval3->id])}}"  style="color: black">
                                edit
                            </a>
                        @endcan
                    </div>
                    <div class="contacts__item">
                        {!!$podval4->text_html!!}
                        @can('isAdmin', \App\User::class)
                            <hr>
                            <a href="{{route('admin.infoblock.edit',['id'=>$podval4->id])}}"  style="color: black">
                                edit
                            </a>
                        @endcan
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection
