@extends('layouts.app')
{{-- @livewireStyes --}}
@section('content_header')
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Pengajuan Perijinan</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="home">Home</a></li>
          <li class="breadcrumb-item active">Perijinan</li>
        </ol>
      </div>
    </div>
  </div>
@stop
{{-- @section('plugins.KrajeeFileinput', true) --}}
@section('plugins.DatatablesPlugin', true)
@section('content')

  <div class="container-fluid">
    {{-- Minimal example / fill data using the component slot --}}
    <div class="row">
      <div class="col-md-12">
        <x-adminlte-card title="Pengajuan Ijin" theme="primary" icon="fas fa-lg fa-fan">
          <div class="row">
            <x-adminlte-button label="Buat Pengajuan" theme="primary" icon="fas fa-folder-plus"
              onclick="location.href='{{ route('ijin-dosen.create') }}'" />
          </div>
          <div class="row pt-2">
            <div class="col-md-12">
              <table class="table table-bordered table-striped data-table" id="data-ijin">
                <thead class="text-center">
                  <tr>
                    <th>No</th>
                    <th>Tujuan</th>
                    <th>Kegiatan</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Status</th>
                    <th>Detail</th>
                  </tr>
                </thead>
                <livewire:ijin-dosen-index />
              </table>
            </div>
          </div>
        </x-adminlte-card>
      </div>
    </div>
  </div>
@stop
@section('footer')
  @include('components.footer')
  {{-- @livewireScripts --}}
@endsection
@push('js')
  <script>
    $(document).ready(function() {
      //   console.log('Data sebelum inisialisasi DataTables:',);
      $('#data-ijin').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
      });
    });
  </script>
  <script>
    // function autoRefresh() {
    //   window.location = window.location.href;
    // }
    // setInterva('autoRefresh()', 2000);
    @if (Session::has('success'))
      Swal.fire(
        'Sukses!',
        '{{ Session::get('success') }}',
        'success'
      )
    @elseif (Session::has('error'))
      Swal.fire(
        'Error!',
        '{{ Session::get('error') }}',
        'error'
      )
    @endif
  </script>
  {{-- <script>
</script> --}}
@endpush
