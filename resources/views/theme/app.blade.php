<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>@yield('seo_title')</title><!-- Favicon-->
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="shortcut icon" href="{{ asset(config('app.favicon_icon')) }}">

    <meta name="author" content="{{config('app.name')}}"/>
    <meta name="description" content="@yield('seo_description')"/>
    <meta name="keywords" content="{{config('app.seo_keyword')}}"/><!-- Title-->
    <meta name="robots" content="index,follow"/>

    <meta property="og:title" content="@yield('seo_title')"/>
    <meta property="og:description" content="@yield('seo_description')"/>
    <meta property="og:url" content="{{ url()->current() }}"/>
    <meta property="og:image" content="@yield('seo_og_image')"/>

    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:site" content="{{config('app.name')}}"/>
    <meta name="twitter:title" content="@yield('seo_title')"/>
    <meta name="twitter:description" content="@yield('seo_description')"/>
    <meta name="twitter:image" content="@yield('seo_og_image')"/>
    <link rel="canonical" href="{{ url()->current() }}"/>
    <meta name="twitter:image:src" content="@yield('seo_og_image')">

    <link rel="icon" href="{{ asset(config('app.favicon_icon')) }}" type="image/x-icon"/><!-- Stylesheets-->
    <link rel="stylesheet" href="{{asset('assets/theme/css/style.css')}}" type="text/css" media="all"/><!-- end head -->
    <style>
        .language-wrapper {
            margin: 10px auto;
            text-align: center;
        }
        .sl-nav {
            display: inline;
        }
        .sl-nav ul {
            margin:0;
            padding:0;
            list-style: none;
            position: relative;
            display: inline-block;
        }
        .sl-nav li {
            cursor: pointer;
            padding-bottom:10px;
        }
        .sl-nav li ul {
            display: none;
        }
        .sl-nav li:hover ul {
            position: absolute;
            top:29px;
            right:-15px;
            display: block;
            background: #fff;
            width: 120px;
            padding-top: 0px;
            z-index: 1;
            border-radius:5px;
            box-shadow: 0px 0px 20px rgba(0,0,0,0.2);
        }
        .sl-nav li:hover .triangle {
            position: absolute;
            top: 15px;
            right: -10px;
            z-index:10;
            height: 14px;
            overflow:hidden;
            width: 30px;
            background: transparent;
        }
        .sl-nav li:hover .triangle:after {
            content: '';
            display: block;
            z-index: 20;
            width: 15px;
            transform: rotate(45deg) translateY(0px) translatex(10px);
            height: 15px;
            background: #fff;
            border-radius:2px 0px 0px 0px;
            box-shadow: 0px 0px 20px rgba(0,0,0,0.2);
        }
        .sl-nav li ul li {
            position: relative;
            text-align: left;
            background: transparent;
            padding: 15px 15px;
            padding-bottom:0;
            z-index: 2;
            font-size: 15px;
            color: #3c3c3c;
        }
        .sl-nav li ul li:last-of-type {
            padding-bottom: 15px;
        }
        .sl-nav li ul li span {
            padding-left: 5px;
        }
        .sl-nav li ul li span:hover, .sl-nav li ul li span.active {
            color: #146c78;
        }
        .sl-flag {
            display: inline-block;
            box-shadow: 0px 0px 3px rgba(0,0,0,0.4);
            width: 15px;
            height: 15px;
            background: #aaa;
            border-radius: 50%;
            position: relative;
            top: 2px;
            overflow: hidden;
        }
    </style>
</head>
@php($themeType=\Illuminate\Support\Facades\Cookie::get('theme_type','light'))
<body class="mobile_nav_class lara-has-sidebar @if(isset($themeType) && $themeType=='dark') wp-night-mode-on @endif">
<div class="options_layout_wrapper lara_clear_at lara_radius lara_none_box_styles lara_border_radiuss lara_en_day_night @if(isset($themeType) && $themeType=='dark') options_dark_skin @endif">
    <div class="options_layout_container full_layout_enable_front">
        <header class="header-wraper lara_header_magazine_style two_header_top_style header_layout_style3_custom lara_cus_top_share">
            <div class="lara_blank_nav"></div>
            @php($menuCategories=getMenuCategory())
            <div id="menu_wrapper" class="menu_wrapper lara_menu_sticky lara_stick">
                <div class="container">
                    <div class="row">
                        <div class="main_menu col-md-12">
                            <div class="logo_small_wrapper_table">
                                <div class="logo_small_wrapper"><!-- begin logo -->
                                    <a class="logo_link" href="{{url('/')}}">
                                        <img class="lara_logo_n" src="{{ asset(config('app.app_light_logo')) }}" alt="{{config('app.name')}}"/>
                                        <img class="lara_logo_w" src="{{ asset(config('app.app_light_logo')) }}" alt="{{config('app.name')}}"/>
                                    </a>
                                    <!-- end logo -->
                                </div>
                            </div>
                            <div class="search_header_menu lara_nav_mobile">
                                <div class="menu_mobile_icons">
                                    <div class="jlm_w">
                                        <span class="jlma"></span>
                                        <span class="jlmb"></span>
                                        <span class="jlmc"></span>
                                    </div>
                                </div>
                                <div class="search_header_wrapper search_form_menu_personal_click">
                                    <i class="jli-search"></i>
                                </div>

                                <div class="lara_day_night @if(isset($themeType) && $themeType=='dark') lara_night_en @else lara_day_en @endif">
                                    <a
                                        @if(isset($themeType) && $themeType=='dark')
                                            href="{{url('default/theme?type=light')}}"
                                        @else
                                            href="{{url('default/theme?type=dark')}}"
                                        @endif
                                    >
                                        <span class="lara-night-toggle-icon">
                                            <span class="lara_moon">
                                                <i class="jli-moon"></i>
                                            </span>
                                            <span class="lara_sun">
                                                <i class="jli-sun"></i>
                                            </span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <div class="menu-primary-container navigation_wrapper lara_cus_share_mnu">
                                <ul id="mainmenu" class="lara_main_menu">
                                    <li class="menu-item current-menu-item current_page_item">
                                        <a href="{{url('/')}}">{{trans('system.fields.home')}}<span class="border-menu"></span></a>
                                    </li>
                                    @if(isset($menuCategories) && count($menuCategories)>0)
                                        @foreach($menuCategories as $menuCat)
                                            <li class="menu-item">
                                                <a href="{{route('blog.category',['slug'=>$menuCat->slug])}}">{{$menuCat->lang_name}}
                                                    <span class="border-menu"></span>
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        @yield('content')

        <div id="content_nav" class="lara_mobile_nav_wrapper">
            <div id="nav" class="lara_mobile_nav_inner">
                <div class="menu_mobile_icons mobile_close_icons closed_menu">
                    <span class="lara_close_wapper"><span class="lara_close_1"></span>
                        <span class="lara_close_2"></span>
                    </span>
                </div>

                @if (!isset($languages_array))
                    @php($languages_array = getAllLanguages(true))
                @endif

                @if(isset($languages_array) && count($languages_array)>1)
                    <div class="language-wrapper">
                        <div class="sl-nav">
                            <ul>
                                <li>
                                    <b>{{$languages_array[App::currentLocale()]}}</b>
                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                    <div class="triangle"></div>
                                    <ul>
                                        @foreach ($languages_array as $key => $language)
                                            <li @if(App::currentLocale() != $key) role="button" onclick="event.preventDefault(); document.getElementById('user_set_default_language{{ $key }}').submit();" @endif >
                                                <span  class="@if (App::currentLocale() == $key) active @endif">{{ $language }}</span>
                                                @if (App::currentLocale() != $key)
                                                    {!! html()->form('put', route('admin.default.language', ['language' => $key]))
                                                     ->class('d-none')
                                                     ->id('user_set_default_language' . $key)
                                                     ->attribute('autocomplete', 'off')
                                                     ->open() !!}
                                                    <input type="hidden" name='back' value="{{ request()->fullurl() }}">
                                                    {!! html()->closeModelForm() !!}
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endif


                <ul id="mobile_menu_slide" class="menu_moble_slide">
                    <li class="menu-item current-menu-item current_page_item">
                        <a href="{{url('/')}}">{{trans('system.fields.home')}}<span class="border-menu"></span></a>
                    </li>
                    @if(isset($menuCategories) && count($menuCategories)>0)
                        @foreach($menuCategories as $menuCat)
                            <li class="menu-item">
                                <a href="{{route('blog.category',['slug'=>$menuCat->slug])}}">{{$menuCat->lang_name}}
                                    <span class="border-menu"></span>
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>
                <div id="sprasa_about_us_widget-3" class="widget jellywp_about_us_widget">
                    <div class="widget_lara_wrapper about_widget_content">
                        <div class="jellywp_about_us_widget_wrapper">
                            <div class="social_icons_widget">
                                <ul class="social-icons-list-widget icons_about_widget_display">
                                    @if(config('app.facebook_url')!=null)
                                        <li><a href="{{config('app.facebook_url')}}" class="facebook" target="_blank"><i class="jli-facebook"></i></a></li>
                                    @endif

                                    @if(config('app.twitter_url')!=null)
                                        <li><a href="{{config('app.twitter_url')}}" class="twitter" target="_blank"><i class="jli-twitter"></i></a></li>
                                    @endif

                                    @if(config('app.linkedin_url')!=null)
                                        <li><a href="{{config('app.linkedin_url')}}" class="linkedin" target="_blank"><i class="jli-linkedin"></i></a></li>
                                    @endif

                                    @if(config('app.youtube_url')!=null)
                                        <li><a href="{{config('app.youtube_url')}}" class="youtube" target="_blank"><i class="jli-youtube"></i></a></li>
                                    @endif

                                    @if(config('app.instagram_url')!=null)
                                        <li><a href="{{config('app.instagram_url')}}" class="instagram" target="_blank"><i class="jli-instagram"></i></a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="search_form_menu_personal">
            <div class="menu_mobile_large_close">
            <span class="lara_close_wapper search_form_menu_personal_click">
                <span class="lara_close_1"></span>
                <span class="lara_close_2"></span>
            </span>
            </div>
            <form method="get" class="searchform_theme" action="{{url('/')}}">
                <input autofocus type="text" placeholder="{{trans('system.crud.search')}}..." value="{{request()->search}}" name="search" class="search_btn"/>
                <button type="submit" class="button">
                    <i class="jli-search"></i>
                </button>
            </form>
        </div>
        <div class="mobile_menu_overlay"></div>

        <footer id="footer-container" class="lara_footer_act enable_footer_columns_dark">
            <div class="footer-columns">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div id="sprasa_about_us_widget-2"
                                 class="widget jellywp_about_us_widget">
                                <div class="widget_lara_wrapper about_widget_content">
                                    <div class="jellywp_about_us_widget_wrapper">
                                        <img class="footer_logo_about" src="{{ asset(config('app.app_dark_logo')) }}" alt="{{config('app.name')}}"/>
                                        <p>{{config('app.footer_text')}}</p>
                                        <div class="social_icons_widget">
                                            <ul
                                                class="social-icons-list-widget icons_about_widget_display">
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="sprasa_about_us_widget-4"
                                 class="widget jellywp_about_us_widget">
                                <div class="widget_lara_wrapper about_widget_content">
                                    <div class="jellywp_about_us_widget_wrapper">
                                        <div class="social_icons_widget">
                                            <ul class="social-icons-list-widget icons_about_widget_display">

                                                @if(config('app.facebook_url')!=null)
                                                    <li><a href="{{config('app.facebook_url')}}" class="facebook" target="_blank"><i class="jli-facebook"></i></a></li>
                                                @endif

                                                @if(config('app.twitter_url')!=null)
                                                    <li><a href="{{config('app.twitter_url')}}" class="twitter" target="_blank"><i class="jli-twitter"></i></a></li>
                                                @endif

                                                @if(config('app.linkedin_url')!=null)
                                                    <li><a href="{{config('app.linkedin_url')}}" class="linkedin" target="_blank"><i class="jli-linkedin"></i></a></li>
                                                @endif

                                                @if(config('app.youtube_url')!=null)
                                                    <li><a href="{{config('app.youtube_url')}}" class="youtube" target="_blank"><i class="jli-youtube"></i></a></li>
                                                @endif

                                                @if(config('app.instagram_url')!=null)
                                                    <li><a href="{{config('app.instagram_url')}}" class="instagram" target="_blank"><i class="jli-instagram"></i></a></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php($moreFromUsBlogs=\App\Http\Controllers\FrontController::getMoreFromUsForFooter())
                        <div class="col-md-4">
                            <div id="sprasa_recent_post_text_widget-8"
                                 class="widget post_list_widget">
                                <div class="widget_lara_wrapper">
                                    <div class="ettitle">
                                        <div class="widget-title">
                                            <h2 class="lara_title_c">{{trans('system.fields.recent_post')}}</h2>
                                        </div>
                                    </div>
                                    <div class="bt_post_widget">
                                        @if(isset($moreFromUsBlogs) && count($moreFromUsBlogs)>0)
                                            @foreach($moreFromUsBlogs as $moreFromUsBlog)
                                                <div class="lara_m_right lara_sm_list lara_ml lara_clear_at">
                                                    <div class="lara_m_right_w">
                                                        <div class="lara_m_right_img lara_radus_e">
                                                            <a href="{{route('blog.details',['slug'=>$moreFromUsBlog->slug])}}">
                                                                <img width="120" height="120" src="{{$moreFromUsBlog->image_url}}"
                                                                     class="attachment-sprasa_small_feature size-sprasa_small_feature wp-post-image" alt="{{$moreFromUsBlog->title}}" loading="lazy"/>
                                                            </a>
                                                        </div>
                                                        <div class="lara_m_right_content">
                                                            <h2 class="entry-title">
                                                                <a href="{{route('blog.details',['slug'=>$moreFromUsBlog->slug])}}" tabindex="-1">{{$moreFromUsBlog->local_title}}</a>
                                                            </h2>
                                                            <span class="lara_post_meta">
                                                                <span class="lara_author_img_w">
                                                                    <i class="jli-user"></i>
                                                                    <a href="{{route('blog.details',['slug'=>$moreFromUsBlog->slug])}}"
                                                                       title="{{$moreFromUsBlog->author->first_name}} {{$moreFromUsBlog->author->last_name}}"
                                                                       rel="author">{{$moreFromUsBlog->author->first_name}} {{$moreFromUsBlog->author->last_name}}</a>
                                                                </span>

                                                                <span class="post-date">
                                                                    <i class="jli-pen"></i>{{$moreFromUsBlog->created_at}}
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php($activeCategories=\App\Http\Controllers\FrontController::getCategoriesForFooter())

                        <div class="col-md-4">
                            <div class="widget_lara_wrapper lara_clear_at">
                                <div id="sprasa_category_image_widget_register-2"
                                     class="widget jellywp_cat_image">
                                    <div class="widget-title">
                                        <h2 class="lara_title_c">{{trans('system.categories.menu')}}</h2>
                                    </div>
                                    <div class="wrapper_category_image">
                                        <div class="category_image_wrapper_main">
                                            @if(isset($activeCategories) && count($activeCategories)>0)
                                                @foreach($activeCategories as $actCategory)
                                                    <div class="lara_cat_img_w">
                                                        <div class="lara_cat_img_c">
                                                            <a class="category_image_link" id="category_color_2" href="{{route('blog.category',['slug'=>$menuCat->slug])}}"></a>
                                                            <span class="lara_cm_overlay">
                                                                <span class="lara_cm_name">{{$actCategory->lang_name}}</span>
                                                                <span class="lara_cm_count">{{$actCategory->notes->count()}} {{trans('system.fields.posts')}}</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom enable_footer_copyright_dark">
                <div class="container">
                    <div class="row bottom_footer_menu_text">
                        <div class="col-md-12">
                            <div class="lara_ft_w">&copy; {{date('Y')}} {{config('app.name')}}. {{ __('auth.all_rights_reserved') }}
                                <ul id="menu-footer-menu" class="menu-footer">
                                    <li class="menu-item menu-item-7">
                                        <a href="{{url('/privacy-policy')}}">{{trans('system.privacy_policy.privacy_policy')}}</a>
                                    </li>
                                    <li class="menu-item menu-item-8">
                                        <a href="{{url('/terms-and-condition')}}">{{trans('system.terms_and_conditions.terms_and_conditions')}}</a>
                                    </li>
                                    <li class="menu-item menu-item-9">
                                        <a href="{{url('/contact-us')}}">{{trans('system.frontend.contact_us')}}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer><!-- End footer -->
        <div id="go-top"><a href="#go-top"><i class="jli-up-chevron"></i></a></div>
    </div>
</div>
<script src="{{ asset('assets/admin/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{asset('assets/theme/js/jquery.js')}}"></script>
<script src="{{asset('assets/theme/js/custom.js')}}"></script>
</body>
</html>
