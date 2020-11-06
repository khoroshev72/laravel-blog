@extends('admin.layout', ['title' => $post->title])

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{$post->title}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{route('post.index')}}">Посты</a></li>
                        <li class="breadcrumb-item active">{{$post->title}}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form role="form" method="POST" action="{{route('post.update', $post->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="title">Наименование</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{$post->title}}">
                                <div class="invalid-feedback">@if($errors->has('title')) {{$errors->first('title')}}@endif</div>
                            </div>

                            <div class="form-group">
                                <label for="description">Описание</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{$post->description}}</textarea>
                                <div class="invalid-feedback">@if($errors->has('description')) {{$errors->first('description')}} @endif</div>
                            </div>

                            <div class="form-group">
                                <label for="content">Текст</label>
                                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="3">{{$post->content}}</textarea>
                                <div class="invalid-feedback">@if($errors->has('content')) {{$errors->first('content')}} @endif</div>
                            </div>

                            <div class="form-group">
                                <label for="category_id">Категория</label>
                                <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                                    <option>Выберите категорию</option>
                                    @foreach($categories as $k => $v)
                                        <option value="{{$k}}" @if($post->category_id == $k) selected @endif>{{$v}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">@if($errors->has('category_id')) {{$errors->first('category_id')}} @endif</div>
                            </div>

                            <div class="form-group">
                                <label for="tags">Тэги</label>
                                <div class="select2-primary">
                                    <select class="select2" id="tags" name="tags[]" multiple="multiple" style="width: 100%;">
                                        @foreach($tags as $k => $v)
                                            <option value="{{$k}}" @if(in_array($k, $post->tags->pluck('id')->all())) selected @endif>{{$v}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label for="thumbnail">Изображение</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="thumbnail" class="custom-file-input @error('thumbnail') is-invalid @enderror" id="thumbnail">
                                        <label class="custom-file-label" for="thumbnail">Выберите файл</label>
                                    </div>
                                </div>
                                <div class="invalid-feedback d-block">@if($errors->has('thumbnail')) {{$errors->first('thumbnail') }}@endif</div>
                                <img src="{{$post->thumbnail ? asset('images/' . $post->thumbnail) : asset('no-image.jpg')}}" alt="{{$post->title}}" width="200" class="img-thumbnail mt-md-2">
                            </div>


                            <div class="form-group clearfix">
                                <div class="icheck-danger d-inline mr-2">
                                    <input type="checkbox" class="form-check-input" id="status" name="status" @if(!$post->status) checked @endif>
                                    <label class="form-check-label" for="status">Бан
                                    </label>
                                </div>

                                @if($post->thumbnail)
                                        <div class="icheck-danger d-inline">
                                            <input type="checkbox" class="form-check-input" id="no-image" name="no-image">
                                            <label class="form-check-label" for="no-image">Без фотографии
                                            </label>
                                        </div>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary">Соханить</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
@endsection


