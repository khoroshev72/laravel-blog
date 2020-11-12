<aside class="col-lg-4 agileits-w3ls-right-blog-con text-left">
    <div class="right-blog-info text-left">
        <div class="tech-btm">
            <img src="{{asset('assets/front/img/banner1.jpg')}}" class="img-fluid" alt="">
        </div>
        <div class="tech-btm">
            <h4>Sign up to our newsletter</h4>
            <p>Pellentesque dui, non felis. Maecenas male </p>
            <form action="#" method="post">
                <input type="email" placeholder="Email" required="">
                <input type="submit" value="Subscribe">
            </form>

        </div>
        <div class="tech-btm">
            <h4>Categories</h4>
            <ul class="list-group single">
                @foreach($categories as $category)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="{{route('post.category', $category->slug)}}">
                            {{$category->title}}
                        </a>
                    <span class="badge badge-primary badge-pill">{{count($category->posts)}}</span>
                </li>
                @endforeach
            </ul>
        </div>

        <div class="tech-btm">
            <h4>Recent Posts</h4>
            @foreach($recentPosts as $recent)
                <div class="blog-grids row mb-3 text-left">
                    <div class="col-md-5 blog-grid-left">
                        <a href="{{route('post.single', $recent->slug)}}">
                            <img src="{{$recent->getImage()}}" class="img-fluid" alt="{{$recent->title}}">
                        </a>
                    </div>
                    <div class="col-md-7 blog-grid-right">
                        <h5>
                            <a href="{{route('post.single', $recent->slug)}}">{{$recent->title}} </a>
                        </h5>
                        <div class="sub-meta">
                            <span><i class="far fa-clock"></i> {{$recent->created_at}}</span>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</aside>
