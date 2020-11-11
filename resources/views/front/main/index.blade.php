@extends('front.layout', ['title' => 'WebBlog'])

@section('content')
    <section class="main-content-w3layouts-agileits">
        <div class="container">
            <h3 class="tittle">Blog Posts</h3>
            <div class="row inner-sec">
                <!--left-->
                <div class="col-lg-8 left-blog-info-w3layouts-agileits text-left">
                    @foreach($posts as $post)
                    <article class="blog-grid-top">
                        <div class="b-grid-top">
                            <div class="blog_info_left_grid">
                                <a href="{{route('post.single', $post->slug)}}">
                                    <img src="{{asset("images/{$post->thumbnail}")}}" class="img-fluid" alt="{{$post->title}}">
                                </a>
                            </div>
                            <div class="blog-info-middle">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="far fa-calendar-alt"></i> {{$post->created_at}}</a>
                                    </li>
                                    <li class="mx-2">
                                        <a href="#">
                                            <i class="far fa-thumbs-up"></i> 201 Likes</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="far fa-comment"></i> {{count($post->comments)}} Comments</a>
                                    </li>

                                </ul>
                            </div>
                        </div>

                        <h3>
                            <a href="{{route('post.single', $post->slug)}}">{{$post->title}} </a>
                        </h3>
                        <p>{{$post->description}}</p>
                        <a href="{{route('post.single', $post->slug)}}" class="btn btn-primary read-m">Read More</a>
                    </article>
                    @endforeach

                    {{$posts->links()}}



                </div>
                <!--//left-->
                <!--right-->
                @include('front.inc.sidebar')
                <!--//right-->
            </div>
        </div>
    </section>
@endsection
