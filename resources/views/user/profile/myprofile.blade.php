@extends('user.main')
@section('title', '| Profil')
@section('content')
      <header class="page-header">
        <div class="container-fluid">
          <h2 class="no-margin-bottom">Profil Saya</h2>
        </div>
      </header>
      <section class="tables">
  <div class="container-fluid">
    <div class="row">


      <div class="col-lg-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h3 class="h4">Profil Saya</h3>
                </div>
                <div class="card-body">
                  <div class="text-right" style="margin-bottom: 10px">
                    <a href="{{route('editProfile')}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>
                    <a href="" class="btn btn-danger"><i class="fa fa-cog" aria-hidden="true"></i>Ganti Password</a>
                  </div>
                  <div class="table-responsive">
                    <table class="table" width="100%" cellspacing="0">
                      <tbody>
                        <tr>
                          <th>Foto</th>
                          <td>
                            <div class="text-center">
                              <img src="{{ asset('users/images/avatar/' . Auth::user()->picture) }}" class="img-responsive img-thumbnail" alt="">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <th>Nama</th>
                          <td>{{Auth::user()->name}}</td>
                        </tr>
                        <tr>
                          <th>Email</th>
                          <td>{{Auth::user()->email}}</td>
                        </tr>
                        <tr>
                          <th>Telepon</th>
                          <td>{{Auth::user()->phone}}</td>
                        </tr>
                        <tr>
                          <th>Alamat</th>
                          <td>{{Auth::user()->address}}</td>
                        </tr>
                        <tr>
                          <th>Tentang Saya</th>
                          <td>{!!Auth::user()->aboutme!!}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


      </section>
@endsection
