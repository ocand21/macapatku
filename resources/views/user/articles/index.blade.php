@extends('user.main')
@section('title', 'Daftar Artikel')
@section('content')
    <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Daftar Artikel</h4>
                        <p class="card-description">
                        Mulai menulis artikel <a href="{{ route('article.create')}}" class="btn btn-success"><i class="mdi mdi-message-text"></i>Di sini</a>
                        </p>

                        <table width="100%" class="table table-striped table-bordered" >
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Gambar</th>
                                    <th>Judul</th>
                                    <th>Isi</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                  </tr>
                                </thead>
                                <tbody>
            
                                @foreach($articles as $article)
                                <tr class="odd gradeX">
                                    <td>{{ $article->id}}</td>
                                    
                                    <td>
                                      <img src="{{ asset('users/images/articles/' . $article->image) }}" style="height: 70px; width: 70px">
                                    </td>
                                    <td>{{ substr($article->title, 0, 30) }}{{ strlen($article->title) > 30 ? "..." : "" }}</td>
                                    <td>{!! substr($article->body, 0, 300) !!}{!! strlen($article->body) > 300 ? "..." : "" !!}</td>
                                    <td>
                                            @if($article->acceptable==0)
                                            <label class="badge badge-danger">Pending</label>
                                            @else
                                            <label class="badge badge-success">Diterbitkan</label>
                                            @endif
                                    </td>
                                    <td class="text-center">
                                      <a href="{{ route('article.show', $article->id) }}" class="btn btn-xs btn-inverse-success btn-fw" style="margin-bottom: 5px;">Detail</a>
                                      <a href="{{ route('article.edit', $article->id) }}" class="btn btn-xs btn-inverse-warning btn-fw">Edit</a>
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