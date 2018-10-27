@section('title', '| Halaman Pengguna')
@extends('public.pages.main')


@section('banner')
<div class="banner two">
       <div class="container">
	       <h2 class="inner-tittle">Profil Pengguna</h2>
        </div>
</div>
<!--//end-banner-->
@endsection
@section('content')
<div class="main-content">
    <div class="container">
      <div class="mag-inner">
        <div class="col-md-12 mag-innert-left">
            <div style="margin-bottom: 20px">
                <div class="editor-pics">
                  <div class="col-md-2 item-pic">
                    @if($user->picture)
                    <img src="{{asset('users/images/avatar/' . $user->picture )}}" class="img-responsive img-circle img-thumbnail" style="height: 80px; width: 80px; margin-left: 40px" alt=""/>
                    @else 
                    <img src="{{asset('users/images/avatar/avatar.png')}}" class="img-responsive img-circle img-thumbnail" style="height: 80px; width: 80px; margin-left: 40px" alt=""/>
                    @endif
                   </div>
                  <div class="col-md-9 item-details">
                  <h5 class="inner two"><a href="{{ route('page.user', $user->slug )}}">{{$user->name}}</a></h5>
                   <p><i>{!!$user->aboutme!!}</i></p>
                 </div>
                 <div class="clearfix"></div>
               </div>
             </div>
            
        </div>
        <div class="mag-bottom">
                 <div class="grid">
              @foreach($articles as $article)
                          <div class="col-md-4 m-b">
                             <figure class="effect-layla">
                                 <a href="{{route('article.single', $article->slug)}}"><img src="{{ asset('users/images/articles/' . $article->image) }}" alt="img25"/></a>
                                
                              </figure>
                               <div class="m-b-text">
                                    <a href="{{route('article.single', $article->slug)}}" class="wd">{{$article->title}} </a>
                                    <p>{!! substr($article->body, 0, 300) !!}{!! strlen($article->body) > 300 ? "..." : "" !!}.</p>
                                    <a class="read" href="{{route('article.single', $article->slug)}}">Selengkapnya</a>
                                </div>
                          </div>
              @endforeach
                         <div class="clearfix"></div>
                        </div>
                  </div>
      
  
        </div>
      </div>
        
    </div>
</div>

@endsection
