@foreach($notes as $blog)
    <div class="lara-grid-cols">
        <div class="p-wraper post-2959">
            <div class="lara_grid_w">
                <div class="lara_img_box lara_radus_e">
                    <a href="{{route('blog.details',['slug'=>$blog->slug])}}">
                        <img width="500" height="350" src="{{$blog->image_url}}"
                             class="attachment-sprasa_slider_grid_small size-sprasa_slider_grid_small wp-post-image" alt="" loading="lazy"></a>
                    <span class="lara_f_cat">
                        <a class="post-category-color-text" style="background: #62ce5c;"
                           href="{{route('blog.details',['slug'=>$blog->slug])}}">{{$blog->category->category_name}}</a>
                    </span>
                </div>
                <div class="text-box">
                    <h3><a href="{{route('blog.details',['slug'=>$blog->slug])}}">{{$blog->title}}</a></h3>
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
                            <i class="jli-watch-2"></i>{{$blog->read_time}} {{trans('system.notes.minutes_read')}}
                        </span>
                    </span>
                </div>
            </div>
        </div>
    </div>
@endforeach
