<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.png">
    <title>{{config('app.name')}}</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{ asset('assets/theme/css/materialize.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/theme/css/loaders.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/theme/css/lightbox.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/theme/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/theme/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/theme/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/theme/css/style.css')}}">
</head>
<body>

<!-- preloader -->
<div class="preloader">
    <div class="spinner"></div>
</div>
<!-- end preloader -->

<!-- navbar -->
<div class="navbar">
    <div class="container">
        <div class="row">
            <div class="col s3">
                <div class="content-left">
                    <a href="#slide-out" data-activates="slide-out" class="sidebar"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="col s6">
                <div class="content-center">
                    <a href="{{url('/')}}"><img class="lazyload" src="{{ asset(config('app.logo')) }}" alt="{{config('app.name')}}" height="60"></a>
                </div>
            </div>
            <div class="col s3">
                <div class="content-right">
                    <a href="#slide-out-right" data-activates="slide-out-right" class="sidebar-search"><i class="fa fa-search"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end navbar -->

<!-- sidebar -->
<div class="sidebar-panel">
    <ul id="slide-out" class="collapsible side-nav">
        <li class="list-top">
            <div class="collapsible-header">
                Home<span><i class="fa fa-angle-right"></i></span>
            </div>
            <div class="collapsible-body">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="index2.html">Home Grid</a></li>
                    <li><a href="index3.html">Home Blog</a></li>
                </ul>
            </div>
        </li>
        <li>
            <div class="collapsible-header">
                Single Post<span><i class="fa fa-angle-right right"></i></span>
            </div>
            <div class="collapsible-body">
                <ul>
                    <li><a href="single-post.html">Single Post</a></li>
                    <li><a href="single-post-gallery.html">Single Post Gallery</a></li>
                    <li><a href="single-post-video.html">Single Post Video</a></li>
                </ul>
            </div>
        </li>
        <li>
            <div class="collapsible-header">
                Pages<span><i class="fa fa-angle-right right"></i></span>
            </div>
            <div class="collapsible-body">
                <ul>
                    <li><a href="search-result.html">Search Result</a></li>
                    <li><a href="author-page.html">Author Page</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="gallery.html">Gallery</a></li>
                    <li><a href="pricing-table.html">Pricing Table</a></li>
                    <li><a href="page-not-found.html">Page Not Found</a></li>
                    <li><a href="settings.html">Settings</a></li>
                    <li><a href="sign-up.html">Sign Up</a></li>
                    <li><a href="sign-in.html">Sign In</a></li>
                    <li><a href="team.html">Team</a></li>
                </ul>
            </div>
        </li>
        <li>
            <div class="collapsible-header">
                Components<span><i class="fa fa-angle-right right"></i></span>
            </div>
            <div class="collapsible-body">
                <ul>
                    <li><a href="accordion.html">Accordion</a></li>
                    <li><a href="button.html">Button</a></li>
                    <li><a href="calendar.html">Calendar</a></li>
                    <li><a href="card.html">Card</a></li>
                    <li><a href="collapse.html">Collapse</a></li>
                    <li><a href="list.html">List</a></li>
                    <li><a href="pagination.html">Pagination</a></li>
                    <li><a href="table.html">Table</a></li>
                    <li><a href="tabs.html">Tabs</a></li>
                </ul>
            </div>
        </li>
        <li><a href="contact.html">Contact Us</a></li>
        <li><a href="sign-in.html">Sign In</a></li>
        <li><a href="sign-up.html">Sign Up</a></li>
        <li><a href="index.html">Log Out</a></li>
    </ul>
</div>
<!-- end sidebar -->

<!-- sidebar -->
<div class="sidebar-panel sidebar-search">
    <form action="{{route('blog.search')}}" method="GET">
    <ul id="slide-out-right" class="collapsible side-nav">
        <li>
            <div class="form">
                <input name="q" type="search">
                <button type="submit" class=""><i class="fa fa-search"></i></button>
            </div>
            <div class="clear"></div>
        </li>
        <li><h5>Popular Search</h5></li>
        <li><a href="#">Football</a></li>
        <li><a href="#">Festival</a></li>
        <li><a href="#">Crime</a></li>
        <li><a href="#">People</a></li>
        <li><a href="#">Food</a></li>
        <li><a href="#">Sport</a></li>
    </ul>
    </form>
</div>
<!-- end sidebar -->


@yield('content')


<!-- footer -->
<footer>
    <div class="container">
        <div class="footer-category">
            <h3>Explore Category</h3>
            <div class="row">
                <div class="col s4">
                    <ul>
                        <li><a href="#">Business</a></li>
                        <li><a href="#">Review</a></li>
                        <li><a href="#">Gaming</a></li>
                        <li><a href="#">Fashion</a></li>
                        <li><a href="#">Food</a></li>
                        <li><a href="#">Gadget</a></li>
                        <li><a href="#">Health</a></li>
                    </ul>
                </div>
                <div class="col s4">
                    <ul>
                        <li><a href="#">Lifestyle</a></li>
                        <li><a href="#">Politic</a></li>
                        <li><a href="#">Sport</a></li>
                        <li><a href="#">Travel</a></li>
                        <li><a href="#">Technology</a></li>
                        <li><a href="#">Creative</a></li>
                        <li><a href="#">Worlds</a></li>
                    </ul>
                </div>
                <div class="col s4">
                    <ul>
                        <li><a href="#">Programming</a></li>
                        <li><a href="#">Design</a></li>
                        <li><a href="#">Coding</a></li>
                        <li><a href="#">Marketplace</a></li>
                        <li><a href="#">Handphone</a></li>
                        <li><a href="#">Computers</a></li>
                        <li><a href="#">Laptop</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-text">
            <ul>
                @if(config('app.facebook_url')!=null)
                    <li><a target="_blank" href="{{config('app.facebook_url')}}"><i class="fa fa-facebook"></i></a></li>
                @endif

                @if(config('app.twitter_url')!=null)
                    <li><a target="_blank"  href="{{config('app.twitter_url')}}"><i class="fa fa-twitter"></i></a></li>
                @endif

                @if(config('app.linkedin_url')!=null)
                    <li><a target="_blank"  href="{{config('app.linkedin_url')}}"><i class="fa fa-linkedin"></i></a></li>
                @endif

                @if(config('app.instagram_url')!=null)
                    <li><a target="_blank"  href="{{config('app.instagram_url')}}"><i class="fa fa-instagram"></i></a></li>
                @endif
            </ul>
        </div>

        <p>©
            <script>
                document.write(new Date().getFullYear())
            </script> {{ __('auth.copyright') }}
        </p>
    </div>
</footer>
<!-- end footer -->

<script src="{{ asset('assets/theme/js/jquery.min.js')}}"></script>
<script src="{{ asset('assets/theme/js/materialize.js')}}"></script>
<script src="{{ asset('assets/theme/js/numscroller.js')}}"></script>
<script src="{{ asset('assets/theme/js/lightbox.js')}}"></script>
<script src="{{ asset('assets/theme/js/owl.carousel.min.js')}}"></script>
<script src="{{ asset('assets/theme/js/main.js')}}"></script>
</body>
</html>
