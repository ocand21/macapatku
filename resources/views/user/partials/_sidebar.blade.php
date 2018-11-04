<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-category">
        <span class="nav-link">UMUM</span>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('dashboard')}}">
          <span class="menu-title">Dashboard</span>
          <i class="icon-speedometer menu-icon"></i>
        </a>
      </li>
      
      <li class="nav-item nav-category">
        <span class="nav-link">Postingan</span>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-artikel" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-title">Artikel</span>
          <i class="icon-grid menu-icon"></i>
        </a>
        <div class="collapse" id="ui-artikel">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('article.create')}}">Buat Artikel</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('article.index')}}">Daftar Artikel</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('draft.index')}}">
          <span class="menu-title">Draft</span>
          <i class="icon-grid menu-icon"></i>
        </a>
      </li>
      
      <li class="nav-item nav-category">
        <span class="nav-link">Dokumen</span>
      </li>
      <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#ui-dokumen" aria-expanded="false" aria-controls="ui-basic">
            <span class="menu-title">Dokumen</span>
            <i class="icon-layers menu-icon"></i>
          </a>
          <div class="collapse" id="ui-dokumen">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{route('file.create')}}">Unggah Dokumen</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{route('file.index')}}">Daftar Dokumen</a></li>
            </ul>
          </div>
        </li>
        
        <li class="nav-item nav-category">
            <span class="nav-link">PENGATURAN</span>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-akun" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-title">Akun</span>
              <i class="icon-wrench menu-icon"></i>
            </a>
            <div class="collapse" id="ui-akun">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('myprofile')}}">Profil</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('user.logout')}}">Keluar</a></li>
              </ul>
            </div>
          </li>
    </ul>
  </nav>