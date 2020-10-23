@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.news.store')}}" method="post" enctype="multipart/form-data">
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
                                       name="title"
                                       placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="htmlCodeId">Короткий текст</label>
                                <textarea class="form-control"
                                          name="small_html"
                                          id="htmlCodeId" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="htmlCodeId">Остольной текст</label>
                                <textarea class="form-control"
                                          name="text_html"
                                          id="htmlCodeId" rows="3"></textarea>
                            </div>
                            <input type="file" name="foto_file">
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
