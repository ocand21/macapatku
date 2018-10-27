@section('title', "| $page->title")
@extends('public.pages.main')

@section('banner')

<!--/start-banner-->
<div class="banner two">
       <div class="container">
	           <h2 class="inner-tittle">{{$page->title}}</h2>
       </div>
    </div>  <!--//end-banner-->
@endsection
@section('content')
<div class="main-content">
  <div class="container">
    <div class="mag-inner">
<div class="col-md-12">
<div class="banner-bottom-left-grids  mag-innert-left">
											<div class="single-left-grid">
                        <div class="text-center">

												<img src="{{ asset('admin/images/pages/' . $page->image) }}" class="img-responsive img-thumbnail">
                        <p><i>{{$page->caption}}</i></p>
                        </div>
												<p class="text">
                          {!! $page->body !!}
                        </p>
                        <div class="single-bottom">
													<ul>
                            <li>Admin</li>
														<li>{{ date( 'M j, Y', strtotime($page->created_at)) }}</li>
													</ul>
												</div>
											</div>
									</div>


</div>
</div>
</div>
</div>
@endsection
