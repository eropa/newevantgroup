@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.gallary.store')}}" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="idSlug">slug(Уникальное)</label>
                                <input type="text"
                                       class="form-control"
                                       id="idSlug"
                                       name="slug"
                                       placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="idname">Название(Уникальное)</label>
                                <input type="text"
                                       class="form-control"
                                       id="idname"
                                       name="name"
                                       placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="idCat">Категория</label>
                                <select class="form-control" id="idCat" name="fotocat_id">
                                    @foreach($datas as $data)
                                        <option value="{{$data->id}}">{{$data->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="htmlCodeId">Описание</label>
                                <textarea class="form-control"
                                          name="about"
                                          id="htmlCodeId" rows="3"></textarea>
                            </div>
                            <input type="file" name="file_name">
                            @csrf
                            <hr>
                            <input type="submit" value="Создать" >
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
