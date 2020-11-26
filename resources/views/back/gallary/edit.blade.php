@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.gallary.update')}}" method="post" enctype="multipart/form-data">
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
                                <label for="idSlug">ЧПУ</label>
                                <input type="text"
                                       class="form-control"
                                       id="idSlug"
                                       name="slug"
                                       value="{{$data->slug}}"
                                       placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="idName">Название</label>
                                <input type="text"
                                       class="form-control"
                                       id="idName"
                                       value="{{$data->name}}"
                                       name="name"
                                       placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="idSelectGr">Категория</label>
                                <select class="form-control"
                                        name="fotocat_id"
                                        id="idSelectGr">
                                    @foreach($cats as $cat)
                                        <option value="{{$cat->id}}"
                                            @if($cat->id==$data->fotocat_id)
                                                selected
                                            @endif
                                        >{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="file" name="file_name">
                            <img src="{{ asset('/gallary/'.$data->file_name) }}" width="300px">

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
