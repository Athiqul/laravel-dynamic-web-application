@extends('guest.guest_master');
@section('title')
    Blogs|Athiqul Hasan Momin
@endsection
@section('content')
<main>

    <!-- breadcrumb-area -->
    <section class="breadcrumb__wrap">
        <div class="container custom-container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="breadcrumb__wrap__content">
                        <h2 class="title">{{$type}}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Blog</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->


    <!-- blog-area -->
    <section class="standard__blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @php
                    $tags='';
                @endphp
                    @if ($blogs->isEmpty())
                        <h4>No Blogs in this category</h4>
                        @else
                    
                  
                    @foreach ($blogs as $item )
                    <div class="standard__blog__post">
                        <div class="standard__blog__thumb">
                            <a href="{{route('blog.details',$item->id)}}"><img src="{{asset('uploads/blogs/'.$item->image_link)}}" alt=""></a>
                            <a href="{{route('blog.details',$item->id)}}" class="blog__link"><i class="far fa-long-arrow-right"></i></a>
                        </div>
                        @php
                            $tags.=$item->tags;
                            $tags.=',';
                        @endphp
                        <div class="standard__blog__content">
                            <div class="blog__post__avatar">
                               
                                <span class="post__by text-warning">Posted : <a href="#">{{ Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</a></span>
                            </div>
                            <h2 class="title"><a href="{{route('blog.details',$item->id)}}">{{$item->title}}</a></h2>
                            <p>{!!Str::limit($item->desc, 200, '...')!!}</p>
                           
                        </div>
                    </div>
                    @endforeach
                   
                  
                      
                    
                    {{$blogs->links()}}
                    @endif
                </div>
                <div class="col-lg-4">
                    <aside class="blog__sidebar">
                        <div class="widget">
                            <form action="#" class="search-form">
                                <input type="text" placeholder="Search">
                                <button type="submit"><i class="fal fa-search"></i></button>
                            </form>
                        </div>
                        <div class="widget">
                            <h4 class="widget-title">Recent Blog</h4>
                            <ul class="rc__post">
                                @foreach ($blogs as $item )
                                <li class="rc__post__item">
                                    <div class="rc__post__thumb">
                                        <a href="{{route('blog.details',$item->id)}}"><img src="{{asset('uploads/blogs/'.$item->image_link)}}" alt=""></a>
                                    </div>
                                    <div class="rc__post__content">
                                        <h5 class="title"><a href="{{route('blog.details',$item->id)}}">{{$item->title}}</a></h5>
                                        <span class="post-date"><i class="fal fa-calendar-alt"></i> {{Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</span>
                                    </div>
                                </li>
                                @endforeach
                               
                                
                            </ul>
                        </div>
                        <div class="widget">
                            <h4 class="widget-title">Categories</h4>
                            <ul class="sidebar__cat">
                                @foreach ($categories as $item )
                                <li class="sidebar__cat__item"><a href="{{route('blog.category',$item->id)}}">{{$item->category}}</a></li>
                                @endforeach
                               
                                
                            </ul>
                        </div>
                      
                        <div class="widget">
                            <h4 class="widget-title">Popular Tags</h4>
                            <ul class="sidebar__tags">
                                @php
                                    $count=1;
                                    $limit=50;
                                    $getTags=array_unique(explode(',',$tags));

                                @endphp
                                @foreach ($getTags as $tag)
                                @if ($tag=="")
                                    @continue;
                                @endif
                                <li><a href="#">{{$tag}}</a></li>
                                @if ($count>=$limit)
                                    @break                                  
                                @endif
                                @php
                                    $count++;
                                @endphp
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- blog-area-end -->


    <!-- contact-area -->
    <section class="homeContact homeContact__style__two">
        <div class="container">
            <div class="homeContact__wrap">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="section__title">
                            <span class="sub-title">07 - Say hello</span>
                            <h2 class="title">Any questions? Feel free <br> to contact</h2>
                        </div>
                        <div class="homeContact__content">
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                            <h2 class="mail"><a href="mailto:Info@webmail.com">Info@webmail.com</a></h2>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="homeContact__form">
                            <form action="#">
                                <input type="text" placeholder="Enter name*">
                                <input type="email" placeholder="Enter mail*">
                                <input type="number" placeholder="Enter number*">
                                <textarea name="message" placeholder="Enter Massage*"></textarea>
                                <button type="submit">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-area-end -->

</main>
@endsection