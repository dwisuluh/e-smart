@extends('layouts.app')
@section('title', 'Data Dosen')
@section('content_header')
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Detail Data Dosen</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="home">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ url('dosen') }}">Data Dosen</a></li>
          <li class="breadcrumb-item active">Detail</li>
        </ol>
      </div>
    </div>
  </div>
@stop
@section('content')
<div class="container col-md-8">
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg"
                alt="User profile picture">
            </div>
            <h3 class="profile-username text-center">{{ $dosen->name }}</h3>
            <p class="text-muted text-center">{{ $dosen->nip }}</p>

            <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                    <b>NIDN</b> <a class="float-right">{{ $dosen->nidn }}</a>
                </li>
                <li class="list-group-item">
                    <b>E-Mail</b> <a class="float-right">{{ $dosen->email }}</a>
                </li>
                <li class="list-group-item">
                    <b>No Telpon / Whatapps</b> <a class="float-right">{{ $dosen->noTelp }}</a>
                </li>
            </ul>

            <a href="{{ url()->previous() }}" class="btn btn-primary btn-block"><b>Back</b></a>
        </div>
        <!-- /.card-body -->
    </div>
</div>
    @endsection
