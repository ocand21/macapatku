@section('title', '| Berita')
@extends('public.main')

@section('banner')

<!--/start-banner-->
<div class="banner two">
       <div class="container">
	           <h2 class="inner-tittle">Berita</h2>
       </div>
    </div>  <!--//end-banner-->
@endsection
@section('content')

<div class="col-md-8">

<div class="banner-bottom-left-grids  mag-innert-left">
											<div class="single-left-grid">
                        <div class="text-center">
  	                     <h5 class="inner two"><a href="#" style="font-size: 20">{{$news->title}}</a></h5>
                        </div>
												<img src="{{ asset('admin/images/news/' . $news->image) }}" alt="{{$news->caption}}" class="img-responsive">
                        <p><i>{{$news->caption}}</i></p>
												<p class="text">
                        {!! $news->body !!}
                        </p>
                        <div class="single-bottom">
													<ul>
														<li>Admin</li>
														<li>{{ date( 'M j, Y', strtotime($news->created_at)) }}</li>
														<li><a href="#">5 Comments</a></li>
													</ul>
												</div>
											</div>
									</div>

                  <!--leave-->
                	<div class="post mag-innert-left">
									   <a href="#"><h3>Berita Terkait</h3></a>
									     <div class="post-grids">
												<div class="col-md-3 post-left">
													<a href="single.html"><img src="images/f1.jpg" alt=""></a>
												</div>
												<div class="col-md-9 post-right">
													<h4><a href="single.html">Berita Terkait</a></h4>
													<p class="comments">August 28 2015, <a href="#">8 Comments</a></p>
													<p class="text">Berita Terkait......</p>
												</div>
												<div class="clearfix"> </div>
											</div>
										</div>
							 <!--//leave-->
</div>
@endsection
