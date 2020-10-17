@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.infoblock.update')}}" method="post">
                            <div class="form-group">
                                <label for="idId">Id</label>
                                <input type="text"
                                       class="form-control"
                                       id="idId"
                                       readonly
                                       value="{{$data->id}}"
                                       name="id"
                                       placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="idSlug">Slug</label>
                                <input type="text"
                                       class="form-control"
                                       id="idSlug"
                                       readonly
                                       value="{{$data->slug}}"
                                       name="slug"
                                       placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="htmlCodeId">html code</label>
                                <textarea class="form-control"
                                          name="text_html"
                                          id="htmlCodeId" rows="3">{!!$data->text_html!!}</textarea>
                            </div>
                            @csrf
                            <input type="submit" value="Сохранить" >
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
