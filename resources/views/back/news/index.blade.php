@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a class="btn btn-info" href="{{ route('admin.news.create')}}" role="button">Добавить</a>
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
                                            {{$data->foto_file}}
                                        </td>
                                        <td>
                                            {{$data->title}}
                                        </td>
                                        <td>
                                            удалить
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
