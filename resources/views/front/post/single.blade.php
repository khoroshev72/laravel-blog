@extends('front.layout', ['title' => $post->title])

@section('content')
    <!--//banner-->
    <section class="banner-bottom">
        <!--/blog-->
        <div class="container">
            <div class="row">
                <!--left-->
                <div class="col-lg-8 left-blog-info-w3layouts-agileits text-left">
                    <div class="blog-grid-top">
                        <div class="b-grid-top">
                            <div class="blog_info_left_grid">
                                <a href="#">
                                    <img src="{{$post->getImage()}}" class="img-fluid" alt="{{$post->title}}">
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
                        <p>{{$post->content}}</p>
                        @if(count($post->tags))
                            @foreach($post->tags as $tag)
                                <a href="{{route('post.tag', $tag->slug)}}" class="btn btn-primary read-m">{{$tag->title}}</a>
                            @endforeach
                        @endif
                    </div>

                    <div class="comment-top">
                        <h4>Comments</h4>
                        <div class="media">
                            <img src="{{asset('assets/front/img/t1.jpg')}}" alt="" class="img-fluid" />
                            <div class="media-body">
                                <h5 class="mt-0">Joseph Goh</h5>
                                <p>Lorem Ipsum convallis diam consequat magna vulputate malesuada. id dignissim sapien velit id felis ac cursus eros.
                                    Cras a ornare elit.</p>
                            </div>
                        </div>
                    </div>
                    <div class="comment-top">
                        <h4>Leave a Comment</h4>
                        <div class="comment-bottom">
                            <form action="#" method="post">
                                <input class="form-control" type="text" name="Name" placeholder="Name" required="">
                                <input class="form-control" type="email" name="Email" placeholder="Email" required="">

                                <input class="form-control" type="text" name="Subject" placeholder="Subject" required="">

                                <textarea class="form-control" name="Message" placeholder="Message..." required=""></textarea>
                                <button type="submit" class="btn btn-primary submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!--//left-->
                <!--right-->
                @include('front.inc.sidebar')
                <!--//right-->
            </div>
        </div>
    </section>
@endsection
