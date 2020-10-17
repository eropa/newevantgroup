<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="content-type" content="text/htm" charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" type="text/css" href="slick/slick.css">
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css">
    <link rel="stylesheet" href="/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>{{$tite}}</title>
    <meta name="google-site-verification" content="ESV6jPP7DnDCHN5HR35d13mElWwIKdmNyIzc8IP-D9k" />
</head>
<body>
<!-- Pop Up -->
<div class="popUp">
    <div class="popUp__inner">
        <div class="popUp__enter">
            <div class="popUp__title">Вход</div>
            <div class="popUp__subtitle">Я совершал здесь покупки и регистрировалься</div>

            <form action="#" method="post" enctype="multipart/form-data">
                <input tabindex="1" type="text" name="enter__login" class="popUp__input" placeholder="Логин">
                <br>
                <input tabindex="2" type="password" name="enter__password" class="popUp__input"  placeholder="Пороль">

                <div class="popUp_custom">
                    <input tabindex="3" id="enter" class="popUp__checkbox"  type="checkbox" name="politic" value="yes">
                    <label for="enter" class="popUp__label">Запомнить меня?
                    </label>
                </div>
                <p><a class="popUplink" href="#">Забыли пароль?</a></p>

                <button class="enter__button popUp__button" tabindex="4" type="submit">Вход</button>
            </form>
        </div>
        <div class="popUp__line"></div>
        <div class="popUp__registration">
            <div class="popUp__title">Регистрация</div>

            <form action="#" method="post" enctype="multipart/form-data">
                <input tabindex="1" type="text" name="registration__login" class="popUp__input input__registration" placeholder="Логин">
                <br>
                <input tabindex="2" type="password" name="registration__password" class="popUp__input input__registration"  placeholder="Пороль">

                <div class="popUp_custom">
                    <input tabindex="3" id="registration" class="popUp__checkbox"  type="checkbox" name="politic" value="yes">
                    <label for="registration" class="popUp__label">Я согласен с условиямми использования и обработки моих персональных данных.
                    </label>
                </div>

                <button class="registration__button popUp__button" tabindex="4" type="submit">Регистрация</button>
            </form>
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
                        <li><a  href="#">{{$item->name}}</a></li>
                    @endforeach
                </ul>
            </nav>
        </div>
        <div class="header__middle">
            <div class="header__right">
                <img class="header__logo" src="img/header/logo.png" alt="">
                <div class="header__address">Мебельное ателье <br> ул. Чернышевского 6А <br> www.evantgroup.com <br> 077749822, 077754155</div>
            </div>
            <div class="header__center">
                <button class="header__communication button">Обратная связь</button>
                <form action="#" method="post" enctype="multipart/form-data"><input type="text" name="search" class="header__search" placeholder="Поиск по сайту"></form>
            </div>
            <div class="header__left">
                <button class="header__enter button">Авторизация на сайте</button>
                <button class="header__favourites"></button>
                <button class="header__basket"></button>
            </div>
        </div>
    </div>
    <div class="header__bottom">
        <div class="container">
            <div class="header__bottom__inner">
                @foreach($menus2 as $item)
                    <div class="header__bottom__section "><a href="#">{{$item->name}}</a></div>
                @endforeach
            </div>
        </div>
    </div>
</div>


@yield('content')


<!-- Footer -->
<footer class="footer">
</footer>
<script type="text/javascript" src="app.js"></script>
<script type="text/javascript" src="slick/slick.js"></script>

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
