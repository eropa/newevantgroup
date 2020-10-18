@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.foto.store')}}" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="idSlug">Название</label>
                                <input type="text"
                                       class="form-control"
                                       id="idSlug"
                                       name="name"
                                       placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="htmlCodeId">Описание</label>
                                <textarea class="form-control"
                                          name="about"
                                          id="htmlCodeId" rows="3"></textarea>
                            </div>

                            <input type="file" name="foto">

                            @csrf
                            <hr>
                            <input type="submit" value="Сохранить" >
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
