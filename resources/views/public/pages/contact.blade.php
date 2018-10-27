@section('title', '| Kontak')
@extends('public.pages.main')

@section('css')
  <link rel="stylesheet" href="/public/fancybox/jquery.fancybox.min.css">
@endsection

@section('banner')
<div class="banner two">
       <div class="container">
	       <h2 class="inner-tittle">{{ $contact->title }}</h2>
        </div>
  </div>
   <!--//end-banner-->
@endsection
@section('content')
<!--/contact-->
	 <div class="section-contact">
	    <div class="container">
				<div class="contact-main">
          <p>{!! $contact->body !!}</p>

          <div class="row">
            <div class="col-lg-6">
              <h3 align="center">Google Map</h3>
              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15840.90412997226!2d110.4092008!3d-6.9826317!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc791d6abc9236c7!2sUniversitas+Dian+Nuswantoro!5e0!3m2!1sid!2sid!4v1540200455832" width="550" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <div class="col-lg-6" style="">
              <h3 align="center">Hubungi Kami</h3>
              <form class="form" action="" method="POST">
                <div class="form-group">
                  <label>Email</label>
                  <input type="" name="" class="form-control">
                </div>
                <div class="form-group">
                  <label>Perihal</label>
                  <input type="" name="" class="form-control">
                </div>
                <div class="form-group">
                  <label>Isi</label>
                  <textarea class="form-control" rows="10"></textarea>
                </div>
                <div class="text-right">
                  <button type="submit" class="btn btn-default">Kirim</button>
                </div>
              </form>

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
