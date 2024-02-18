{{-- @section('plugins.DatatablesPlugin', true) --}}
{{-- <div class="col-md-12" wire:poll.keep-alive="getData">
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
    </thead> --}}
{{-- <x-adminlte-datatable id="table2" :heads="$heads" head-theme="dark"
    striped hoverable bordered compressed/> --}}
<tbody wire:poll.keep-alive="getData">
  @foreach ($data as $item)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{!! $item->tujuan !!}</td>
      <td>{!! $item->kegiatan !!}</td>
      <td>{{ $item->tgl_mulai }}</td>
      <td>{{ $item->tgl_selesai }}</td>
      <td class="d-flex justify-content-center"><button class="btn btn-sm {{ $item->status_color_class }}">
          {{ $item->status_description }}
        </button></td>
      <td> <button class="btn btn-primary btn-sm detail-btn">Detail</button></td>
    </tr>
  @endforeach
</tbody>
{{-- </x-adminlte-datatable> --}}
</table>
</div>
