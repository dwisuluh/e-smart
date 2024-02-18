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
                <x-adminlte-input name="namaLengkap" label="Nama Lengkap" placeholder="Masukkan nama lengkap" required/>
            </div>
            {{-- <x-adminlte-input name="namaLengkap" class="form-control "
              placeholder="Nama Lengkap Beserta dengan Gelar ...." fgroup-class="has-error"
              v-error="{ fieldName: errors.first('namaLengkap') }" /> --}}
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
            <h5>NIP/NIDK/NIPT</h5>
          </div>
          <div class="col-md-9">
            <x-adminlte-input name="nip" class="form-control" placeholder="Nomor Induk Pegawai...">
              <x-slot name="bottomSlot">
                <div class="invalid-feedback" role="alert" id="alert-nip"></div>
              </x-slot>
            </x-adminlte-input>
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
            <h5>NIDN</h5>
          </div>
          <div class="col-md-9 has-validation">
            <x-adminlte-input name="nidn" placeholder="Nomor Induk Pegawai..." />
            {{-- <div class="invalid-feedback" role="alert" id="alert-nidn"></div> --}}
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
            <h5>Tempat Lahir</h5>
          </div>
          <div class="col-md-9">
            <x-adminlte-input name="tempatLahir" placeholder="Tempat Lahir..." />
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
            <h5>Tanggal Lahir</h5>
          </div>
          <div class="col-md-9">
            @php
              $config = ['format' => 'YYYY-MM-DD'];
            @endphp
            <x-adminlte-input-date name="tglLahir" :config="$config" placeholder="Choose a date...">
              <x-slot name="appendSlot">
                <div class="input-group-text bg-gradient-danger">
                  <i class="fas fa-calendar-alt"></i>
                </div>
              </x-slot>
            </x-adminlte-input-date>
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
            <h5>Nomor WA/Telp</h5>
          </div>
          <div class="col-md-9">
            <x-adminlte-input name="nomorWA" placeholder="Nomor Whatapps aktif..." />
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
            <h5>Email</h5>
          </div>
          <div class="col-md-9">
            <x-adminlte-input name="email" placeholder="Email aktif..." />
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
    $(function() {
      $('#save').click(function(e) {
        e.preventDefault();

        let nama = $('#namaLengkap').val();
        let nip = $('#nip').val();
        let nidn = $('#nidn').val();
        let token = $("meta[name='csrf-token']").attr("content");

        $.ajax({
          url: `/dosen`,
          type: "POST",
          cache: false,
          data: {
            "namaLengkap": nama,
            "nip": nip,
            "_token": token
          },
          success: function(response) {

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
          //   error: function(error) {
          //     if (error.responseJSON.errors) {
          //       handleErrors(error.responseJSON.errors);
          //     }
          //   }
          //   error: function(error) {
          //     if (error.responseJSON.namaLengkap) {
          //       // show alert
          //       $('#namaLengkap').addClass('is-invalid');
          //       //add message to alert
          //       $('#alert-namaLengkap').html(error.responseJSON.namaLengkap);
          //     }
          //     if (error.responseJSON.nip) {
          //       // show alert
          //       $('#nip').addClass('is-invalid');

          //       //add message to alert
          //       $('#alert-nip').html(error.responseJSON.nip);
          //     }
          //     if (error.responseJSON.nidn) {
          //       // show alert
          //       $('#nidn').addClass('is-invalid');

          //       //add message to alert
          //       $('#alert-nidn').html(error.responseJSON.nidn);
          //     }
          //   }
        });
      });
      $('[required]').each(function() {

        $(this).addClass('is-valid').after(`<div class="invalid-feedback">This field is required.</div>`);

      });
    });

    function handleErrors(errors) {
      // Menghapus pesan kesalahan sebelumnya
      $('.invalid-feedback').html('');
      $('.form-control').removeClass('is-invalid');

      // Menampilkan pesan kesalahan baru
      $.each(errors, function(field, messages) {
        var errorMessage = '<span class="invalid-feedback">' + messages.join(', ') + '</span>';
        $('[name="' + field + '"]').addClass('is-invalid').next('.invalid-feedback').html(errorMessage);
      });
    }
  </script>
@endpush
