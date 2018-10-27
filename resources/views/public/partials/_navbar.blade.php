<div class="header" id="home">
	 <div class="content white">
		<nav class="navbar navbar-default" role="navigation">
		   <div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.html"><h1>E-Macapat<span>Ku</span></h1> </a>
			</div>
			<!--/.navbar-header-->

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					 <li><a href="{{url('/')}}">Beranda</a></li>
					 <li><a href="{{route('page.single', 'sejarah-sobokarti')}}">Sobokarti</a></li>
				    <li class="dropdown">
						<a href="entertainment.html" class="dropdown-toggle" data-toggle="dropdown">Macapat<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="{{route('page.single', 'pengertian-macapat')}}">Pengertian</a></li>
							<li class="divider"></li>
							<li><a href="{{route('page.single', 'pembelajaran-macapat')}}">Pembelajaran</a></li>
							<li class="divider"></li>
							<li><a href="{{route('page.serat')}}">Kumpulan Serat</a></li>
						</ul>
					  </li>
						<li><a href="{{route('page.gallery')}}">Galeri</a></li>
 					 <li><a href="{{route('page.articles')}}">Artikel</a></li>
					 <li><a href="{{route('page.news')}}">Berita</a></li>
					 <li><a href="{{route('page.contact')}}">Kontak</a></li>
					 @if(Auth::guard('web')->check())
					 <li><a href="{{route('dashboard')}}">Dashboard</a></li>
					 @else
					 <li><a href="{{route('login')}}">Login</a></li>
					 @endif
				</ul>
			</div>
			<!--/.navbar-collapse-->
	 <!--/.navbar-->
     </div>
	</nav>
  </div>
 </div>
