<div class="col-md-4 mag-inner-right">
				  <div class="connect">
				    <h4 class="side" >TEMUKAN KAMI</h4>
					  <ul class="stay">
					    <li class="c5-element-facebook"><a href="#"><span class="icon"></span><h5>700</h5><span class="text">Followers</span></a></li>
                        <li class="c5-element-twitter"><a href="#"><span class="icon1"></span><h5>201</h5><span class="text">Followers</span></a></li>
						 <li class="c5-element-gg"><a href="#"><span class="icon2"></span><h5>111</h5><span class="text">Followers</span></a></li>
						<li class="c5-element-dribble"><a href="#"><span class="icon3"></span><h5>99</h5><span class="text">Followers</span></a></li>

					  </ul>
			      </div>
				   	   <!--/start-sign-up-->
						     <div class="sign_main">

							</div>
							<!--  -->

							  <!--//end-sign-up-->
							 <h4 class="side">Artikel Terpopuler</h4>
								<div class="edit-pics">
							      <div class="editor-pics">
									  @foreach($popularArticles as $article)
										 <div class="col-md-3 item-pic">
											<img class="img-responsive img-thumbnail" src="{{ asset('users/images/articles/' . $article->image) }}" alt=""/>
										   </div>
											<div class="col-md-9 item-details">
												<h5 class="inner two"><a href="{{route('article.single', $article->slug )}}">{{$article->title}}</a></h5>
											<div class="td-post-date two"><i class="glyphicon glyphicon-time"></i>{{date('d F, Y', strtotime($article->created_at))}} <a href="#"><i class="glyphicon glyphicon-comment"></i>{{$article->comments()->count()}} </a></div>
											 </div>
											<div class="clearfix"></div>
										@endforeach
										</div>
									</div>
							<!--//edit-pics-->
							<!--/top-news-->
								<div class="top-news">
								 <h4 class="side">Berita Terpopuler</h4>
							      <div class="top-inner">
									@foreach($popularNews as $news)
								     <div class="top-text">
										 <a href="{{$news->slug}}"><img class="img-responsive img-thumbnail" src="{{ asset('admin/images/news/' . $news->image) }}" alt="img25"/></a>
										 <h5 class="top"><a href="{{route('news.single', $news->slug)}}">{{$news->title}}</a></h5>
										 <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i>{{date('d F, Y', strtotime($news->created_at))}}</i>0 </a></div>
									 </div>
									 @endforeach
									  <!-- <div class="top-text two">
										 <a href="single.html"><img src="images/dest.jpg" class="img-responsive" alt=""/></a>
										 <h5 class="top"><a href="single.html">YOU’VE NEVER SEEN VIVID SYDNEY QUITE LIKE THIS</a></h5>
										 <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i>Feb 22, 2015 <a href="#"><i class="glyphicon glyphicon-comment"></i>0 </a></div>
								     </div> -->
								  </div>
	                            </div>
							<!--//top-news-->
						</div>
						<div class="clearfix"></div>
