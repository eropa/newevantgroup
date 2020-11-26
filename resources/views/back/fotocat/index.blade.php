@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a class="btn btn-info" href="#" role="button">Добавить</a>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Фото</th>
                                <th scope="col">название</th>
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
                                            <img src="{{ asset('gal_type/'.$data->file_name)}}"
                                                width="120";
                                            >
                                        </td>
                                        <td>
                                            {{$data->name}}
                                            <a href="{{ route('admin.gallarylist',['id'=>$data->id]) }}">
                                              (Список всеx фото)
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.fotocat.edit',['id'=>$data->id]) }}">
                                                ред.
                                            </a>
                                            /
                                            <a href="{{ route('admin.fotocat.delete',['id'=>$data->id]) }}">
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
