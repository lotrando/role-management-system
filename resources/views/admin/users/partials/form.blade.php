@csrf
{{-- Name register input --}}
<div class="row mb-3">
  <div class="col-12">
    <label class="form-label" for="name">{{ __('Name') }}</label>
    <input class="form-control @error('name') is-invalid @enderror" id="name" name="name"
           type="text"
           value="@isset($user){{ $user->name ?? old('name') }}@endisset"
           autofocus>
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
    <input class="form-control @error('email') is-invalid @enderror" id="email" name="email"
           type="email"
           value="@isset($user){{ $user->email ?? old('email') }}@endisset">
    @error('email')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
</div>
{{-- Password register input --}}
@isset($create)
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
@endisset
{{-- Roles --}}
<div class="mb-3">
  @foreach ($roles as $role)
    <div class="form-check">
      <input class="form-check-input" id="{{ $role->name }}" name="roles[]" type="checkbox"
             value="{{ $role->id }}"
             @isset($user)@if (in_array($role->id, $user->roles->pluck('id')->toArray())) checked @endif @endisset>
      <label for="{{ $role->name }}"></label>
      {{ $role->name }}
    </div>
  @endforeach
</div>
{{-- Buttons --}}
<button class="btn btn-primary" type="submit">{{ $buttonName }}</button>
<a class="btn btn-secondary" type="submit" href="{{ url()->previous() }}">{{ __('Back') }}</a>
