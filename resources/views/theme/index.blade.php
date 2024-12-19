@extends('theme.app')
@section('seo_title',config('app.name'))
@section('seo_description',config('app.seo_description'))
@section('seo_og_image',asset(config('app.seo_image')))
@section('content')
    <div class="lara_home_bw">
        <section class="home_section2">
            <div class="container">
                <div class="row">
                    @if(isset($blogs) && count($blogs)>0)
                        <div class="col-md-12">
                            <div id="blockid_72be465" class="block-section lara-main-block"
                                 data-blockid="blockid_72be465" data-name="lara_mgrid"
                                 data-page_max="11" data-page_current="1" data-author="none"
                                 data-order="date_post" data-posts_per_page="6" data-offset="5">
                                <div class="lara_grid_wrap_f lara_clear_at g_3col">
                                    <div id="blog_parent_div" class="lara-roww content-inner lara-col3 lara-col-row">
                                        @foreach($blogs as $blog)
                                            <div class="lara-grid-cols">
                                                <div class="p-wraper post-2959">
                                                    <div class="lara_grid_w">
                                                        <div class="lara_img_box lara_radus_e">
                                                            <a href="{{route('blog.details',['slug'=>$blog->slug])}}">
                                                                <img width="500" height="350" src="{{$blog->image_url}}"
                                                                     class="attachment-sprasa_slider_grid_small size-sprasa_slider_grid_small wp-post-image blog_image_min_height" alt="" loading="lazy"></a>
                                                            <span class="lara_f_cat">
                                                                <a class="post-category-color-text" style="background: #62ce5c;"
                                                                   href="{{route('blog.details',['slug'=>$blog->slug])}}">{{$blog->category->category_name}}</a>
                                                            </span>
                                                        </div>
                                                        <div class="text-box">
                                                            <h3><a href="{{route('blog.details',['slug'=>$blog->slug])}}">{{$blog->local_title}}</a></h3>
                                                            <span class="lara_post_meta">
                                                                <span class="lara_author_img_w">
                                                                    <i class="jli-user"></i>
                                                                    <a href="{{route('blog.details',['slug'=>$blog->slug])}}" title="Posts by Spraya"
                                                                       rel="author">{{$blog->author->first_name}} {{$blog->author->last_name}}</a>
                                                                </span>
                                                                <span class="post-date">
                                                                    <i class="jli-pen"></i>{{$blog->created_at}}
                                                                </span>
                                                                <span class="post-read-time">
                                                                    <i class="jli-watch-2"></i>{{$blog->read_time}} {{trans('system.blogs.minutes_read')}}
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($total_blogs>config('app.per_page'))
                            <div class="lara_lmore_wrap mb-5" id="load_more_button">
                                <div class="lara_lmore_c">
                                    <a id="load-more-data" data-url="{{url('?search='.request()->search)}}" href="javascript:void(0)" class="lara-load-link">
                                        <div class="auto-load text-center" style="display: none;">
                                            <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="40" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                                                <path fill="#fff" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                                                    <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite"/>
                                                </path>
                                            </svg>
                                        </div>
                                        <span>{{trans('system.fields.load_more_data')}}</span>
                                    </a>

                                    <span class="lara-load-animation">
                                        <span>

                                        </span>
                                    </span>
                                </div>
                            </div>
                        @endif
                    @else
                        <div class="col-md-12 text-center p-5">
                            <p class="mt-5"> {{trans('system.frontend.no_record_found')}}</p>
                            <img src="{{asset('front-images/no-data-found.svg')}}">
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </div>
    <!-- end content --><!-- Start footer -->
@endsection
