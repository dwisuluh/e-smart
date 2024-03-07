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
          <li class="breadcrumb-item"><a href="">Perijinan</a></li>
          <li class="breadcrumb-item active">Detail</li>
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
        <x-adminlte-card title="Detail Pengajuan Ijin" theme="primary" icon="fas fa-lg fa-fan">
          <div class="row pt-2">
            <div class="col-md-12">
              <table class="table table-bordered table-striped data-table" id="data-ijin">
                <thead class="text-center">
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Status</th>
                    <th>Laporan</th>
                  </tr>
                </thead>
                @foreach ($data as $list)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $list->Dosen->name }}</td>
                    <td>{{ $list->status_description }}</td>
                    <td><a href="#" class="btn btn-primary"><span>Buat Laporan</span></a></td>
                  </tr>
                @endforeach
              </table>
            </div>
          </div>
          <div class="row pt-2">
            <div class="col-md-12">
              <div class="timeline">

                <div class="time-label">
                  <span class="bg-red">10 Feb. 2014</span>
                </div>


                <div>
                  <i class="fas fa-envelope bg-blue"></i>
                  <div class="timeline-item">
                    <span class="time"><i class="fas fa-clock"></i> 12:05</span>
                    <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>
                    <div class="timeline-body">
                      Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                      weebly ning heekya handango imeem plugg dopplr jibjab, movity
                      jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                      quora plaxo ideeli hulu weebly balihoo...
                    </div>
                    <div class="timeline-footer">
                      <a class="btn btn-primary btn-sm">Read more</a>
                      <a class="btn btn-danger btn-sm">Delete</a>
                    </div>
                  </div>
                </div>


                <div>
                  <i class="fas fa-user bg-green"></i>
                  <div class="timeline-item">
                    <span class="time"><i class="fas fa-clock"></i> 5 mins ago</span>
                    <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                    </h3>
                  </div>
                </div>


                <div>
                  <i class="fas fa-comments bg-yellow"></i>
                  <div class="timeline-item">
                    <span class="time"><i class="fas fa-clock"></i> 27 mins ago</span>
                    <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>
                    <div class="timeline-body">
                      Take me to your leader!
                      Switzerland is small and neutral!
                      We are more like Germany, ambitious and misunderstood!
                    </div>
                    <div class="timeline-footer">
                      <a class="btn btn-warning btn-sm">View comment</a>
                    </div>
                  </div>
                </div>


                <div class="time-label">
                  <span class="bg-green">3 Jan. 2014</span>
                </div>


                <div>
                  <i class="fa fa-camera bg-purple"></i>
                  <div class="timeline-item">
                    <span class="time"><i class="fas fa-clock"></i> 2 days ago</span>
                    <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>
                    <div class="timeline-body">
                      <img src="https://placehold.it/150x100" alt="...">
                      <img src="https://placehold.it/150x100" alt="...">
                      <img src="https://placehold.it/150x100" alt="...">
                      <img src="https://placehold.it/150x100" alt="...">
                      <img src="https://placehold.it/150x100" alt="...">
                    </div>
                  </div>
                </div>


                <div>
                  <i class="fas fa-video bg-maroon"></i>
                  <div class="timeline-item">
                    <span class="time"><i class="fas fa-clock"></i> 5 days ago</span>
                    <h3 class="timeline-header"><a href="#">Mr. Doe</a> shared a video</h3>
                    <div class="timeline-body">
                      <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/tMWkeBIohBs"
                          allowfullscreen></iframe>
                      </div>
                    </div>
                    <div class="timeline-footer">
                      <a href="#" class="btn btn-sm bg-maroon">See comments</a>
                    </div>
                  </div>
                </div>

                <div>
                  <i class="fas fa-clock bg-gray"></i>
                </div>
                {{-- <div class="timeline timeline-inverse">
                  <!-- Timeline time label -->
                  <div class="time-label">
                    <span class="bg-green">23 Aug. 2019</span>
                  </div>
                  <div>
                    <!-- Before each timeline item corresponds to one icon on the left scale -->
                    <i class="fas fa-envelope bg-blue"></i>
                    <!-- Timeline item -->
                    <div class="timeline-item">
                      <!-- Time -->
                      <span class="time"><i class="fas fa-clock"></i> 12:05</span>
                      <!-- Header. Optional -->
                      <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>
                      <!-- Body -->
                      <div class="timeline-body">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                        quora plaxo ideeli hulu weebly balihoo...
                      </div>
                      <!-- Placement of additional controls. Optional -->
                      <div class="timeline-footer">
                        <a class="btn btn-primary btn-sm">Read more</a>
                        <a class="btn btn-danger btn-sm">Delete</a>
                      </div>
                    </div>
                  </div>
                  <!-- The last icon means the story is complete -->
                  <div>
                    <i class="fas fa-clock bg-gray"></i>
                  </div>
                </div> --}}
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
