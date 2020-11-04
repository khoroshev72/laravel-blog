@extends('admin.layout', ['title' => $category->title])

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Категория {{$category->title}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{route('category.index')}}">Категории</a></li>
                        <li class="breadcrumb-item active">{{$category->title}}</li>
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
                    <div class="col-md-6">
                        <form role="form" method="POST" action="{{route('category.update', $category->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">Наименование</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{$category->title}}">
                                <div class="invalid-feedback">@if($errors->has('title')) {{$errors->first('title')}}@endif</div>
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
