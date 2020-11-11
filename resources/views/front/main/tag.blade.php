@extends('front.layout', ['title' => $tag->title])

@section('content')
    <section class="main-content-w3layouts-agileits">
        <div class="container">
            @if(count($posts))
                <h3 class="tittle">Blog Posts</h3>
                <div class="row inner-sec">
                    <!--left-->
                    <div class="col-lg-8 left-blog-info-w3layouts-agileits text-left">
                        <div class="row mb-4">
                            @foreach($posts as $post)
                                <div class="col-md-6 card">
                                <a href="{{route('post.single', $post->slug)}}">
                                    <img src="{{$post->getImage()}}" class="card-img-top img-fluid" alt="{{$post->title}}">
                                </a>
                                <div class="card-body">
                                    <ul class="blog-icons my-4">
                                        <li>
                                            <a href="#">
                                                <i class="far fa-calendar-alt"></i> {{$post->created_at}}</a>
                                        </li>
                                        <li class="mx-2">
                                            <a href="#">
                                                <i class="far fa-comment"></i> 21</a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fas fa-eye"></i> 2000</a>
                                        </li>

                                    </ul>
                                    <h5 class="card-title ">
                                        <a href="{{route('post.single', $post->slug)}}">{{$post->title}}</a>
                                    </h5>
                                    <p class="card-text mb-3">{{$post->description}}</p>
                                    <a href="{{route('post.single', $post->slug)}}" class="btn btn-primary read-m">Read More</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        {{$posts->links()}}
                    </div>
                    <!--//left-->
                    <!--right-->
                    @include('front.inc.sidebar')
                    <!--//right-->
                </div>
            @else
                <h3 class="tittle">There's no Posts yet :(</h3>
            @endif
        </div>
    </section>
@endsection
