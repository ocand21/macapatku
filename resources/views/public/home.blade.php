@extends('public.main')

@section('banner')

<!--/start-banner-->
<div class="banner">
   <div class="container">
       <div class="banner-inner">
          <div class="callbacks_container">
          <ul class="rslides callbacks callbacks1" id="slider4">
            <li class="callbacks1_on" style="display: block; float: left; position: relative; opacity: 1; z-index: 2; transition: opacity 500ms ease-in-out;">
              <div class="banner-info">
              <h3>WHAT IS LIKE TO WORK AS A SUPERMODEL ON WOMEN’S FASHION</h3>
              <p>Lorem ipsum dolor sit amet</p>
              </div>
            </li>
            <li class="" style="display: block; float: none; position: absolute; opacity: 0; z-index: 1; transition: opacity 500ms ease-in-out;">
              <div class="banner-info">
                 <h3>FANTASTIC MAN MAGAZINE AND ITS INFLUENCE ON MEN’S FASHION</h3>
               <p>Lorem ipsum dolor sit amet</p>
              </div>
            </li>
            <li class="" style="display: block; float: none; position: absolute; opacity: 0; z-index: 1; transition: opacity 500ms ease-in-out;">
              <div class="banner-info">
               <h3>WHAT IS LIKE TO WORK AS A SUPERMODEL ON WOMEN’S FASHION</h3>
              <p>Lorem ipsum dolor sit amet</p>
              </div>
            </li>
          </ul>
          </div>
          <!--banner-Slider-->
          <script src="/public/js/responsiveslides.min.js"></script>
           <script>
          // You can also use "$(window).load(function() {"
          $(function () {
            // Slideshow 4
            $("#slider4").responsiveSlides({
          auto: true,
          pager: true,
          nav:false,
          speed: 500,
          namespace: "callbacks",
          before: function () {
            $('.events').append("<li>before event fired.</li>");
          },
          after: function () {
            $('.events').append("<li>after event fired.</li>");
          }
            });

          });
            </script>
      </div>
      </div>
</div>
  <!--//end-banner-->
@endsection
@section('content')

<div class="col-md-8 mag-innert-left">
<div class="technology">
            <h3 class="tittle"><i class="glyphicon glyphicon-file"></i>Artikel</h3>
            <div class="business-inner">
              <div class="col-md-6 b-img"><a href="{{route('article.single', $newArticle->slug)}}"><img class="img-responsive" src="{{ asset('users/images/articles/' . $newArticle->image) }}" alt=""/></a></div>
              <div class="col-md-6 b-text">
                <h5><a href="single.html">{{$newArticle->title}}</a></h5>
              <h6><i class="glyphicon glyphicon-time"></i>Jun 25, 2015</h6> <div class="icons"><a href="#"><i class="glyphicon glyphicon-user"></i>Admin</a><a href="#"><i class="glyphicon glyphicon-comment"></i>2</a><a href="#"><i class="glyphicon glyphicon-thumbs-up"></i>152</a><a href="#"><i class="glyphicon glyphicon-thumbs-down"></i> 26</a></div>
               <div class="clearfix"></div>
              <p>
                {!! substr($newArticle->body, 0, 300) !!}{!! strlen($newArticle->body) > 300 ? "..." : "" !!}
              </p>
              <a class="read" href="single.html">Selengkapnya</a>
               </div>
             <div class="clearfix"></div>
             <!--  -->
              <div class="business-bottom-content">
              <div class="col-md-6 business-bottom">
                  <div class="col-md-3 b-bottom-pic">
                <a href="single.html"><img class="img-responsive" src="images/ti1.jpg" alt=""/></a>
                </div>
                <div class="col-md-9 b-bottom-text">
                  <h5><a href="single.html"> NOW IS THE TIME TO CHANGE WORK</a></h5>
                <h6><i class="glyphicon glyphicon-time"></i>Jun 25, 2015</h6> <div class="icons"><a href="#"><i class="glyphicon glyphicon-user"></i>Admin</a><a href="#"><i class="glyphicon glyphicon-comment"></i>2</a><a href="#"><i class="glyphicon glyphicon-thumbs-up"></i>152</a><a href="#"><i class="glyphicon glyphicon-thumbs-down"></i> 26</a></div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
              </div>
                <div class="col-md-6 business-bottom">
                  <div class="col-md-3 b-bottom-pic">
                <a href="single.html"><img class="img-responsive" src="images/ti1.jpg" alt=""/></a>
                </div>
                <div class="col-md-9 b-bottom-text">
                  <h5><a href="single.html"> NOW IS THE TIME TO CHANGE WORK</a></h5>
                <h6><i class="glyphicon glyphicon-time"></i>Jun 25, 2015</h6> <div class="icons"><a href="#"><i class="glyphicon glyphicon-user"></i>Admin</a><a href="#"><i class="glyphicon glyphicon-comment"></i>2</a><a href="#"><i class="glyphicon glyphicon-thumbs-up"></i>152</a><a href="#"><i class="glyphicon glyphicon-thumbs-down"></i> 26</a></div>
                   <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
              </div>
               <div class="clearfix"></div>
             </div>
            </div>
          </div>
</div>
@endsection
