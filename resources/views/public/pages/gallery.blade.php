@section('title', '| Galeri')
@extends('public.pages.main')

@section('css')
  <link rel="stylesheet" href="/public/fancybox/jquery.fancybox.min.css">
@endsection

@section('banner')
<div class="banner two">
       <div class="container">
	       <h2 class="inner-tittle">Galeri</h2>
        </div>
  </div>
   <!--//end-banner-->
@endsection
@section('content')
<!--/contact-->
	 <div class="section-contact">
	    <div class="container">
				<div class="contact-main">
          <div class="gallery">
            @foreach($images as $image)
              <a href="{{ asset('admin/images/gallery/' . $image->filename) }}" data-fancybox="group" data-caption="{{$image->description}}">
                <img src="{{ asset('admin/images/gallery/' . $image->resized_name) }}" alt="">
              </a>

            @endforeach
          </div>
	      </div>
     </div>
  </div>
<!--//contact-->


@endsection

@section('js')
  <script src="/public/fancybox/jquery.fancybox.min.js"></script>
@endsection
