@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a class="btn btn-info" href="{{route('admin.gallary.add')}}" role="button">Добавить</a>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Фото</th>
                                <th scope="col">название</th>
                                <th scope="col">категория</th>
                                <th scope="col">действие</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($datas as $data)
                                    <tr>
                                        <td>
                                            {{$data->id}}
                                        </td>
                                        <td>
                                            <img src="{{ asset('gallary/'.$data->file_name)}}"
                                                 width="120";
                                            >
                                        </td>
                                        <td>
                                            {{$data->name}}
                                        </td>
                                        <td>
                                            {{$data->categname->name}}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.gallary.edit',['id'=>$data->id]) }}">
                                                ред.
                                            </a>

                                            /
                                            <a href="{{ route('admin.gallary.delete',['id'=>$data->id]) }}">
                                                удалить
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
