@section('title', "| $article->title")
@extends('public.main')

@section('banner')

<!--/start-banner-->
<div class="banner two">
 <div class="container">
  <h2 class="inner-tittle">Artikel</h2>
</div>
</div>  <!--//end-banner-->
@endsection
@section('content')

<div class="col-md-8">
  <div class="edit-pics" style="margin-bottom: 20px">
   <div class="editor-pics">
     <div class="col-md-3 item-pic">
       @if($article->users->picture)
       <img src="{{asset('users/images/avatar/' . $article->users->picture )}}" class="img-responsive img-circle img-thumbnail" style="height: 80px; width: 80px; margin-left: 40px" alt=""/>
       @else 
       <img src="{{asset('users/images/avatar/avatar.png')}}" class="img-responsive img-circle img-thumbnail" style="height: 80px; width: 80px; margin-left: 40px" alt=""/>
       @endif
      </div>
     <div class="col-md-9 item-details">
     <h5 class="inner two"><a href="{{ route('page.user', $article->users->slug )}}">{{$article->users->name}}</a></h5>
      <p><i>{!!$article->users->aboutme!!}</i></p>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<div class="banner-bottom-left-grids  mag-innert-left">
 <div class="single-left-grid">
  <div class="text-center">
    <h5 class="inner two"><a href="#" style="font-size: 20">{{$article->title}}</a></h5>
  </div>
  <img src="{{ asset('users/images/articles/' . $article->image) }}" alt="{{$article->caption}}" class="img-responsive">
  <p><i>{{$article->caption}}</i></p>
  <p class="text">
    {!! $article->body !!}
  </p>
  <div class="single-bottom">
   <ul>
    <li><a href="#">{{ $article->category->name}}</a></li>
    <li>{{ date( 'M j, Y', strtotime($article->updated_at)) }}</li>
    <li><a href="#">{{$article->users->name}}</a></li>
    <li><a href="#">{{$article->comments()->count()}} Komentar</a></li>
  </ul>
</div>
</div>
</div>

<div class="leave mag-innert-left">
  <h4 class="comment-title"><span class="glyphicon glyphicon-comment" style="margin-right: 5px"></span>{{$article->comments()->count()}} Komentar</h4>
  @foreach($article->comments as $comment)
  <div class="comment">
    <div class="author-info">
      
      <img src="/users/images/avatar/avatar.png" class="author-image" alt="">
      <div class="author-name">
        <h5>{{$comment->name}}</h5>
        <p class="author-time">{{date('d F, Y - H:i:s', strtotime($comment->created_at))}}</p>
      </div>
    </div>
    <div class="comment-content">
      {{$comment->comment}}
    </div>
  </div>
  @endforeach

</div>

<!--leave-->
<div class="leave mag-innert-left">
  <h4>Kolom Komentar</h4>
  <form id="commentform" method="POST" action="{{route('comment', $article->id)}}">
    {{csrf_field()}}
    <p class="comment-form-author-name"><label for="name">Nama Lengkap</label>
    <input id="name" name="name" type="text" value="" size="30" aria-required="true">
  </p>
  <p class="comment-form-email">
    <label class="email">Email</label>
    <input id="email" name="email" type="text" value="" size="30" aria-required="true">
  </p>
  <p class="comment-form-comment">
    <label class="comment">Komentar</label>
    <textarea name="comment"></textarea>
  </p>
  <div class="clearfix"></div>
  <p class="form-submit">
   <input type="submit" id="submit" value="Tambahkan Komentar">
 </p>
 <div class="clearfix"></div>
</form>

</div>
<div class="post mag-innert-left">
  <a href="#"><h3>Artikel Terkait</h3></a>
  <div class="post-grids">
    <div class="col-md-3 post-left">
     <a href="single.html"><img src="images/f1.jpg" alt=""></a>
   </div>
   <div class="col-md-9 post-right">
     <h4><a href="single.html">Artikel Terkait</a></h4>
     <p class="comments">August 28 2015, <a href="#">8 Comments</a></p>
     <p class="text">Artikel Terkait</p>
   </div>
   <div class="clearfix"> </div>
 </div>
</div>
<!--//leave-->
</div>
@endsection
