@extends('theme.app')
@section('seo_title',$blog->title)
@section('seo_description',$blog->title)
@section('seo_og_image',$blog->image_url)
@section('content')
    <section id="content_main" class="clearfix lara_spost">
        <div class="container">
            @include('flash')
            <div class="row main_content">
                <div class="col-md-8 loop-large-post" id="content">
                    <div class="widget_container content_page"><!-- start post -->
                        <div
                            class="post-2970 post type-post status-publish format-gallery has-post-thumbnail hentry category-business tag-inspiration tag-morning tag-tip tag-tutorial post_format-post-format-gallery"
                            id="post-2970">
                            <div class="single_section_content box blog_large_post_style">
                                <div class="lara_single_style2">
                                    <div
                                        class="single_post_entry_content single_bellow_left_align lara_top_single_title lara_top_title_feature">
                                        <span class="meta-category-small single_meta_category">
                                            <a class="post-category-color-text" style="background:#eba845"
                                               href="{{route('blog.category',['slug'=>$blog->category->slug])}}">{{$blog->category->lang_name}}</a>
                                        </span>
                                        <h1 class="single_post_title_main">{{$blog->local_title}}</h1>
                                        <span class="lara_post_meta">
                                            <span class="lara_author_img_w">
                                                <i class="jli-user"></i>
                                                <a href="javascript:void(0)" title="{{$blog->title}}" rel="author">{{$blog->author->first_name}} {{$blog->author->last_name}}</a>
                                            </span>
                                            <span class="post-date">
                                                <i class="jli-pen"></i>{{$blog->created_at}}</span>
                                            <span class="post-read-time">
                                                <i class="jli-watch-2"></i>{{$blog->read_time}} {{trans('system.blogs.minutes_read')}}</span>
                                            <span class="meta-comment">
                                                <i class="jli-comments"></i>
                                                <a href="#respond">0 Comment</a>
                                            </span>
                                        </span>
                                    </div>
                                    <div class="lara_slide_wrap_s lara_clear_at">
                                        <div class="lara_ar_top lara_clear_at">
                                            <img class="img-thumbnail" alt="{{$blog->title}}" src="{{$blog->image_url}}">
                                        </div>
                                    </div>
                                </div>
                                @php($shareLink=route('blog.details',['slug'=>$blog->slug]))
                                <div class="post_content_w">
                                    <div class="post_sw">
                                        <div class="post_s">
                                            <div
                                                class="lara_single_share_wrapper lara_clear_at">
                                                <ul class="single_post_share_icon_post">
                                                    <li class="single_post_share_facebook">
                                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{$shareLink}}" target="_blank"><i class="jli-facebook"></i></a>
                                                    </li>
                                                    <li class="single_post_share_twitter">
                                                        <a href="https://twitter.com/intent/tweet?url={{$shareLink}}&text={{$blog->title}}" target="_blank"><i class="jli-twitter"></i></a>
                                                    </li>
                                                    <li class="single_post_share_pinterest">
                                                        <a href="https://pinterest.com/pin/create/button/?url={{$shareLink}}&description={{$blog->title}}" target="_blank"><i class="jli-pinterest"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <span class="single-post-meta-wrapper lara_sfoot">
                                                <span class="view_options">
                                                    <i class="jli-view-o"></i>
                                                    <span>{{$blog->total_views}}</span>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="post_content lara_content">
                                        {!! $blog->local_description !!}
                                    </div>
                                </div>
                                <div class="clearfix"></div>

                                <div class="auth mt-5">
                                    <div class="author-info lara_info_auth">
                                        @if($blog->author->profile_url!=null)
                                            <div class="author-avatar">
                                                <img src="{{$blog->author->profile_url}}"
                                                     width="165" height="165"
                                                     alt="{{$blog->author->first_name}} {{$blog->author->last_name}}"
                                                     class="avatar avatar-165 wp-user-avatar wp-user-avatar-165 alignnone photo">
                                            </div>
                                        @endif

                                        <div class="author-description">
                                            <h5><a href="javascript:void(0)">{{$blog->author->first_name}} {{$blog->author->last_name}}</a></h5>
                                            <ul class="lara_auth_link clearfix">
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
                                            <p>{{config('app.about_author')}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="respond" class="comment-respond">
                                    <h3 id="reply-title" class="comment-reply-title">{{trans('system.fields.leave_a_comment')}}</h3>
                                    <form action="{{route('blog.comment',['blog'=>$blog->id])}}" method="post" id="commentform" class="comment-form mt-3">
                                        @csrf
                                        <div class="form-fields row mb-3">
                                            <span class="comment-form-email col-md-6">
                                                <input id="name" required name="name" type="text" value="" size="50" placeholder="{{trans('system.fields.your_name')}}*">
                                            </span>
                                            <span class="comment-form-author col-md-6">
                                                <input id="email" required name="email" type="email" value="" size="50" placeholder="{{trans('system.fields.your_email')}}*">
                                            </span>
                                        </div>
                                        <p class="comment-form-comment">
                                            <textarea class="u-full-width" id="comment" name="comment" cols="45" rows="3" aria-required="true" placeholder="{{trans('system.fields.comment')}}*"></textarea>
                                        </p>
                                        @if(config('app.enable_captcha_on_comments')==true && config('app.enable_captcha')==true)
                                            <p class="comment-form-comment mt-3">
                                                {!! NoCaptcha::renderJs() !!}
                                                {!! NoCaptcha::display() !!}
                                            </p>
                                        @endif
                                        <p class="form-submit">
                                            <input name="submit" type="submit" id="submit" class="submit" value="{{trans('system.fields.post_comment')}}">
                                        </p>
                                    </form>
                                </div><!-- #respond -->
                            </div>
                        </div><!-- end post -->
                        <div class="brack_space"></div>
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
                                                                     class="attachment-sprasa_small_feature size-sprasa_small_feature wp-post-image" alt="{{$sblog->title}}" loading="lazy"/>
                                                            </a>
                                                        </div>
                                                        <div class="lara_m_right_content">
                                                            <h2 class="entry-title">
                                                                <a href="{{route('blog.details',['slug'=>$sblog->slug])}}" tabindex="-1">{{$sblog->local_title}}</a>
                                                            </h2>
                                                            <span class="lara_post_meta">
                                                                <span class="lara_author_img_w">
                                                                    <i class="jli-user"></i>
                                                                    <a href="{{route('blog.details',['slug'=>$sblog->slug])}}" title="{{$sblog->author->first_name}} {{$sblog->author->last_name}}"
                                                                       rel="author">{{$sblog->author->first_name}} {{$sblog->author->last_name}}</a>
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
    </section>
@endsection
