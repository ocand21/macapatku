@extends('user.main')
@section('title', "Profil")
@section('content')
<div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-row">
                        <img src="{{ asset('users/images/avatar/' . Auth::user()->picture) }}" class="img-lg rounded"/>
                        <div class="ml-3">
                            <h6>{{Auth::user()->name}}</h6>
                            <p class="text-muted">{{Auth::user()->email}}</p>
                            <p class="mt-2 text-success font-weight-bold">Dosen</p>
                            <a href="{{ route('editProfile') }}" class="btn btn-xs btn-inverse-warning btn-fw" >Edit Profil</a>
                            <a href="" class="btn btn-xs btn-inverse-danger btn-fw">Ganti Password</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
</div>
<div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Detail</h4>
                    <p>Alamat</p>
                    <address>
                        <p class="font-weight-bold">{{Auth::user()->address}}</p>
                    </address>
                    <hr>
                    <p>No. Telepon</p>
                    <address class="text-primary">
                            <p class="mb-2">
                                    {{Auth::user()->phone}}
                            </p>
                    </address>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tentang Saya</h4>
                        <address>
                            <p class="font-weight-bold">{!!Auth::user()->aboutme!!}</p>
                        </address>
                    </div>
                </div>
            </div>
</div>
@endsection