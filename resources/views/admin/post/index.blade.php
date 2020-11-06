@extends('admin.layout', ['title' => 'Посты'])

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Посты</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                        <li class="breadcrumb-item active">Посты</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <a href="{{route('post.create')}}" class="btn btn-primary">Добавить пост</a>
            </div>
            <div class="card-body">
                @if(count($posts))
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Наименование</th>
                            <th>Категория</th>
                            <th>Тэги</th>
                            <th>Просмотры</th>
                            <th>Статус</th>
                            <th>Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->category->title}}</td>
                                <td>{{$post->tags()->pluck('title')->join(', ')}}</td>
                                <td>{{$post->views}}</td>
                                <td>@php echo $post->status ? '<span class="badge badge-success">Активный</span>' : '<span class="badge badge-danger">Бан</span>' @endphp</td>
                                <td>
                                    <a href="{{route('post.edit', $post->id)}}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
                                    <form action="{{route('post.destroy', $post->id)}}" method="POST" onsubmit="if (!confirm('Подтвердите удаление')) return false" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-times"></i></button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                        @else
                            <p>Постов пока нет...</p>
                        @endif
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer m-auto">
                {{$posts->links()}}
            </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
@endsection

