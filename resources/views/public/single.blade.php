@section('title', '| Artikel')
@extends('public.main')

@section('banner')

<!--/start-banner-->
<div class="banner two">
       <div class="container">
	           <h2 class="inner-tittle">Single Page</h2>
       </div>
    </div>  <!--//end-banner-->
@endsection
@section('content')

<div class="col-md-8">
								<div class="edit-pics" style="margin-bottom: 20px">
							      <div class="editor-pics">
										 <div class="col-md-3 item-pic">
										   <img src="/users/images/ocand.jpg" class="img-responsive img-circle" style="height: 80px; width: 80px; margin-left: 40px" alt=""/>
										   </div>
											<div class="col-md-9 item-details">
												<h5 class="inner two"><a href="#">{{$article->users->name}}</a></h5>
                        <p><i>Dosen</i></p>
                      </div>
											<div class="clearfix"></div>
										</div>
									</div>
<div class="banner-bottom-left-grids  mag-innert-left">
											<div class="single-left-grid">
												<img src="{{ asset('users/images/articles/' . $article->image) }}" alt="{{$article->caption}}" class="img-responsive">
                        <p><i>{{$article->caption}}</i></p>
												<p class="text">
                        {!! $article->body !!}
                        </p>
                        <div class="single-bottom">
													<ul>
														<li><a href="#">Designer inspiration</a></li>
														<li>{{ date( 'M j, Y', strtotime($article->updated_at)) }}</li>
														<li><a href="#">{{$article->users->name}}</a></li>
														<li><a href="#">5 Comments</a></li>
													</ul>
												</div>
											</div>
									</div>

                  <!--leave-->
                <div class="leave mag-innert-left">
                  <h4>Leave a comment</h4>
                  <form id="commentform">
                     <p class="comment-form-author-name"><label for="author">Name</label>
                      <input id="author" type="text" value="" size="30" aria-required="true">
                     </p>
                     <p class="comment-form-email">
                      <label class="email">Email</label>
                      <input id="email" type="text" value="" size="30" aria-required="true">
                     </p>
                     <p class="comment-form-comment">
                      <label class="comment">Comment</label>
                      <textarea></textarea>
                     </p>
                     <div class="clearfix"></div>
                    <p class="form-submit">
                       <input type="submit" id="submit" value="Send">
                    </p>
                    <div class="clearfix"></div>
                     </form>

                  </div>
									<div class="post mag-innert-left">
									   <a href="#"><h3>Latest Posts</h3></a>
									        <div class="post-grids">
												<div class="col-md-3 post-left">
													<a href="single.html"><img src="images/f1.jpg" alt=""></a>
												</div>
												<div class="col-md-9 post-right">
													<h4><a href="single.html">Silicon Valley Shows Signs of Dot-Com Frenzy</a></h4>
													<p class="comments">August 28 2015, <a href="#">8 Comments</a></p>
													<p class="text">Lorem ipsum ex vix illud nonummy, novum tation et his. At vix scripta patrioque scribentur Lorem ipsum ex vix illud nonummy, novum tation et his. At vix scripta patrioque scribentur......</p>
												</div>
												<div class="clearfix"> </div>
											</div>
											<div class="post-grids">
												<div class="col-md-3 post-left">
													<a href="single.html"><img src="images/f2.jpg" alt=""></a>
												</div>
												<div class="col-md-9 post-right">
													<h4><a href="single.html">Silicon Valley Shows Signs of Dot-Com Frenzy</a></h4>
													<p class="comments">August 30 2015, <a href="#">8 Comments</a></p>
													<p class="text">Lorem ipsum ex vix Lorem ipsum ex vix illud nonummy, novum tation et his. At vix scripta patrioque scribentur... illud nonummy, novum tation et his. At vix scripta patrioque scribentur...</p>
												</div>
												<div class="clearfix"> </div>
											</div>
											<div class="post-grids">
												<div class="col-md-3 post-left">
													<a href="single.html"><img src="images/f3.jpg" alt=""></a>
												</div>
												<div class="col-md-9 post-right">
													<h4><a href="#">Silicon Valley Shows Signs of Dot-Com Frenzy</a></h4>
													<p class="comments">Sep 4 2015, <a href="#">8 Comments</a></p>
													<p class="text">Lorem ipsum ex vix illud nonummy,Lorem ipsum ex vix illud nonummy, novum tation et his. At vix scripta patrioque scribentur... novum tation et his. At vix scripta patrioque scribentur...</p>
												</div>
												<div class="clearfix"> </div>
											</div>
											<div class="post-grids">
												<div class="col-md-3 post-left">
													<a href="single.html"><img src="images/f4.jpg" alt=""></a>
												</div>
												<div class="col-md-9 post-right">
													<h4><a href="#">Silicon Valley Shows Signs of Dot-Com Frenzy</a></h4>
													<p class="comments">Sep 4 2015, <a href="#">8 Comments</a></p>
													<p class="text">Lorem ipsum ex vix illud nonummy, novum tation et his.Lorem ipsum ex vix illud nonummy, novum tation et his. At vix scripta patrioque scribentur... At vix scripta patrioque scribentur...</p>
												</div>
												<div class="clearfix"> </div>
											</div>
										</div>
							 <!--//leave-->
</div>
@endsection
