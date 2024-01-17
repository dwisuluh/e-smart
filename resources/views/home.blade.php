@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        {{-- Minimal with title, text and icon --}}
        <x-adminlte-small-box title="Title" text="some text" icon="fas fa-star" url="#" theme="danger" url-text="View details" />
      </div>
      <div class="col-md-3">
        {{-- Loading --}}
        <x-adminlte-small-box title="Loading" text="Loading data..." icon="fas fa-chart-bar" theme="info" url="#"
          url-text="More info" loading />
      </div>
      <div class="col-md-3">

        {{-- Themes --}}
        <x-adminlte-small-box title="424" text="Views" icon="fas fa-eye text-dark" theme="teal" url="#"
          url-text="View details" />
      </div>
      <div class="col-md-3">

        <x-adminlte-small-box title="Downloads" text="1205" icon="fas fa-download text-white" theme="purple" />
      </div>
      <x-adminlte-small-box title="528" text="User Registrations" icon="fas fa-user-plus text-teal" theme="primary"
        url="#" url-text="View all users" />
    </div>

    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Dashboard') }}</div>

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
    </div>
  </div>
@endsection
