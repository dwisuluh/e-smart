@extends('layouts.app')
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
  {{-- Setup data for datatables --}}
  @php
    $heads = ['ID', 'Name', ['label' => 'Phone', 'width' => 40], ['label' => 'Actions', 'no-export' => true, 'width' => 5]];

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
    {{-- Minimal example / fill data using the component slot --}}
    <div class="row">
      <div class="col-md-12">
        <x-adminlte-card title="Pengajuan Ijin" theme="primary" icon="fas fa-lg fa-fan">
          <div class="row">
            <x-adminlte-button label="Buat Pengajuan" theme="primary" icon="fas fa-folder-plus" onclick="location.href='{{ route('ijin-dosen.create') }}'"/>
          </div>
          <div class="row pt-2">
            <x-adminlte-datatable id="table" :heads="$heads" striped hoverable>
              @foreach ($config['data'] as $row)
                <tr>
                  @foreach ($row as $cell)
                    <td>{!! $cell !!}</td>
                  @endforeach
                </tr>
              @endforeach
            </x-adminlte-datatable>
          </div>
        </x-adminlte-card>
      </div>
    </div>
  </div>
@endsection
