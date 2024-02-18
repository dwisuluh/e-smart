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
@section('plugins.Select2', true)
@php
  $config = [
    //   'allowedFileTypes' => ['text', 'office', 'pdf'],
      'allowedFileTypes' => ['pdf'],
      'browseOnZoneClick' => true,
      'theme' => 'explorer-fa5',
  ];
  $dateRange = [
      'locale' => ['format' => 'YYYY/MM/DD'],
  ];
@endphp
@php
  $select2 = [
      'placeholder' => 'Select multiple options...',
      'allowClear' => true,
  ];
@endphp
@section('content')
  <div class="container-fluid">
    <form class="form-horizontal needs-validation" novalidate method="POST" action="{{ route('ijin-dosen.store') }}"
      enctype="multipart/form-data">
      @csrf
      <x-adminlte-card title="Pengajuan" theme="maroon" theme-mode="outline" class="elevation-3" header-class="bg-light"
        footer-class="bg-maroon border-top rounded border-light" icon="fas fa-lg fa-address-card" maximizable>
        <div class="row">
          <div class="col-md-2">
            <h5>Pengusul</h5>
          </div>
          <div class="col-md-9 has-validation">
            <x-adminlte-input name="pengusul" placeholder="Isikan nama lengkap beserta dengan gelar"
              value="{{ Auth::user()->name }}" required readonly />
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
            <h5>TIM</h5>
          </div>
          <div class="col-md-9">
            {{-- <x-adminlte-input name="anggotaTIM" placeholder="Nama Anggota" value="{{ old('anggotaTIM') }}" required /> --}}
            <x-adminlte-select2 id="sel2Category" name="anggotaTIM[]" label-class="text-danger" igroup-size="md"
              :config="$select2" multiple enable-old-support>
              <x-slot name="prependSlot">
                <div class="input-group-text bg-gradient-red">
                  <i class="fas fa-tag"></i>
                </div>
              </x-slot>
              {{-- <x-slot name="appendSlot">
                <x-adminlte-button theme="outline-dark" label="Clear" icon="fas fa-lg fa-ban text-danger"
                  id="clearBtn" />
              </x-slot> --}}
              @foreach ($dosen as $data)
                <option value="{{ $data->id }}">{{ $data->name }}</option>
              @endforeach
            </x-adminlte-select2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
            <h5>Tanggal Pelaksanaan</h5>
          </div>
          <div class="col-md-9">
            <x-adminlte-date-range name="tglPelaksanaan" placeholder="Select a date range..." :config="$dateRange"
              value="{{ old('tglPelaksanaan') }}">
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
            <h5>Tujuan / Tempat</h5>
          </div>
          <div class="col-md-9">
            <x-adminlte-text-editor name="tujuan" required value="{{ old('tujuan') }}" enable-old-support />
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
            <h5>Nama Kegiatan</h5>
          </div>
          <div class="col-md-9">
            <x-adminlte-text-editor name="kegiatan" value="{{ old('kegiatan') }}" enable-old-support />
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
            <h5>Dokumen Pendukung</h5>
          </div>
          <div class="col-md-9">
            <x-adminlte-input-file-krajee name="file" data-msg-placeholder="file undangan, permohonan"
              label-class="text-primary" :config="$config" required />
          </div>
        </div>
        {{-- <div class="row">
          <div class="col-md-2">
            Select
          </div>
          <div class="col-md-9">
            @php
              $config = [
                  'placeholder' => 'Select multiple options...',
                  'allowClear' => true,
              ];
            @endphp
            <x-adminlte-select2 id="sel2Category" name="sel2Category[]" label-class="text-danger" igroup-size="sm"
              :config="$config" multiple>
              <x-slot name="prependSlot">
                <div class="input-group-text bg-gradient-red">
                  <i class="fas fa-tag"></i>
                </div>
              </x-slot>
              <x-slot name="appendSlot">
                <x-adminlte-button theme="outline-dark" label="Clear" icon="fas fa-lg fa-ban text-danger" />
              </x-slot>
              <option>Sports</option>
              <option>News</option>
              <option>Games</option>
              <option>Science</option>
              <option>Maths</option>
            </x-adminlte-select2>
          </div>
        </div> --}}
        <x-slot name="footerSlot">
          <x-adminlte-button class="d-flex ml-auto" theme="light" type="submit" label="submit" icon="fas fa-sign-in" />
        </x-slot>
      </x-adminlte-card>
    </form>
  </div>
@stop
@section('footer')
  @include('components.footer')
@endsection
