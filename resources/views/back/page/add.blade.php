@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.page.store')}}" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="idSlug">Название</label>
                                <input type="text"
                                       class="form-control"
                                       id="idname"
                                       name="title"
                                       placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="idSlug">ЧПУ</label>
                                <input type="text"
                                       class="form-control"
                                       id="idSlug"
                                       name="slug"
                                       placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="idSlug">keywords</label>
                                <input type="text"
                                       class="form-control"
                                       id="idkyewords"
                                       name="keywords"
                                       placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="idSlug">descriptor</label>
                                <input type="text"
                                       class="form-control"
                                       id="iddescriptor"
                                       name="descriptor"
                                       placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="htmlCodeId">Описание</label>
                                <textarea class="form-control"
                                          name="html_code"
                                          id="htmlCodeId" rows="14"></textarea>
                            </div>


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
