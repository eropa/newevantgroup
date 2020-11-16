<?php
    $sum=0;
?>
<table border="1">
    <tr>
        <td>id</td>
        <td>Название</td>
        <td>Кол-во</td>
        <td>Цена</td>
        <td>Сумма</td>
        <td>-</td>
    </tr>
    @foreach($datas as $data)
    <tr>
        <td>
            {{ $data['id'] }}
        </td>
        <td>
            {{ $data['name'] }}
        </td>
        <td>
            {{ $data['counttovar'] }}
        </td>
        <td>
            {{ $data['price'] }}
        </td>
        <td>
            {{ $data['price']* $data['counttovar'] }}
        </td>
        <td >
            <button class="deletZakaz" data-id="{{$data['id']}}">
                удалить
            </button>
        </td>
    </tr>
        <?php
        $sum=$sum+$data['price']* $data['counttovar'];
        ?>
    @endforeach
</table>
    <hr>
    <br>
    Итого - <b>{{$sum}}</b>
<hr><br>

@guest
    <h3>Чтобы оформить заявку Вам нужно войти в личный кабинет</h3>
@else
    <button class="sendZakaz">Оформить заявку</button>

@endguest
