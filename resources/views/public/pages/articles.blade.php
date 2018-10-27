@extends('public.main')

@section('title', '| Artikel')
@section('banner')

<!--/start-banner-->
<div class="banner two">
       <div class="container">
	       <h2 class="inner-tittle">Galeri</h2>
        </div>
</div>
@endsection
@section('content')

<div class="col-md-8 mag-innert-left">
          <div class="technology">
            <h3 class="tittle"><i class="glyphicon glyphicon-file"></i>Kumpulan Artikel</h3>
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
