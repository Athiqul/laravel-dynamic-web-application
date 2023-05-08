 <!-- portfolio-area -->
 <section class="portfolio">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="section__title text-center">
                    <span class="sub-title">04 - Portfolio</span>
                    <h2 class="title">All creative work</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12">
                <ul class="nav nav-tabs portfolio__nav" id="portfolioTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button"
                            role="tab" aria-controls="all" aria-selected="true">All</button>
                    </li>
                  
                </ul>
            </div>
        </div>
    </div>
    <div class="tab-content" id="portfolioTabContent">
        <div class="tab-pane show active" id="all" role="tabpanel" aria-labelledby="all-tab">
            <div class="container">
                <div class="row gx-0 justify-content-center">
                  
                    <div class="col">
                     
                        <div class="portfolio__active">
                            @foreach ( $portfolio as $item )
                                
                           
                            <div class="portfolio__item">
                                <div class="portfolio__thumb">
                                    <img src="{{asset('uploads/projects/'.$item->image_link)}}" alt="">
                                </div>
                                <div class="portfolio__overlay__content">
                                    <span>{{$item->project_name}}</span>
                                    <h4 class="title"><a href="portfolio-details.html">{{$item->project_title}}</a></h4>
                                    <a href="{{route('portfolio.details',$item->id)}}" class="link">Case Study</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                   
                      
                   
                   
                </div>
            </div>
        </div>
        
        
        
       
    </div>
</section>
<!-- portfolio-area-end -->