@extends('user.main')
@section('title', '| Dashboard Pengguna')
@section('content')
      <header class="page-header">
        <div class="container-fluid">
          <h2 class="no-margin-bottom">Artikel</h2>
        </div>
      </header>
      <section class="tables">
  <div class="container-fluid">
    <div class="row">


      <div class="col-lg-12">

      <a href="{{route('file.upload')}}" class="btn btn-primary" style="margin-bottom: 10px">Upload Berkas</a>
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h3 class="h4">Berkas</h3>
                </div>
                <div class="card-body">
                  <table width="100%" class="table table-striped  table-bordered" >
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Judul</th>
                        <th>Path</th>
                        <th>URL</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>

                    @foreach($files as $file)
                    <tr class="odd gradeX">
                        <td>{{ $file->id}}</td>
                        <td>{{ $file->title }}</td>
                        <td>{{ $file->filename }}</td>
                        <td><a href="{{ Storage::url($file->filename) }}">Unduh</a></td>
                        <td class="text-center">
                          <form action="{{route('file.destroy', $file->id)}}" method="POST">
                            <input type="submit" value="Hapus" class="btn btn-danger btn-block" data-toggle="confirmation">
                            <input type="hidden" name="_token" value="{{Session::token()}}">
                            {{method_field('DELETE')}}
                          </form>
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

      </section>
@endsection
