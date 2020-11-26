@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.fotocat.update')}}" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="idId">id</label>
                                <input type="text"
                                       class="form-control"
                                       id="idId"
                                       readonly
                                       name="id"
                                       value="{{$data->id}}"
                                       placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="idSlug">Название</label>
                                <input type="text"
                                       class="form-control"
                                       id="idSlug"
                                       value="{{$data->name}}"
                                       name="name"
                                       placeholder="">
                            </div>



                            <input type="file" name="foto">
                            <img src="{{ asset('/gal_type/'.$data->file_name) }}" width="300px">

                            @csrf
                            <hr>
                            <input type="submit" value="Обновить" >
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
