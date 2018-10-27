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
      <!--  -->
      <div class="col-lg-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h3 class="h4">{{$article->title}}</h3>
                </div>
                <div class="card-body">
                  <table class="table table-responsive">
                    <tbody>
                      <tr>
                        <th>Judul</th>
                        <td>{{$article->title}}</td>
                      </tr>
                      <tr>
                        <th>Gambar</th>
                        <td>
                          <img src="{{ asset('users/images/articles/' . $article->image) }}" class="img-responsive">
                        </td>
                      </tr>
                      <tr>
                        <th>Caption Gambar</th>
                        <td>
                          {{$article->caption}}
                        </td>
                      </tr>
                      <tr>
                        <th>Isi</th>
                        <td>
                          {!! $article->body !!}
                        </td>
                      </tr>
                    </tbody>
                  </table>

                  <hr>
                </div>
              </div>
       </div>
       <!--  -->

       

      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header d-flex align-items-center">
              <h3 class="h4">Aksi</h3>
            </div>
            <div class="card-body">
          
            <table class="table">
                 <tbody>
                   <tr>
                     <th>Status</th>
                     <td>
                       @if($article->acceptable==0)
                       <button class="btn btn-warning btn-disable">PENDING</button>
                       @else
                       <button class="btn btn-info">DITERBITKAN</button>
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
               <a href="{{route('article.edit', $article->id)}}" class="btn btn-primary btn-block">Edit</a>
               <hr>
               <form action="{{route('article.destroy', $article->id)}}" method="POST">
                 <input type="submit" value="Hapus" class="btn btn-danger btn-block" data-toggle="confirmation">
                 <input type="hidden" name="_token" value="{{Session::token()}}">
                 {{method_field('DELETE')}}
               </form>

               <script type="text/javascript">
               $(document).ready(function () {
                 $('[data-toggle=confirmation]').confirmation({
                     rootSelector: '[data-toggle=confirmation]',
                     onConfirm: function (event, element) {
                         element.closest('form').submit();
                     }
                 });
               });
               </script>
               <hr>
               <a href="{{route('article.published')}}" class="btn btn-default btn-block"><< Kembali</a>
             </div>
          </div>
        </div>

      </div>

    
    </div>

  </section>
@endsection
