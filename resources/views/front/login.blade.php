@extends('front.app')

@section('content')

    <!-- Gallery -->
    <div class="gallery">
        <div class="container">
            <div class="gallery__inner">

                <h1>
                    Вxод
                </h1>

                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <form method="POST" action="{{ route('login') }}">
                    Email
                    <input tabindex="1" type="text" name="email" class="popUp__input"  name="email" placeholder="Логин" required>
                    <br>Пароль
                    <input tabindex="2" type="password" name="password" class="popUp__input"  name="password" placeholder="Пороль" required>
                    <br>
                    <button class="enter__button popUp__button" tabindex="4" type="submit">Вход</button>
                    @csrf
                </form>

            </div>
        </div>
    </div>


@endsection
