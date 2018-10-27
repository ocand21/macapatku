@section('title', '| Kumpulan Berita')
@extends('public.pages.main')


@section('banner')
<div class="banner two">
       <div class="container">
	       <h2 class="inner-tittle">Berita</h2>
        </div>
</div>
<!--//end-banner-->
@endsection
@section('content')
<!--/contact-->
	 <div class="section-contact">
	    <div class="container">
				<div class="contact-main">
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
	      </div>
     </div>
  </div>
<!--//contact-->


@endsection
