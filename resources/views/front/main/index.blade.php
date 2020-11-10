@extends('front.layout', ['title' => 'WebBlog'])

@section('content')
    <h3 class="tittle">Blog Posts</h3>
    <div class="row inner-sec">
        <!--left-->
        <div class="col-lg-8 left-blog-info-w3layouts-agileits text-left">
            @foreach($posts as $post)
            <article class="blog-grid-top">
                <div class="b-grid-top">
                    <div class="blog_info_left_grid">
                        <a href="#">
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
                                    <i class="far fa-comment"></i> 15 Comments</a>
                            </li>

                        </ul>
                    </div>
                </div>

                <h3>
                    <a href="#">{{$post->title}} </a>
                </h3>
                <p>{{$post->description}}</p>
                <a href="#" class="btn btn-primary read-m">Read More</a>
            </article>
            @endforeach

            {{$posts->links()}}



        </div>
        <!--//left-->
        <!--right-->
        @include('front.inc.sidebar')
        <!--//right-->
    </div>
@endsection
