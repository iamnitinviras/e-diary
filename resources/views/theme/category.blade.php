@extends('theme.app')
@section('seo_title',trans('system.categories.title'))
@section('seo_description',config('app.seo_description'))
@section('seo_og_image',asset(config('app.seo_image')))
@section('content')
    <div class="lara_post_loop_wrapper" id="wrapper_masonry">
        <div class="container">
            <div class="row">
                <div class="col-md-8 grid-sidebar" id="content">
                    <div class="lara_cat_mid_title">
                        <h3 class="categories-title title">{{$category->category_name}}</h3>
                        <p>{{$category->description}}</p>
                    </div>
                    <div class="lara_wrapper_cat">
                        <div id="content_masonry"
                             class="lara_cgrid pagination_infinite_style_cat load_more_main_wrapper">
                            @if(isset($notes) && count($notes)>0)
                                @foreach($notes as $blog)
                                    <div
                                        class="box lara_grid_layout1 blog_grid_post_style post-2955 post type-post status-publish format-quote has-post-thumbnail hentry category-active tag-morning tag-shooting post_format-post-format-quote">
                                        <div class="lara_grid_w">
                                            <div class="lara_img_box lara_radus_e">
                                                <a href="{{route('blog.details',['slug'=>$blog->slug])}}">
                                                    <span class="lara_post_type_icon">
                                                        <i class="jli-quote-2"></i>
                                                    </span>
                                                    <img width="500" height="350"
                                                         src="{{$blog->image_url}}"
                                                         class="attachment-sprasa_slider_grid_small size-sprasa_slider_grid_small wp-post-image blog_image_min_height"
                                                         alt="{{$blog->title}}" loading="lazy"/>
                                                </a>
                                                <span class="lara_f_cat">
                                                    <a class="post-category-color-text" style="background:#4dcf8f" href="{{route('blog.details',['slug'=>$blog->slug])}}">Active</a>
                                                </span>
                                            </div>
                                            <div class="text-box">
                                                <h3>
                                                    <a href="{{route('blog.details',['slug'=>$blog->slug])}}" tabindex="-1">{{$blog->title}}</a>
                                                </h3>
                                                <span class="lara_post_meta">
                                                    <span class="lara_author_img_w">
                                                        <i class="jli-user"></i>
                                                        <a href="{{route('blog.details',['slug'=>$blog->slug])}}" title="{{$blog->author->first_name}} {{$blog->author->last_name}}" rel="author">{{$blog->author->first_name}} {{$blog->author->last_name}}</a>
                                                    </span>
                                                    <span class="post-date">
                                                        <i class="jli-pen"></i>{{$blog->created_at}}
                                                    </span>
                                                    <span class="post-read-time">
                                                        <i class="jli-watch-2"></i>{{$blog->read_time}} {{trans('system.notes.minutes_read')}}
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-md-12 text-center p-5">
                                    <p class="mt-5"> {{trans('system.frontend.no_record_found')}}</p>
                                    <img src="{{asset('front-images/no-data-found.svg')}}">
                                </div>
                            @endif
                        </div>

                    </div>
                </div>

                @if(isset($sidebarCategory) && $sidebarCategory!=null && isset($sidebarBlogs) && count($sidebarBlogs)>0)
                    <div class="col-md-4" id="sidebar">
                        <div class="lara_sidebar_w">

                            <div id="sprasa_recent_post_text_widget-9"
                                 class="widget post_list_widget">
                                <div class="widget_lara_wrapper">
                                    <div class="ettitle">
                                        <div class="widget-title">
                                            <h2 class="lara_title_c">{{$sidebarCategory->category_name}}</h2>
                                        </div>
                                    </div>
                                    <div class="bt_post_widget">

                                        @if(isset($sidebarBlogs) && count($sidebarBlogs)>0)
                                            @foreach($sidebarBlogs as $sblog)
                                                <div class="lara_m_right lara_sm_list lara_ml lara_clear_at">
                                                    <div class="lara_m_right_w">
                                                        <div class="lara_m_right_img lara_radus_e">
                                                            <a href="{{route('blog.details',['slug'=>$sblog->slug])}}">
                                                                <img width="120" height="120" src="{{$sblog->image_url}}"
                                                                   class="attachment-sprasa_small_feature size-sprasa_small_feature wp-post-image"
                                                                   alt="{{$sblog->title}}" loading="lazy"/>
                                                            </a>
                                                        </div>
                                                        <div class="lara_m_right_content">
                                                            <h2 class="entry-title">
                                                                <a href="{{route('blog.details',['slug'=>$sblog->slug])}}" tabindex="-1">{{$sblog->title}}</a>
                                                            </h2>
                                                            <span class="lara_post_meta">
                                                                <span class="lara_author_img_w">
                                                                    <i class="jli-user"></i>
                                                                    <a href="{{route('blog.details',['slug'=>$sblog->slug])}}" title="{{$sblog->author->first_name}} {{$sblog->author->last_name}}" rel="author">{{$sblog->author->first_name}} {{$sblog->author->last_name}}</a>
                                                                </span>
                                                                <span class="post-date">
                                                                    <i class="jli-pen"></i>{{$sblog->created_at}}
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
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection
