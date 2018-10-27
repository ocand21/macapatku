@extends('admin.main')

@section('title', 'Kategori')

@section('content')

<!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Kategori</li>
  </ol>

  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-admin"></i>
      Kategori
    </div>
    <div class="card-body">
      <div class="row">
      <div class="col-lg-8">
        <table width="100%" class="table table-striped table-bordered" >
          <thead>
            <tr>
              <th>#</th>
              <th>Nama Kategori</th>
            </tr>
          </thead>
          <tbody>

          @foreach($category as $categories)
          <tr class="odd gradeX">
              <td>{{ $categories->id}}</td>

              <td>{{$categories->name}}</td>
              <td width="13%" class="text-center">
                <a href="{{route('news.edit', $categories->id)}}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-pencil"></i></a>
              </td>
          </tr>
          @endforeach
          </tbody>
        </table>

      </div>
      <div class="col-lg-4">
        <h4>Tambah Kategori</h4>
        <form action="{{route('category.store')}}" method="POST">
          {{csrf_field()}}
          <div class="form-group">
            <label for="name">Nama Kategori</label>
            <input type="text" name="name" class="form-control" required>
          </div>
          <div class="form-group">
            <div class="text-right">
              <button type="submit" class="btn btn-success"><i class="fa fa-check"></i>Simpan</button>
            </div>

          </div>
        </form>
      </div>
      </div>
    </div>
  </div>




@endsection
