@extends('user.main')
@section('title', 'Daftar Dokumen')
@section('content')
    <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Daftar Dokumen</h4>
                        <p class="card-description">
                        <a href="{{ route('file.create')}}" class="btn btn-success"><i class="mdi mdi-upload"></i>Unggah</a> Dokumen 
                        </p>
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