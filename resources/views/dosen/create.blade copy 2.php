@extends('layouts.app')

@section('meta_tags')
  <meta name="csrf_token" content="{{ csrf_token() }}">
@stop

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
    <form class="form-horizontal" id="myForm">
        @csrf
      <x-adminlte-card title="Tambah Data Dosen" theme="maroon" theme-mode="outline" class="elevation-3"
        header-class="bg-light" footer-class="bg-maroon border-top rounded border-light" icon="fas fa-lg fa-address-card"
        maximizable>
        <div class="row">
          <div class="col-md-2">
            <h5>Nama Lengkap</h5>
          </div>
          <div class="col-md-9">
            <div class="form-group">
              <x-adminlte-input name="namaLengkap" placeholder="Masukkan nama lengkap" required />
            </div>
          </div>
        </div>
        <x-slot name="footerSlot">
          <x-adminlte-button class="d-flex ml-auto" theme="light" id="save" type="submit" label="submit"
            icon="fas fa-sign-in" />
        </x-slot>
      </x-adminlte-card>
    </form>
  </div>
@stop
@section('footer')
  @include('components.footer')
@endsection
@push('js')
  <script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $(document).ready(function() {
      // Bind form submit event
      $('#myForm').submit(function(e) {
        e.preventDefault();

        // Send AJAX request
        $.ajax({
          url: "{{ route('dosen.store') }}",
          method: "POST",
          data: {
            _token: '{{ csrf_token() }}',
            $(this).serialize(),
          }
          success: function(response) {
            // Handle successful response
            console.log(response);
          },
          error: function(xhr) {
            // Handle error response
            if (xhr.status === 422) {
              // Validation error
              let errors = xhr.responseJSON.errors;
              $.each(errors, function(field, messages) {
                // Show error message for each field
                $(`[name="${field}"]`).parent().find('.invalid-feedback').text(messages[0]);
                $(`[name="${field}"]`).addClass('is-invalid');
              });
            } else {
              // Other error
              console.error(xhr.responseText);
            }
          }
        });
      });

      // Add validation classes and messages to form fields
      $('[required]').each(function() {
        $(this).addClass('is-valid').after(`<div class="invalid-feedback">This field is required.</div>`);
      });
    });
  </script>
@endpush
