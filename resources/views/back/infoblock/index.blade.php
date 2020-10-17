@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">slug</th>
                                <th scope="col">text_html</th>
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
                                            {{$data->slug}}
                                        </td>
                                        <td>
                                            {{$data->text_html}}
                                        </td>
                                        <td>
                                            <a href="{{route('admin.infoblock.edit',['id'=>$data->id])}}">
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
