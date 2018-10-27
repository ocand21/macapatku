@extends('admin.main')

@section('title', 'Daftar Staf')

@section('content')

<!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Daftar Staf</li>
  </ol>

  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-admin"></i>
      Daftar Staf
    </div>
    <div class="card-body">
      <div class="text-right" style="margin-bottom: 10px;">
        <a href="{{route('staff.new')}}" class="btn btn-info btn-sm"><span class="fa fa-plus"> Staf Baru</span></a>
      </div>
      <div class="table-responsive">
        <table width="100%" class="table table-striped table-bordered" >
          <thead>
            <tr>
              <th>#</th>
              <th>Foto</th>
              <th>Nama</th>
              <th>Telepon</th>
              <th>Jabatan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>

          @foreach($admins as $admin)
          <tr class="odd gradeX">
              <td>{{ $admin->id}}</td>

              <td>
                <img src="{{ asset('admin/images/avatar/' . $admin->picture) }}" style="height: 70px; width: 70px">
              </td>
              <td>{{$admin->name}}</td>
              <td>{{$admin->phone}}</td>
              <td></td>
              <td width="13%" class="text-center">
                <a href="{{route('news.show', $admin->id)}}" class="btn btn-info btn-sm" title="Detail"><i class="fa fa-search"></i></a>
                <a href="{{route('news.edit', $admin->id)}}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-pencil"></i></a>
              </td>
          </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>




@endsection
