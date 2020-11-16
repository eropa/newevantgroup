<html>
    <head>
    </head>
    <body>
        <h1>Заказ товара</h1>
        @foreach($datas as $data)
            {{ $data['id'] }} -  {{ $data['name'] }} - {{ $data['counttovar'] }} - {{ $data['price'] }} -  {{ $data['price']* $data['counttovar'] }} <br>
        @endforeach
        <hr>
        {{ $user->id }} {{ $user->name }} {{ $user->email }}
    </body>
</html>
