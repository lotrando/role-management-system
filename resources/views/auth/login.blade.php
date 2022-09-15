@extends('layouts.app')

@section('content')
  <h1>{{ __('Login') }}</h1>
  {{-- Login Form --}}
  <form method="POST" action="{{ route('login') }}">
    @csrf
    {{-- Email login input --}}
    <div class="row mb-3">
      <div class="col-12">
        <label for="email" class="form-label">{{ __('Email address') }}</label>
        <input name="email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" autofocus>
        @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
    </div>
    {{-- Password login input --}}
    <div class="row mb-4">
      <div class="col-12">
        <label for="password" class="form-label">{{ __('Password') }}</label>
        <input name="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror">
        @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
    </div>
    {{-- Buttons --}}
    <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
    <a href="{{ url()->previous() }}" type="submit" class="btn btn-secondary">{{ __('Back') }}</a>
  </form>
@endsection
