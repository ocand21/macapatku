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
      {{$serat->title}}
    </div>
    <div class="card-body">
      <div class="text-right" style="margin-bottom: 10px;">
        <a href="{{route('serat.edit', $serat->id)}}" class="btn btn-success"><span class="fa fa-pencil"> Sunting</span></a>
        <form action="{{route('serat.destroy', $serat->id)}}" method="POST">
               <input type="submit" value="Hapus" class="btn btn-danger btn-block" data-toggle="confirmation">
               <input type="hidden" name="_token" value="{{Session::token()}}">
               {{method_field('DELETE')}}
        </form>
        <a href="{{route('serat.index')}}" class="btn btn-info"><span class="fa fa-close"> Kembali</span></a>
      </div>
      <div class="table-responsive">
        <div class="text-center">
          <h2>{{$serat->title}}</h2>
          <h5>Karya {{$serat->creator}}</h5>
           @if($serat->image)
                <img src="{{ asset('admin/images/serat/' . $serat->image) }}" style="height: 70px; width: 70px" class="img-thumbnail">
                @else
                <img src="{{ asset('admin/images/serat/icon.png') }}" style="height: 70px; width: 70px" class="img-thumbnail">
                @endif
          <p>{{$serat->caption}}</p>
        </div>
        <p>{!! $serat->body !!}</p>
      </div>
    </div>
  </div>




@endsection
