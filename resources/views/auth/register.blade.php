@extends('layouts.app')

@section('content')
  <h1>{{ __('Register') }}</h1>
  <div class="card mt-3 p-3">
    <form method="POST" action="{{ route('register') }}">
      @csrf
      {{-- Name register input --}}
      <div class="row mb-3">
        <div class="col-12">
          <label class="form-label" for="name">{{ __('Name') }}</label>
          <input class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                 type="text" value="{{ old('name') }}" autofocus>
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
          <label class="form-label" for="email">{{ __('Email address') }}</label>
          <input class="form-control @error('email') is-invalid @enderror" id="email"
                 name="email" type="email" value="{{ old('email') }}">
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
          <label class="form-label" for="password">{{ __('Password') }}</label>
          <input class="form-control @error('password') is-invalid @enderror" id="password"
                 name="password" type="password">
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
          <label class="form-label"
                 for="password_confirmation">{{ __('Password confirmation') }}</label>
          <input class="form-control @error('password_confirmation') is-invalid @enderror"
                 id="password_confirmation" name="password_confirmation" type="password">
          @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
      </div>
      {{-- Buttons --}}
      <button class="btn btn-primary" type="submit">{{ __('Register') }}</button>
      <a class="btn btn-secondary" type="submit"
         href="{{ url()->previous() }}">{{ __('Back') }}</a>
    </form>
  </div>
@endsection
