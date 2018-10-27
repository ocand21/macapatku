@section('title', '| Serat')
@extends('public.main')

@section('banner')

<!--/start-banner-->
<div class="banner two">
       <div class="container">
	           <h2 class="inner-tittle">Serat</h2>
       </div>
    </div>  <!--//end-banner-->
@endsection
@section('content')

<div class="col-md-8">

<div class="banner-bottom-left-grids  mag-innert-left">
											<div class="single-left-grid">
                        <div class="text-center">
  	                     <h5 class="inner two"><a href="#" style="font-size: 20">{{$serat->title}}</a></h5>
                        </div>
												<img src="{{ asset('admin/images/news/' . $serat->image) }}" alt="{{$serat->caption}}" class="img-responsive">

												<p class="text">
                        {!! $serat->body !!}
                        </p>
                        <div class="single-bottom">
													<ul>
														<li>Admin</li>
														<li>{{ date( 'M j, Y', strtotime($serat->created_at)) }}</li>
														<li><a href="#">5 Comments</a></li>
													</ul>
												</div>
											</div>
									</div>

                  
</div>
@endsection
