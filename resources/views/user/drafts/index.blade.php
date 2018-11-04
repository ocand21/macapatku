@extends('user.main')
@section('title', 'Daftar Draft')
@section('content')
    <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Daftar Draft</h4>
                        <p class="card-description">
                        Mulai menulis artikel <a href="{{ route('article.create')}}" class="btn btn-success"><i class="mdi mdi-message-text"></i>Di sini</a>
                        </p>

                        <table width="100%" class="table table-striped  table-bordered" >
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Gambar</th>
                                    <th>Judul</th>
                                    <th>Isi</th>
                                    <th>Aksi</th>
                                  </tr>
                                </thead>
                                <tbody>
                                @foreach($drafts as $draft)
                                <tr class="odd gradeX">
                                    <td>{{ $draft->id}}</td>
                                    <td>
                                      <img src="{{ asset('users/images/articles/' . $draft->image) }}" class="img-responsive" style="height: 70px; width: 70px;">
                                    </td>
                                    <td>{{ substr($draft->title, 0, 30) }}{{ strlen($draft->title) > 30 ? "..." : "" }}</td>
                                    <td>{!! substr($draft->body, 0, 300) !!}{!! strlen($draft->body) > 300 ? "..." : "" !!}</td>
                                    <td class="text-center">
                                            <a href="{{ route('draft.publish', $draft->id) }}" class="btn btn-xs btn-inverse-warning btn-fw">Terbitkan</a>
                                            <a href="{{ route('draft.destroy', $draft->id) }}" class="btn btn-xs btn-inverse-danger btn-fw">Hapus</a>
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