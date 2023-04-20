<section id="aboutSection" class="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                @if ($aboutImages!==null)
                    
               
                <ul class="about__icons__wrap">
                    @foreach ($aboutImages as $item )
                    <li>
                        <img class="light" src="{{asset('uploads/about/skills/'.$item->image_link)}}" alt="XD">
                        <img class="dark" src="{{asset('uploads/about/skills/'.$item->image_link)}}" alt="XD">
                    </li>
                    @endforeach
                    
                 
                </ul>
                @endif
            </div>
            <div class="col-lg-6">
                <div class="about__content">
                    <div class="section__title">
                        <span class="sub-title">01 - About me</span>
                        <h2 class="title">{{$about->title}}</h2>
                    </div>
                    <div class="about__exp">
                        <div class="about__exp__icon">
                            <img src="{{asset('frontend/assets/img/icons/about_icon.png')}}" alt="">
                        </div>
                        <div class="about__exp__content">
                            <p>{{$about->exp}}</p>
                        </div>
                    </div>
                    <p class="desc">{{$about->short_desc}}</p>
                    <a href="about.html" class="btn">Download my resume</a>
                </div>
            </div>
        </div>
    </div>
</section>