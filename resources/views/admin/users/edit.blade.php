@extends('layouts.app')

@section('content')
  <h1>{{ __('Edit') }}</h1>
  <div class="card my-3 p-3">
    <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
      @method('PATCH')
      @include('admin.users.partials.form', [
          'buttonName' => __('Edit'),
      ])
    </form>
  </div>
@endsection
