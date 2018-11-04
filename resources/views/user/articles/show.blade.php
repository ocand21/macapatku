@extends('user.main')
@section('title', "$article->title")
@section('content')
    <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Detail Artikel</h4>

                        <h5 class="text-center display-4">{{$article->title}}</h5>
                        <div class="text-center table-responsive">
                            <img src="{{ asset('users/images/articles/' . $article->image) }}">
                        <p class="card-description">{{$article->caption}}</p>
                        </div>
                        <p>{!! $article->body !!}</p>
                        
                      </div>
                    </div>
                  </div>
    </div>
    <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Detail Artikel</h4>

                        <table class="table">
                                <tbody>
                                  <tr>
                                    <th>Status</th>
                                    <td>
                                            @if($article->acceptable==0)
                                            <label class="badge badge-danger">PENDING</label>
                                            @else
                                            <label class="badge badge-success">DITERBITKAN</label>
                                            @endif
                                    </td>
                                  </tr>
                                  @if($article->acceptable==1)
                                  <tr>
                                    <th>URL Artikel</th>
                                    <td><a href="{{ url('article/'.$article->slug)}}">{{url('article/'.$article->slug)}}</a></td>
                                  </tr>
                                  @endif
                                  <tr>
                                    <th>Tgl Diterbitkan:</th>
                                    <td>{{ date('M j, Y', strtotime($article->updated_at)) }}</td>
                                  </tr>
                                </tbody>
                              </table>
                              <a href="{{route('article.edit', $article->id)}}" class="btn btn-warning btn-block">Edit</a>
                              <hr>
                              <form action="{{route('article.destroy', $article->id)}}" method="POST">
                                <input type="submit" value="Hapus" class="btn btn-danger btn-block" data-toggle="confirmation">
                                <input type="hidden" name="_token" value="{{Session::token()}}">
                                {{method_field('DELETE')}}
                              </form>
                              <hr>
               <a href="{{route('article.index')}}" class="btn btn-light btn-block"><< Kembali</a>
                        
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