@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a class="btn btn-info" href="{{ route('admin.foto.add') }}" role="button">Добавить</a>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">name</th>
                                <th scope="col">about</th>
                                <th scope="col">file_name</th>
                                <th scope="col">event</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($datas as $data)
                                <tr>
                                    <td>
                                        {{$data->id}}
                                    </td>
                                    <td>
                                        {{$data->name}}
                                    </td>
                                    <td>
                                        {{$data->about}}
                                    </td>
                                    <td>
                                        <img src="{{ asset('/fotomain/'.$data->file_name) }}" width="200px">
                                    </td>
                                    <td>
                                        <a href="{{route('admin.foto.edit',['id'=>$data->id])}}">
                                            edit
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
