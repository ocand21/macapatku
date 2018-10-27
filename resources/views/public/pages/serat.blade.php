@section('title', '| Serat Macapat')
@extends('public.pages.main')

@section('css')
  <link rel="stylesheet" href="/public/fancybox/jquery.fancybox.min.css">
  <link href="/public/css/card.css" rel="stylesheet" type="text/css">
@endsection

@section('banner')
<div class="banner two">
       <div class="container">
	       <h2 class="inner-tittle">Serat Macapat</h2>
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
            <div class="row">

              @foreach($kumpulan as $serat)
              <div class="col-md-4">
                <div class="card">
                  <div align="center" style="background-color: #8dcb42; margin-top: 10px;">
                  <img src="{{ asset('public/images/menu.png')}}" alt="Avatar" style="width:80%; margin-top: 5px;"></div>
                  <div class="container">
                    <h4><b><a href="{{ url('/kumpulan-serat/' . $serat->slug)}}">{{$serat->title}}</a></b></h4>
                    <p>Karya {{$serat->creator}}</p>
                  </div>
                </div>
              </div>
              @endforeach
              
            </div>


          </div>
	      </div>
     </div>
  </div>
<!--//contact-->


@endsection

@section('js')
  <script src="/public/fancybox/jquery.fancybox.min.js"></script>
@endsection
