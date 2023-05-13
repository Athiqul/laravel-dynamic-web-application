@php
    $footer= App\Models\footer::latest()->first();
   
@endphp
<footer class="footer">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-4">
                <div class="footer__widget">
                    <div class="fw-title">
                        <h5 class="sub-title">Contact us</h5>
                        <h4 class="title">{{$footer->contact_number??'+81383 766 284'}}</h4>
                    </div>
                    <div class="footer__widget__text">
                        <p>{{Str::limit($footer->contact_us??'There are many variations of passages of lorem ipsum
                            available but the majority have suffered alteration
                            in some form is also here.', 300, '...') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="footer__widget">
                    <div class="fw-title">
                        <h5 class="sub-title">my address</h5>
                        <h4 class="title">{{$footer->region??'AUSTRALIA'}}</h4>
                    </div>
                    <div class="footer__widget__address">
                        <p>{{$footer->street_address??'Level 13, 2 Elizabeth Steereyt set <br> Melbourne, Victoria 3000'}}</p>
                        <a href="mailto:noreply@envato.com" class="mail">{{$footer->contact_email??'noreply@envato.com'}}</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="footer__widget">
                    <div class="fw-title">
                        <h5 class="sub-title">Follow me</h5>
                        <h4 class="title">socially connect</h4>
                    </div>
                    <div class="footer__widget__social">
                        <p>{{Str::limit($footer->social_connect??'Lorem ipsum dolor sit amet enim. <br> Etiam ullamcorper.', 200, '...') }}</p>
                        <ul class="footer__social__list">
                            @if ($footer->facebook!=null)
                            <li><a href="{{$footer->facebook}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            @endif
                            @if ($footer->twitter!=null)
                            <li><a href="{{$footer->twitter}}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            @endif
                            @if ($footer->instagram!=null)
                            <li><a href="{{$footer->instagram}}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            @endif
                            @if ($footer->linkedin!=null)
                                 
                            <li><a href="{{$footer->linkedin}}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                            @endif
                            @if ($footer->whatsapp!=null)
                            <li><a href="{{$footer->whatsapp}}" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                            @endif
                            @if ($footer->youtube!=null)
                            <li><a href="{{$footer->youtube}}" target="_blank"><i class="fab fa-youtube"></i></a></li>
                            @endif
                            
    
                            
                            
                          
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright__wrap">
            <div class="row">
                <div class="col-12">
                    <div class="copyright__text text-center">
                        <p>Copyright @ {{$footer->copyright??'Theme_Pure 2021 All right Reserved'}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer-area-end -->
