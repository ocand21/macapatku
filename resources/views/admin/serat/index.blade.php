@extends('admin.main')

@section('title', 'Kumpulan Serat')

@section('content')

<!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Kumpulan Serat</li>
  </ol>

  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-admin"></i>
      Kumpulan Serat
    </div>
    <div class="card-body">
      <div class="text-right" style="margin-bottom: 10px;">
        <a href="{{route('serat.create')}}" class="btn btn-info btn-sm"><span class="fa fa-plus">Tambahkan Serat</span></a>
      </div>
      <div class="table-responsive">
        <table width="100%" class="table table-striped table-bordered" >
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

          @foreach($kumpulan as $serat)
          <tr class="odd gradeX">
              <td>{{ $serat->id}}</td>

              <td>
                @if($serat->image)
                <img src="{{ asset('admin/images/serat/' . $serat->image) }}" style="height: 70px; width: 70px">
                @else
                <img src="{{ asset('admin/images/serat/icon.png') }}" style="height: 70px; width: 70px">
                @endif
              </td>
              <td>{{ substr($serat->title, 0, 30) }}{{ strlen($serat->title) > 30 ? "..." : "" }}</td>
              <td>{!! substr($serat->body, 0, 300) !!}{!! strlen($serat->body) > 300 ? "..." : "" !!}</td>
              <td width="13%" class="text-center">
                <a href="{{route('serat.show', $serat->id)}}" class="btn btn-info btn-sm" title="Detail"><i class="fa fa-search"></i></a>
                <a href="{{route('serat.edit', $serat->id)}}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-pencil"></i></a>
                <a href="{{route('serat.destroy', $serat->id)}}" class="btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash"></i></a>
              </td>
          </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>




@endsection
