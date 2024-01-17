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
  <div class="container-fluid">
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

    {{-- Minimal example / fill data using the component slot --}}
    <div class="row">
      {{-- Minimal --}}
      <x-adminlte-button label="Button" />

      {{-- Disabled --}}
      <x-adminlte-button label="Disabled" theme="dark" disabled />

      {{-- Themes + icons --}}
      <x-adminlte-button label="Primary" theme="primary" icon="fas fa-key" />
      <x-adminlte-button label="Secondary" theme="secondary" icon="fas fa-hashtag" />
      <x-adminlte-button label="Info" theme="info" icon="fas fa-info-circle" />
      <x-adminlte-button label="Warning" theme="warning" icon="fas fa-exclamation-triangle" />
      <x-adminlte-button label="Danger" theme="danger" icon="fas fa-ban" />
      <x-adminlte-button label="Success" theme="success" icon="fas fa-thumbs-up" />
      <x-adminlte-button label="Dark" theme="dark" icon="fas fa-adjust" />

      {{-- Types --}}
      <x-adminlte-button class="btn-flat" type="submit" label="Submit" theme="success" icon="fas fa-lg fa-save" />
      <x-adminlte-button class="btn-lg" type="reset" label="Reset" theme="outline-danger" icon="fas fa-lg fa-trash" />
      <x-adminlte-button class="btn-sm bg-gradient-info" type="button" label="Help" icon="fas fa-lg fa-question" />

      {{-- Icons Only --}}
      <x-adminlte-button theme="primary" icon="fab fa-fw fa-lg fa-facebook-f" />
      <x-adminlte-button theme="info" icon="fab fa-fw fa-lg fa-twitter" />
    </div>
    <div class="row">
      <x-adminlte-datatable id="table1" :heads="$heads">
        @foreach ($config['data'] as $row)
          <tr>
            @foreach ($row as $cell)
              <td>{!! $cell !!}</td>
            @endforeach
          </tr>
        @endforeach
      </x-adminlte-datatable>

      {{-- Themes --}}
      <x-adminlte-datatable id="table3" :heads="$heads" :config="$config" theme="info" striped hoverable />

      <x-adminlte-datatable id="table4" :heads="$heads" theme="danger" :config="$config" striped hoverable />

      <x-adminlte-datatable id="table5" :heads="$heads" :config="$config" theme="light" striped hoverable />

      <x-adminlte-datatable id="table6" :heads="$heads" head-theme="light" theme="dark" :config="$config" striped
        hoverable with-footer footer-theme="light" beautify />

      {{-- Compressed with style options / fill data using the plugin config --}}
      <x-adminlte-datatable id="table2" :heads="$heads" head-theme="dark" :config="$config" striped hoverable
        bordered compressed />
      {{-- With buttons --}}
      <x-adminlte-datatable id="table7" :heads="$heads" head-theme="light" theme="warning" :config="$config"
        striped hoverable with-buttons />

      {{-- With buttons + customization --}}
      @php
        $config['dom'] = '<"row" <"col-sm-7" B> <"col-sm-5 d-flex justify-content-end" i> >
              <"row" <"col-12" tr> >
              <"row" <"col-sm-12 d-flex justify-content-start" f> >';
        $config['paging'] = false;
        $config['lengthMenu'] = [10, 50, 100, 500];
      @endphp

      <x-adminlte-datatable id="table8" :heads="$heads" head-theme="dark" class="bg-teal" :config="$config" striped
        hoverable with-buttons />
    </div>
  </div>
   {{-- Basic --}}
   <x-adminlte-input-file-krajee name="kifBasic" />

   {{-- With placeholder, SM size multiple and data-* options --}}
   <x-adminlte-input-file-krajee id="kifPholder" name="kifPholder[]" igroup-size="sm"
     data-msg-placeholder="Choose multiple files..." data-show-cancel="false" data-show-close="false" multiple />

   {{-- With a label, some plugin config, and error feedback disabled --}}
   @php
     $config = [
         'allowedFileTypes' => ['text', 'office', 'pdf'],
         'browseOnZoneClick' => true,
         'theme' => 'explorer-fa5',
     ];
   @endphp
   <x-adminlte-input-file-krajee name="kifLabel" label="Upload document file"
     data-msg-placeholder="Choose a text, office or pdf file..." label-class="text-primary" :config="$config"
     disable-feedback />

   {{-- With the avatar preset-mode --}}
   <x-adminlte-input-file-krajee name="kifAvatar" label="Set Profile Picture" preset-mode="avatar" />

   {{-- With the minimalist preset-mode --}}
   <x-adminlte-input-file-krajee name="kifMinimalist" label="Choose a file" preset-mode="minimalist" />
@endsection
