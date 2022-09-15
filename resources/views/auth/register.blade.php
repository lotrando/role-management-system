@extends('layouts.app')

@section('content')
  <h1>{{ __('Register') }}</h1>
  <form method="POST" action="{{ route('register') }}">
    @csrf
    {{-- Name register input --}}
    <div class="row mb-3">
      <div class="col-12">
        <label for="name" class="form-label">{{ __('Name') }}</label>
        <input name="name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" autofocus>
        @error('name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
    </div>
    {{-- Email register input --}}
    <div class="row mb-3">
      <div class="col-12">
        <label for="email" class="form-label">{{ __('Email address') }}</label>
        <input name="email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
        @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
    </div>
    {{-- Password register input --}}
    <div class="row mb-3">
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
    {{-- Password register input --}}
    <div class="row mb-4">
      <div class="col-12">
        <label for="password_confirmation" class="form-label">{{ __('Password confirmation') }}</label>
        <input name="password_confirmation" id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror">
        @error('password_confirmation')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
    </div>
    {{-- Buttons --}}
    <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
    <a href="{{ url()->previous() }}" type="submit" class="btn btn-secondary">{{ __('Back') }}</a>
  </form>
@endsection
