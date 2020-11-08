<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="content-type" content="text/htm" charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" type="text/css" href="slick/slick.css">
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css">
    <link rel="stylesheet" href="/style.css?v=3">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>{{$tite}}</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="google-site-verification" content="ESV6jPP7DnDCHN5HR35d13mElWwIKdmNyIzc8IP-D9k" />
    <script src="{{ asset('js/app.js') }}?v=3" defer></script>
</head>
<body>
<div id="app">
<!-- Pop Up -->
<div class="popUp">
    <div class="popUp__inner">
        @guest
        <div class="popUp__enter">
            <div class="popUp__title">Вход</div>
            <div class="popUp__subtitle">Я совершал здесь покупки и регистрировалься</div>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <input tabindex="1" type="text" name="email" class="popUp__input" placeholder="Логин" required>
                <br>
                <input tabindex="2" type="password" name="password" class="popUp__input"  placeholder="Пороль" required>

                <p><a class="popUplink" href="#">Забыли пароль?</a></p>

                <button class="enter__button popUp__button" tabindex="4" type="submit">Вход</button>
            </form>
        </div>
        <div class="popUp__line"></div>
        <div class="popUp__registration">
            <div class="popUp__title">Регистрация</div>

            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                <input tabindex="1" type="text" name="name" class="popUp__input input__registration" required placeholder="Ф.И.О.">
                <br>
                <input tabindex="2" type="text" name="email" class="popUp__input input__registration"  required placeholder="Логин">
                <br>
                <input tabindex="3" type="password" name="password" class="popUp__input input__registration"  required  placeholder="Пороль">

                <div class="popUp_custom">
                    <input tabindex="3" id="registration" class="popUp__checkbox"  type="checkbox" name="politic" value="yes" required>
                    <label for="registration" class="popUp__label">Я согласен с условиямми использования и обработки моих персональных данных.
                    </label>
                </div>

                <button class="registration__button popUp__button" tabindex="4" type="submit">Регистрация</button>
                @csrf
            </form>

        </div>
        @else
            <div class="popUp__enter">
                <div class="popUp__title">Панель управлеемя</div>

                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                 Выxод
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
             </div>
        @endguest
        <div class="popUp__close"></div>
    </div>
</div>


 <div class="popUpPhone">
     <div class="popUp__innerphone">
         <div class="popUp__enterphone" id="divZaivka">
             <div class="popUp__title">Бесплатный выезд на замеры и создание  проекта</div>
             <br>
             <input type="text"
                    id="phonezaivka"
                    name="phone" class="popUp__input"  placeholder="Номер телефона">
             <button class="registration__button popUp__button"  id="sendzaivka" >Отправить заявку</button>
         </div>
         <div class="popUp__close"></div>
     </div>
</div>

<div class="popUpKorzina">
    <div class="popUp__innerzakaz">
        <div class="popUp__enterphone" id="divZaivka">
            <div class="popUp__title">Корзина товара</div>
            <br>
              <div id="ShowCard">

              </div>
            </div>
        <div class="popUp__close"></div>
    </div>
</div>

<!-- Header -->
<div class="header">
    <div class="container">
        <div class="header__top">
            <nav class="header__nav">
                <ul>
                    @foreach($menus1 as $item)
                        <li><a  href="{{ url($item->slug) }}">{{$item->name}}</a></li>
                    @endforeach
                </ul>
            </nav>
        </div>
        <div class="header__middle">
            <div class="header__right">
                <img class="header__logo" src="{{ asset('img/header/logo.png') }}" alt="">
                <div class="header__address">Мебельное ателье <br> ул. Чернышевского 6А <br> www.evantgroup.com <br> 077749822, 077754155</div>
            </div>
            <div class="header__center">
                <button class="header__communication button">Обратная связь</button>
                <form action="#" method="post" enctype="multipart/form-data"><input type="text" name="search" class="header__search" placeholder="Поиск по сайту"></form>
            </div>
            <div class="header__left">
                @guest
                    <button class="header__enter button">Авторизация на сайте</button>
                    <button class="header__favourites"></button>
                    <button class="header__basket"></button>
                @else
                    <button class="header__enter button">Личный кабинет</button>
                    <button class="header__favourites"></button>
                    <button class="header__basket"></button>
                @endguest

            </div>
        </div>
    </div>
    <div class="header__bottom">
        <div class="container">
            <div class="header__bottom__inner">
                @foreach($menus2 as $item)
                    <div class="header__bottom__section "><a href="{{ url($item->slug) }}">{{$item->name}}</a></div>
                @endforeach
            </div>
        </div>
    </div>
</div>


@yield('content')

</div>



<!-- Footer -->
<footer class="footer">
</footer>



<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(68389318, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
    });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/68389318" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

</body>
</html>
