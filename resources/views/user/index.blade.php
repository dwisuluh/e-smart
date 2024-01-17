@extends('layouts.app')
@section('content_header')
  <h1>User Setting</h1>
@stop
@section('plugins.Summernote', true)
@section('plugins.BootstrapSelect', true)
@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('User') }}</div>

          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif

            {{ __('You are logged in!') }}
          </div>
        </div>
      </div>
      <div class="col-md-12">
        {{-- Minimal --}}
        <x-adminlte-text-editor name="teBasic" />

        {{-- Disabled with content --}}
        <x-adminlte-text-editor name="teDisabled" disabled>
          <b>Lorem ipsum dolor sit amet</b>, consectetur adipiscing elit.
          <br>
          <i>Aliquam quis nibh massa.</i>
        </x-adminlte-text-editor>

        {{-- With placeholder, sm size, label and some configuration --}}
        @php
          $config = [
              'height' => '100',
              'toolbar' => [
                  // [groupName, [list of button]]
                  ['style', ['bold', 'italic', 'underline', 'clear']],
                  ['font', ['strikethrough', 'superscript', 'subscript']],
                  ['fontsize', ['fontsize']],
                  ['color', ['color']],
                  ['para', ['ul', 'ol', 'paragraph']],
                  ['height', ['height']],
                  ['table', ['table']],
                  ['insert', ['link', 'picture', 'video']],
                  ['view', ['fullscreen', 'codeview', 'help']],
              ],
          ];
        @endphp
        <x-adminlte-text-editor name="teConfig" label="WYSIWYG Editor" label-class="text-danger" igroup-size="sm"
          placeholder="Write some text..." :config="$config" />
      </div>
    </div>
  </div>
  <div class="wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Timeline</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Timeline</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- Timelime example  -->
        <div class="row">
          <div class="col-md-12">
            <!-- The time line -->
            <div class="timeline">
              <!-- timeline time label -->
              <div class="time-label">
                <span class="bg-red">10 Feb. 2014</span>
              </div>
              <!-- /.timeline-label -->
              <!-- timeline item -->
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
              <!-- END timeline item -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-user bg-green"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i> 5 mins ago</span>
                  <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                  </h3>
                </div>
              </div>
              <!-- END timeline item -->
              <!-- timeline item -->
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
              <!-- END timeline item -->
              <!-- timeline time label -->
              <div class="time-label">
                <span class="bg-green">3 Jan. 2014</span>
              </div>
              <!-- /.timeline-label -->
              <!-- timeline item -->
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
              <!-- END timeline item -->
              <!-- timeline item -->
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
              <!-- END timeline item -->
              <div>
                <i class="fas fa-clock bg-gray"></i>
              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
      </div>
      <!-- /.timeline -->
    </section>
  </div>
  <div class="row">
    {{-- Minimal --}}
    <x-adminlte-select-bs name="selBsBasic">
      <option>Option 1</option>
      <option disabled>Option 2</option>
      <option selected>Option 3</option>
    </x-adminlte-select-bs>

    {{-- Disabled --}}
    <x-adminlte-select-bs name="selBsDisabled" disabled>
      <option>Option 1</option>
      <option>Option 2</option>
    </x-adminlte-select-bs>

    {{-- With prepend slot, label and data-* config --}}
    <x-adminlte-select-bs name="selBsVehicle" label="Vehicle" label-class="text-lightblue" igroup-size="lg"
      data-title="Select an option..." data-live-search data-live-search-placeholder="Search..." data-show-tick>
      <x-slot name="prependSlot">
        <div class="input-group-text bg-gradient-info">
          <i class="fas fa-car-side"></i>
        </div>
      </x-slot>
      <option data-icon="fa fa-fw fa-car">Car</option>
      <option data-icon="fa fa-fw fa-motorcycle">Motorcycle</option>
    </x-adminlte-select-bs>

    {{-- With multiple slots, plugin config parameter and custom options --}}
    @php
      $config = [
          'title' => 'Select multiple options...',
          'liveSearch' => true,
          'liveSearchPlaceholder' => 'Search...',
          'showTick' => true,
          'actionsBox' => true,
      ];
    @endphp
    <x-adminlte-select-bs id="selBsCategory" name="selBsCategory[]" label="Categories" label-class="text-danger"
      igroup-size="sm" :config="$config" multiple>
      <x-slot name="prependSlot">
        <div class="input-group-text bg-gradient-red">
          <i class="fas fa-tag"></i>
        </div>
      </x-slot>
      <x-slot name="appendSlot">
        <x-adminlte-button theme="outline-dark" label="Clear" icon="fas fa-lg fa-ban text-danger" />
      </x-slot>
      <option data-icon="fa fa-fw fa-running text-info" data-subtext="Running">Sports</option>
      <option data-icon="fa fa-fw fa-futbol text-info" data-subtext="Futbol">Sports</option>
      <option data-icon="fa fa-fw fa-newspaper text-danger">News</option>
      <option data-icon="fa fa-fw fa-gamepad text-warning">Games</option>
      <option data-icon="fa fa-fw fa-flask text-primary">Science</option>
      <option data-icon="fa fa-fw fa-calculator text-dark">Maths</option>
    </x-adminlte-select-bs>
  </div>
@endsection
