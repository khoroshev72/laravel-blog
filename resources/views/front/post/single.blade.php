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
                                            <i class="far fa-comment"></i> {{count($post->comments)}} Comments</a>
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

                    @if(count($post->comments))
                    <div class="comment-top">
                        <h4>Comments</h4>
                        @foreach($post->comments()->with('user')->get() as $comment)
                            <div class="media">
                            <img src="{{asset('default.jpg')}}" width="100" alt="{{$comment->user->name}}" class="img-fluid" />
                            <div class="media-body">
                                <h5 class="mt-0">{{$comment->user->name}} {{$comment->created_at}}</h5>
                                <p>{{$comment->comment}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif

                    @if(\Illuminate\Support\Facades\Auth::check())
                        <div class="comment-top">
                            <h4>Leave a Comment</h4>
                            <div class="comment-bottom">
                                <form action="{{route('comment.add')}}" method="post">
                                    @csrf
                                    <textarea class="form-control @error('comment') is-invalid @enderror" name="comment" placeholder="Message..." >{{old('comment')}}</textarea>
                                    <div class="invalid-feedback">@if($errors->has('comment')) {{$errors->first('comment')}} @endif</div>
                                    <input type="hidden" name="post_id" value="{{$post->id}}">
                                    <button type="submit" class="btn btn-primary submit">Submit</button>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
                <!--//left-->
                <!--right-->
                @include('front.inc.sidebar')
                <!--//right-->
            </div>
        </div>
    </section>
@endsection
