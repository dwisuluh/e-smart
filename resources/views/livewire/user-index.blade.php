{{-- @section('plugins.DatatablesPlugin', true) --}}
<div class="col-md-12">
  <table class="table table-bordered table-striped data-table" id="data-user">
    <thead class="text-center">
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Avatar</th>
        <th>Role</th>
        <th>Detail</th>
      </tr>
    </thead>
    <tbody wire="getData">
      @foreach ($data as $item)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{!! $item->name !!}</td>
          <td>{!! $item->email !!}</td>
          <td class="text-center"><img src="{{ $item->avatar }}" alt="Image"></td>
          <td>{{ $item->role }}</td>
          <td class="text-center">
            <button class="btn btn-primary btn-sm detail-btn">Detail</button>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
