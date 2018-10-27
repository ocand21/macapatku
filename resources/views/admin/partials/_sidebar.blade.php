<!-- Sidebar -->
<ul class="sidebar navbar-nav">
  <li class="nav-item active">
    <a class="nav-link" href="{{route('admin.dashboard')}}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-fw fa-table"></i>
      <span>Artikel Pengguna</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
      <h6 class="dropdown-header">Artikel</h6>
      <a class="dropdown-item" href="{{route('admin.article.pending')}}">Butuh Persetujuan</a>
      <a class="dropdown-item" href="{{route('admin.article.published')}}">Telah Disetujui</a>
    </div>
  </li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-newspaper-o"></i>
        <span>Berita</span>
      </a>
      <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <h6 class="dropdown-header">Daftar Berita</h6>
        <a class="dropdown-item" href="{{route('news.create')}}">Buat Berita</a>
        <a class="dropdown-item" href="{{route('news.index')}}">Daftar Berita</a>
      </div>
    </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-fw fa-file"></i>
      <span>Halaman</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
      <h6 class="dropdown-header">Daftar Halaman</h6>
      <a class="dropdown-item" href="{{route('pages.create')}}">Buat Halaman</a>
      <a class="dropdown-item" href="{{route('pages.index')}}">Halaman Website</a>
    </div>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-fw fa-book"></i>
      <span>Serat</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
      <h6 class="dropdown-header">Daftar Serat</h6>
      <a class="dropdown-item" href="{{route('serat.create')}}">Buat Serat</a>
      <a class="dropdown-item" href="{{route('serat.index')}}">Kumpulan Serat</a>
    </div>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-fw fa-picture-o"></i>
      <span>Galeri</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
      <h6 class="dropdown-header">Galeri Website</h6>
      <a class="dropdown-item" href="{{route('gallery.upload')}}">Upload Foto</a>
      <a class="dropdown-item" href="{{route('gallery.index')}}">Daftar Galeri</a>
    </div>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-fw fa-gear"></i>
      <span>Pengaturan</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
      <h6 class="dropdown-header">Daftar Staf</h6>
      <a class="dropdown-item" href="{{route('admin.staff')}}">Daftar Staf</a>
      <a class="dropdown-item" href="{{route('category.index')}}">Daftar Kategori</a>
    </div>
  </li>
</ul>
