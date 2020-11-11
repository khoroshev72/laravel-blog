
<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>{{$title}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Weblog a Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
          rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/front/css/front.css')}}">
</head>

<body>
<!--Header-->

<header>
    <div class="top-bar_sub_w3layouts container-fluid">
        <div class="row">
            <div class="col-md-4 logo text-left">
                <a class="navbar-brand" href="{{route('home')}}">
                    <i class="fab fa-linode"></i>> Weblog</a>
            </div>
            <div class="col-md-4 top-forms text-center mt-lg-3 mt-md-1 mt-0">
                <span>Welcome Back!</span>
                @guest
                    <span class="mx-lg-4 mx-md-2  mx-1">
                            <a href="{{route('user.login')}}">
                                <i class="fas fa-lock"></i> Sign In</a>
                        </span>
                    <span>
                            <a href="{{route('user.create')}}">
                                <i class="far fa-user"></i> Register</a>
                        </span>
                @endguest
                @auth
                    <span class="mx-lg-4 mx-md-2  mx-1">
                            <a href="#">
                                <i class="fas fa-user"></i> {{Auth::user()->name}}</a>
                        </span>
                    <span>
                            <a href="{{route('user.logout')}}">
                                <i class="fas fa-sign-out-alt"></i> Logout</a>
                        </span>
                @endauth
            </div>
            <div class="col-md-4 log-icons text-right">

                <ul class="social_list1 mt-3">

                    <li>
                        <a href="#" class="facebook1 mx-2">
                            <i class="fab fa-facebook-f"></i>

                        </a>
                    </li>
                    <li>
                        <a href="#" class="twitter2">
                            <i class="fab fa-twitter"></i>

                        </a>
                    </li>
                    <li>
                        <a href="#" class="dribble3 mx-2">
                            <i class="fab fa-dribbble"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="pin">
                            <i class="fab fa-pinterest-p"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</header>
<!--//header-->
<!--/main-->
        @include('flash');
        @yield('content')
<!--//main-->
<!--footer-->
<footer>
    <div class="container">
        <!-- footer -->
        <div class="footer-cpy text-center">
            <div class="footer-social">
                <div class="copyrighttop">
                    <ul>
                        <li class="mx-3">
                            <a class="facebook" href="#">
                                <i class="fab fa-facebook-f"></i>
                                <span>Facebook</span>
                            </a>
                        </li>
                        <li>
                            <a class="facebook" href="#">
                                <i class="fab fa-twitter"></i>
                                <span>Twitter</span>
                            </a>
                        </li>
                        <li class="mx-3">
                            <a class="facebook" href="#">
                                <i class="fab fa-google-plus-g"></i>
                                <span>Google+</span>
                            </a>
                        </li>
                        <li>
                            <a class="facebook" href="#">
                                <i class="fab fa-pinterest-p"></i>
                                <span>Pinterest</span>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
            <div class="w3layouts-agile-copyrightbottom">
                <p>© 2018 Weblog. All Rights Reserved | Design by
                    <a href="http://w3layouts.com/">W3layouts</a>
                </p>

            </div>
        </div>
        <!-- //footer -->
    </div>
</footer>
<!---->


<a href="#home" class="scroll" id="toTop" style="display: block;">
    <span id="toTopHover" style="opacity: 1;"> </span>
</a>

<script src="{{asset('assets/front/js/front.js')}}"></script>
</body>

</html>
