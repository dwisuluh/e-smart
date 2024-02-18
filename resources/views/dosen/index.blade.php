@extends('layouts.app')
@section('content_header')
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Master Dosen</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="home">Home</a></li>
          <li class="breadcrumb-item active">Data Dosen</li>
        </ol>
      </div>
    </div>
  </div>
@stop
@section('plugins.DatatablesPlugin', true)
@section('plugins.BsCustomFileInput', true)
@section('content')
  @php
    $heads = ['ID', 'Nama', ['label' => 'NIP/NIDK/NIPT', 'width' => 40], 'Email', ['label' => 'Actions', 'no-export' => true, 'width' => 5]];
    $btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
      <i class="fa fa-lg fa-fw fa-pen"></i>
      </button>';
    $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
          <i class="fa fa-lg fa-fw fa-trash"></i>
          </button>';
    $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
              <i class="fa fa-lg fa-fw fa-eye"></i>
              </button>';

    $config = [
        'data' => [[22, 'John Bender', '+02 (123) 123456789', '<nobr>' . $btnEdit . $btnDelete . $btnDetails . '</nobr>'], [19, 'Sophia Clemens', '+99 (987) 987654321', '<nobr>' . $btnEdit . $btnDelete . $btnDetails . '</nobr>'], [3, 'Peter Sousa', '+69 (555) 12367345243', '<nobr>' . $btnEdit . $btnDelete . $btnDetails . '</nobr>']],
        'order' => [[1, 'asc']],
        'columns' => [null, null, null, ['orderable' => false]],
    ];
  @endphp
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-md-12">
        <x-adminlte-card title="Master Data Dosen" theme="primary" icon="fas fa-lg fa-user-graduate">
          <div class="row mb-2">
            <div class="col-md-12">
              <x-adminlte-button class="btn-md text-end float-sm-right mr-2" label="Tambah Data Dosen" theme="primary"
                icon="fas fa-folder-plus" onclick="location.href='{{ route('dosen.create') }}'" />
              <x-adminlte-button label="Import Data" theme="info" icon="fas fa-upload" data-keyboard="false"
                data-toggle="modal" data-target="#modalImport" class="bg-info text-end float-sm-right mr-2"
                data-backdrop="static" />

              {{-- <x-adminlte-button class="btn-md text-end float-sm-right mr-2" label=" Import" theme="info"
                icon="fas fa-upload" data-toggle="modal" data-target="#importExcel" data-backdrop="static"
                data-keyboard="false" /> --}}
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">

              {{-- <x-adminlte-datatable id="data-table" class="data-table" :heads="$heads" striped hoverable> --}}
              {{-- @foreach ($config['data'] as $row)
                    <tr>
                        @foreach ($row as $cell)
                        <td>{!! $cell !!}</td>
                        @endforeach
                    </tr>
                    @endforeach --}}
              {{-- <tbody></tbody> --}}
              {{-- </x-adminlte-datatable> --}}
              <table class="table table-bordered table-striped data-table" id="data-table">
                <thead class="text-center">
                  <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Email</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody></tbody>
                <tfoot class="text-center">
                  <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Email</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </x-adminlte-card>
      </div>
    </div>
  </div>
  {{-- Themed --}}
  <x-adminlte-modal id="modalImport" title="Import Data Dosen" theme="maroon" v-centered icon="fas fa-bolt"
    size='lg'>

    {{-- <x-adminlte-input-file name="ifPholder" igroup-size="sm" placeholder="Choose a file...">
      <x-slot name="prependSlot">
        <div class="input-group-text bg-lightblue">
          <i class="fas fa-upload"></i>
        </div>
      </x-slot>
    </x-adminlte-input-file> --}}

    {{-- With label and feedback disabled --}}
    {{-- <x-adminlte-input-file name="ifLabel" label="Upload file" placeholder="Choose a file..." disable-feedback /> --}}

    {{-- With multiple slots and multiple files --}}
    <form method="post" action="{{ route('import-dosen') }}" enctype="multipart/form-data" class="needs-validation"
      novalidate>
      @csrf
      <x-adminlte-input-file id="ifMultiple" name="file" label="Upload files" placeholder="Choose files..."
        igroup-size="lg" legend="Choose" required>
        <x-slot name="appendSlot">
          <x-adminlte-button theme="primary" type="submit" label="Upload" />
        </x-slot>
        <x-slot name="prependSlot">
          <div class="input-group-text text-primary">
            <i class="fas fa-file-upload"></i>
          </div>
        </x-slot>
      </x-adminlte-input-file>
      <x-slot name="footerSlot">
        {{-- <x-adminlte-button class="mr-auto" theme="success" type="submit" label="Accept" /> --}}
        <x-adminlte-button theme="danger" label="Dismiss" data-dismiss="modal" />
      </x-slot>
    </form>
  </x-adminlte-modal>
  {{-- Example button to open modal --}}
  {{-- <x-adminlte-button label="Open Modal" data-toggle="modal" data-target="#modalPurple" class="bg-purple"/> --}}
@stop
@section('footer')
  @include('components.footer')
@endsection
@push('js')
  <script>
    $(document).ready(function() {

      var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });

      var table = $('#data-table').DataTable({
        // paging: true,
        lengthChange: true,
        searching: true,
        ordering: true,
        responsive: true,
        info: true,
        autoWidth: true,
        responsive: true,
        dom: 'Bfrtip',
        lengthMenu: [
          [10, 25, 50, -1],
          ['10 rows', '25 rows', '50 rows', '100 rows', 'Show all']
        ],
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print', 'colvis', 'pageLength'],
        processing: true,
        serverSide: true,
        ajax: "{{ route('dosen.index') }}",
        columns: [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex',
            className: 'text-center',
          },
          {
            data: 'name',
            name: 'name'
          },
          {
            data: 'nip',
            name: 'nip'
          },
          {
            data: 'email',
            name: 'email'
          },
          {
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false,
            className: 'text-center',
          },
        ],
        // }).buttons().container().appendTo('#data-table .col-md-6:eq(0)');
      });
      // Add event listener for delete buttons
      $('body').on('click', '.delete-btn', function() {
        if (confirm('Are you sure you want to delete this item?')) {
          const id = $(this).data('id');
          $.ajax({
            type: 'DELETE',
            url: `/data/${id}`,
            success: function() {
              fetchData();
            }
          });
        }
      });

      $('body').on('click', ".deleteData", function() {
        let id = $(this).data('id');
        let token = $("meta[name='csrf-token']").attr("content");
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {

            console.log('test');
            //fetch to delete data
            $.ajax({

              url: `/dosen/${id}`,
              type: "DELETE",
              cache: false,
              data: {
                "_token": token
              },
              success: function(response) {
                //show success message
                table.draw();
                Toast.fire({
                  icon: 'success',
                  title: 'Success...',
                  text: `${response.message}`,
                });
              },
              error: function(error) {
                Swal.fire('Error', error.responseJSON.error, 'error');
              }
            });
          }
        })
      });
    });
  </script>
  <script>
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
@endpush
