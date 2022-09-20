@extends('layouts.app')

@section('content')
  <h1>{{ __('Create') }}</h1>
  <div class="card my-3 p-3">
    <form method="POST" action="{{ route('admin.users.store') }}">
      @include('admin.users.partials.form', [
          'create' => true,
          'buttonName' => __('Create'),
      ])
    </form>
  </div>
@endsection
