@extends('layouts.app')
@section('content_header')
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Pengajuan Perijinan</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ url('ijin-dosen') }}">Perijinan</a></li>
          <li class="breadcrumb-item active">Pengajuan</li>
        </ol>
      </div>
    </div>
  </div>
@stop
@section('plugins.Summernote', true)
@section('plugins.DateRangePicker', true)
@section('plugins.KrajeeFileinput', true)
@php
$config = [
    'allowedFileTypes' => ['text', 'office', 'pdf'],
    'browseOnZoneClick' => true,
    'theme' => 'explorer-fa5',
];
$dateRange = [
    "locale" => ["format" => "YYYY-MM-DD"],
]
@endphp
@section('content')
  <div class="container-fluid">
    <form class="form-horizontal needs-validation" novalidate method="POST" action="{{ route('ijin-dosen.store') }}" enctype="multipart/form-data">
        @csrf
      <x-adminlte-card title="Form Card" theme="maroon" theme-mode="outline" class="elevation-3" header-class="bg-light"
        footer-class="bg-maroon border-top rounded border-light" icon="fas fa-lg fa-address-card" maximizable>
        {{-- <x-slot name="toolsSlot">
        <select class="custom-select w-auto form-control-border bg-light">
          <option>Skin 1</option>
          <option>Skin 2</option>
          <option>Skin 3</option>
        </select>
      </x-slot> --}}
        <div class="row">
          <div class="col-md-2">
            <h5>Nama</h5>
          </div>
          <div class="col-md-9">
            <x-adminlte-input name="namaLengkap" placeholder="Nama Lengkap" />
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
            <h5>Anggota</h5>
          </div>
          <div class="col-md-9">
            <x-adminlte-input name="anggota1" placeholder="Nama Anggota" />
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
            <h5>Tanggal Pelaksanaan</h5>
          </div>
          <div class="col-md-9">
            <x-adminlte-date-range name="tglPelaksanaan" placeholder="Select a date range..." :config="$dateRange">
              <x-slot name="prependSlot">
                <div class="input-group-text bg-gradient-danger">
                  <i class="far fa-lg fa-calendar-alt"></i>
                </div>
              </x-slot>
            </x-adminlte-date-range>
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
            <h5>Tujuan</h5>
          </div>
          <div class="col-md-9">
            <x-adminlte-text-editor name="tujuan" />
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
            <h5>Judul</h5>
          </div>
          <div class="col-md-9">
            <x-adminlte-text-editor name="judul" />
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
            <h5>Judul</h5>
          </div>
          <div class="col-md-9">
            <x-adminlte-text-editor name="lain" />
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
            <h5>Judul</h5>
          </div>
          <div class="col-md-9">
            <x-adminlte-text-editor name="judul" />
          </div>
        </div>
        <x-adminlte-input-file-krajee name="kifLabel" label="Dokumen Pendukung"
          data-msg-placeholder="Choose a text, office or pdf file..." label-class="text-primary" :config="$config"
          disable-feedback />

        <x-slot name="footerSlot">
          <x-adminlte-button class="d-flex ml-auto" theme="light" type="submit" label="submit" icon="fas fa-sign-in" />
        </x-slot>
      </x-adminlte-card>
    </form>
  </div>
@endsection
@push('js')
<script>
  $(() => $("#drPlaceholder").val(''))
</script>
@endpush
