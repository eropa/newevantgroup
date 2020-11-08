<table border="1">
    <tr>
        <td>id</td>
        <td>Название</td>
        <td>Кол-во</td>
        <td>Цена</td>
        <td>Сумма</td>
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
          0
        </td>
        <td>
            0
        </td>
    </tr>
    @endforeach
</table>
