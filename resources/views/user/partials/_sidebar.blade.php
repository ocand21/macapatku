<!-- Side Navbar -->
<nav class="side-navbar">
  <!-- Sidebar Header-->
  <div class="sidebar-header d-flex align-items-center">
    @if(Auth::user()->picture)
    <div class="avatar"><img src="{{ asset('users/images/avatar/' . Auth::user()->picture) }}" alt="..." class="img-fluid rounded-circle"></div>
    @else
    <div class="avatar"><img src="{{ asset('users/images/avatar/avatar.png') }}" alt="..." class="img-fluid rounded-circle"></div>
    @endif
    <div class="title">
      <h1 class="h4">{{Auth::user()->name}}</h1>
      <p>Web Designer</p>
    </div>
  </div>
  <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
  <ul class="list-unstyled">
    <li class="active"> <a href="{{route('dashboard')}}"><i class="icon-home"></i>Home</a></li>
    <li><a href="#dashvariants" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Artikel</a>
    <ul id="dashvariants" class="collapse list-unstyled">
      <li><a href="{{route('article.published')}}">Diterbitkan</a></li>
      <li><a href="{{route('article.pending')}}">Pending</a></li>
      <li><a href="{{route('draft.index')}}">Draft</a></li>
    </ul>
  </li>
  <li> <a href="{{route('file.index')}}"> <i class="fa fa-file"></i> Berkas </a></li>
</nav>
