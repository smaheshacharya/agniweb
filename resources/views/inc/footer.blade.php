 <!-- Footer Section Begin -->
 <footer class="footer spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__about">

                    <div class="footer__about__logo">
                        <a href="./index.html"><img src="{{ Voyager::image(setting('site.logo')) }}" alt=""></a>
                    </div>
                    <ul>
                        <li>Address: {{$detail->address}}</li>
                        <li>Phone: {{$detail->phone}}</li>
                        <li>Email: {{$detail->email}}</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                <div class="footer__widget">
                    <h6>Categories</h6>
                    <ul>
                        @if (count($category)>0)
                                @foreach ($category as $cat)
                                    <li><a href="#">{{$cat->name}}</a></li>
                                @endforeach
                                @else
                                <li><a href="#">Category Not Found</a></li>
                            @endif
                    </ul>

                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="footer__widget">
                    <h6>Follow on Facebook</h6>
                    <div class="footer__widget__social">
                        <div class="fb-page" data-href="https://www.facebook.com/agnihospitalitysupplies" data-tabs="timeline" data-width="" data-height="300px" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/agnihospitalitysupplies" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/agnihospitalitysupplies">Agni Hospitality Supplies Pvt. Ltd.</a></blockquote></div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer__copyright">
                    <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Agni Hospitality
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                    <div class="footer__copyright__payment"><img src="{{Voyager::image(setting('site.payment'))}}" alt=""></div>
                </div>
            </div>
        </div>
    </div>
</footer>
