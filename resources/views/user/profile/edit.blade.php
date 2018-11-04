@extends('user.main')
@section('title', "Edit Profil")
@section('content')
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Form Edit Profil</h4>
            <form class="form-sample">
              <p class="card-description">
                Info Pribadi
              </p>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-9">
                      <select class="form-control">
                        <option>Laki-Laki</option>
                        <option>Perempuan</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-9">
                      <input class="form-control" placeholder="hari/bulan/tahun"/>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Pekerjaan</label>
                    <div class="col-sm-9">
                      <input class="form-control"/>
                    </div>
                  </div>
                </div>
                
              </div>
              <p class="card-description">
                Alamat
              </p>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Alamat Lengkap</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" />
                    </div>
                  </div>
                </div>
                
              </div>

              <p class="card-description">
                Tentang Saya
              </p>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Alamat Lengkap</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" />
                    </div>
                  </div>
                </div>
                
              </div>
              
                
              
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('js')
<script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
    </script>

    <script src="/users/tinymce/tinymce.min.js"></script>

    <script>
      tinymce.init({
        selector: 'textarea',
        plugins: 'image'
      });
    </script>
@endsection