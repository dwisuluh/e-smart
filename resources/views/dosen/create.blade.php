@extends('layouts.app')

@section('title', 'Tambah Dosen')

@section('content_header')
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Master Dosen</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="home">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ url('dosen') }}">Data Dosen</a></li>
          <li class="breadcrumb-item active">Tambah Data Dosen</li>
        </ol>
      </div>
    </div>
  </div>
@stop
@section('plugins.TempusDominusBs4', true)
@section('content')
  <div class="container-fluid">
    <form action="{{ route('dosen.store') }}" novalidate method="POST" id="my-form">
      @csrf
      <x-adminlte-card title="Tambah Data Dosen" theme="maroon" theme-mode="outline" class="elevation-3"
        header-class="bg-light" footer-class="bg-maroon border-top rounded border-light" icon="fas fa-lg fa-address-card"
        maximizable>
        <div class="form-group row">
          <label for="name" class="col-md-2 col-form-label">Nama Lengkap</label>
          <div class="col-md-9">
            <input type="text" class="form-control" id="name" name="name" required>
            <div id="alert-name" class="invalid-feedback"></div>
          </div>
        </div>
        <div class="form-group row">
          <label for="nip" class="col-md-2 col-form-label">NIP/NIDK/NIPT</label>
          <div class="col-md-9">
            <input type="text" class="form-control" id="nip" name="nip" required>
            <div id="alert-nip" class="invalid-feedback"></div>
          </div>
        </div>
        <div class="form-group row">
          <label for="nidn" class="col-md-2 col-form-label">NIDN</label>
          <div class="col-md-9">
            <input type="text" class="form-control" id="nidn" name="nidn" required>
            <div id="alert-nidn" class="invalid-feedback"></div>
          </div>
        </div>
        <div class="form-group row">
          <label for="email" class="col-md-2 col-form-label">Email UNY</label>
          <div class="col-md-9">
            <input type="text" class="form-control" id="email" name="email" required>
            <div id="alert-email" class="invalid-feedback"></div>
          </div>
        </div>
        <div class="form-group row">
          <label for="noTelpon" class="col-md-2 col-form-label">No Telpon / Whatapps</label>
          <div class="col-md-9">
            <input type="text" class="form-control" id="noTelpon" name="noTelpon" required>
            <div id="alert-noTelpon" class="invalid-feedback"></div>
          </div>
        </div>
        {{-- <x-adminlte-input name="name" label="Name" rules="required" />
        <x-adminlte-input name="password" type="password" label="Password" rules="required|min:6" /> --}}
        <x-adminlte-button type="submit" label="Submit" theme="primary" />
      </x-adminlte-card>
    </form>
  </div>
@stop
@section('footer')
  @include('components.footer')
@endsection
@push('js')
  <script>
    $(document).ready(function() {
      $('#my-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
          url: $(this).attr('action'),
          method: $(this).attr('method'),
          data: $(this).serialize(),
          success: function(response) {
            if (response.success) {
              $('#message').removeClass('d-none').text('Form submitted successfully!');
              $('.invalid-feedback').hide();
              if (response.success) {
                Swal.fire({
                  // position: "top-end",
                  icon: "success",
                  text: response.message,
                  showConfirmButton: false,
                  timer: 1500
                }).then(function(){
                    window.location.href = response.redirect_url;
                });
              }
            }
          },
          error: function(xhr) {
            $('.form-control').removeClass('is-invalid');
            if (xhr.status === 422) {
              let errors = xhr.responseJSON.errors;
              for (const [field, messages] of Object.entries(errors)) {
                $(`#${field}`).addClass('is-invalid');
                $(`#alert-${field}`).html(messages.join(' '));
              }
            }
          }
        });
      });
    });
  </script>
@endpush
