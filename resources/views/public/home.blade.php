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
              <h3>BELAJAR MACAPAT</h3>
              <p>Mulai belajar Macapat</p>
              </div>
            </li>
            <li class="" style="display: block; float: none; position: absolute; opacity: 0; z-index: 1; transition: opacity 500ms ease-in-out;">
              <div class="banner-info">
                 <h3>TULIS ARTIKELMU SEKARANG</h3>
               <p>Terbitkan artikelmu tentang Macapat</p>
              </div>
            </li>
            <li class="" style="display: block; float: none; position: absolute; opacity: 0; z-index: 1; transition: opacity 500ms ease-in-out;">
              <div class="banner-info">
               <h3>BERBAGI MATERI MACAPAT</h3>
              <p>Berbagi material mengenai Macapat</p>
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
            <h3 class="tittle"><i class="glyphicon glyphicon-file"></i>Artikel Terbaru</h3>
            <div class="business-inner">
              @foreach($articles as $article)
              <div style="margin-bottom: 10px">
              <div class="col-md-6 b-img"><a href="{{route('article.single', $article->slug)}}"><img class="img-responsive img-thumbnail" src="{{ asset('users/images/articles/' . $article->image) }}" alt=""/></a></div>
              <div class="col-md-6 b-text">
                <h5><a href="{{route('article.single', $article->slug)}}">{{$article->title}}</a></h5>
              <h6><i class="glyphicon glyphicon-time"></i>{{ date('M j, Y', strtotime($article->updated_at))}}</h6> <div class="icons"><a href="#"><i class="glyphicon glyphicon-user"></i>{{$article->users->name}}</a><a href="#"><i class="glyphicon glyphicon-comment"></i>2</a><a href="#"><i class="glyphicon glyphicon-thumbs-up"></i>152</a><a href="#"><i class="glyphicon glyphicon-thumbs-down"></i> 26</a></div>
               <div class="clearfix"></div>
              <p>
                {!! substr($article->body, 0, 300) !!}{!! strlen($article->body) > 300 ? "..." : "" !!}
              </p>
              <a class="read" href="{{route('article.single', $article->slug)}}">Selengkapnya</a>
               </div>
             <div class="clearfix"></div>
             </div>
             <hr>
             @endforeach
            </div>
          </div>

</div>
@endsection
@section('news')

<div class="mag-bottom">
            <h3 class="tittle bottom"><i class="glyphicon glyphicon-globe"></i>Berita Terbaru</h3>
		         <div class="grid">
              @foreach($news as $recentNews)
						  <div class="col-md-4 m-b">
							 <figure class="effect-layla">
								 <a href="{{route('news.single', $recentNews->slug)}}"><img src="{{ asset('admin/images/news/' . $recentNews->image) }}" alt="img25"/></a>
								<figcaption>
									<h4>Berita <span>Terbaru</span></h4>
								</figcaption>
							  </figure>
							   <div class="m-b-text">
									<a href="{{route('news.single', $recentNews->slug)}}" class="wd">{{$recentNews->title}} </a>
									<p>{!! substr($recentNews->body, 0, 300) !!}{!! strlen($recentNews->body) > 300 ? "..." : "" !!}.</p>
									<a class="read" href="{{route('news.single', $recentNews->slug)}}">Selengkapnya</a>
								</div>
						  </div>
              @endforeach
						 <div class="clearfix"></div>
						</div>
				  </div>
				 <!--//mag-bottom-->
@endsection
