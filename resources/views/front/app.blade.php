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

    @yield('metateg')

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
                <a href="{{ url('/') }}">
                    <img class="header__logo" src="{{ asset('img/header/logo.png') }}" alt="">
                </a>
                <div class="header__address">Мебельное ателье <br> ул. Чернышевского 6А <br> www.evantgroup.com <br> 077749822, 077754155</div>
            </div>
            <div class="header__center">
                <button class="header__communication button">Обратная связь</button>
                <form action="#" method="post" enctype="multipart/form-data"><input type="text" name="search" class="header__search" placeholder="Поиск по сайту"></form>
            </div>
            <div class="header__left">
                @guest
                    <button class="header__enter button">Авторизация на сайте</button>
                    <button class="header__basket"></button>
                @else
                    <button class="header__enter button">Личный кабинет</button>
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

    ym(69815521, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
    });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/69815521" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->


<!-- Несколько модальных окон -->
<div class="modal" data-modal="1">
    <!--   Svg иконка для закрытия окна  -->
    <svg class="modal__cross js-modal-close" xmlns="http://www.w3.org/2000/svg"               viewBox="0 0 24 24"><path d="M23.954 21.03l-9.184-9.095 9.092-9.174-2.832-2.807-9.09 9.179-9.176-9.088-2.81 2.81 9.186 9.105-9.095 9.184 2.81 2.81 9.112-9.192 9.18 9.1z"/></svg>
    <p class="modal__title"><b>Добавление товар в таблицу</b></p>
    <br><br>
    Товар : <b class="name_modal_tovar">Название товара</b><br>
    Количество : <input type="number" class="count_modal_tovar" min="0" max="99" value="0">
    <hr><br><br>
    <button class="addcard">Добавить в корзину</button>
</div>

<!-- Подложка под модальным окном -->
<div class="overlay js-overlay-modal"></div>

<style>
    /* Стили для подложки */

    .overlay {

        /* Скрываем подложку  */
        opacity: 0;
        visibility: hidden;

        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, .5);
        z-index: 20;
        transition: .3s all;
    }


    /* Стили для модальных окон */

    .modal {

        /* Скрываем окна  */
        opacity: 0;
        visibility: hidden;


        /*  Установаем ширину окна  */
        width: 100%;
        max-width: 500px;

        /*  Центрируем и задаем z-index */
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 30; /* Должен быть выше чем у подложки*/

        /*  Побочные стили   */
        box-shadow: 0 3px 10px -.5px rgba(0, 0, 0, .2);
        text-align: center;
        padding: 30px;
        border-radius: 3px;
        background-color: #fff;
        transition: 0.3s all;
    }


    /* Стили для активных классов подложки и окна */

    .modal.active{
        opacity: 1;
        z-index: 992;
        visibility: visible;
    }
    .overlay.active{
        opacity: 1;
        z-index: 991;
        visibility: visible;
    }


    /* Стили для кнопки закрытия */

    .modal__cross {
        width: 15px;
        height: 15px;
        position: absolute;
        top: 20px;
        right: 20px;
        fill: #444;
        cursor: pointer;
    }

</style>
<script>

</script>

<script>
    var modalButtons = document.querySelectorAll('.js-open-modal'),
        overlay      = document.querySelector('.js-overlay-modal'),
        closeButtons = document.querySelectorAll('.js-modal-close');

    $(document).on( "click", ".addcards", function() {
        var modalId = this.getAttribute('data-modal'),
            modalElem = document.querySelector('.modal[data-modal="1"]');
        var tovarname=$(this).data('tovarname');
        $('.name_modal_tovar').html(tovarname);
        $('.count_modal_tovar').val(0);
        $('.addcard').data('tovarname',$(this).data('tovarname'));
        $('.addcard').data('tovarid',$(this).data('tovarid'));
        $('.addcard').data('tovarprice',$(this).data('tovarprice'));
        modalElem.classList.add('active');
        overlay.classList.add('active');
    });

    $(document).on( "click", ".js-modal-close", function() {
        var parentModal = this.closest('.modal');
        parentModal.classList.remove('active');
        overlay.classList.remove('active');
    });



</script>

</body>
</html>
