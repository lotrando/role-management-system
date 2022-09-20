<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name') }}</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark-blue shadow">
    <div class="container-fluid">
      <a class="navbar-brand" href="@if (Auth::check()) dashboard @else/ @endif">
        {{ config('app.name', 'Laravel') }}
      </a>
      <button class="navbar-toggler" data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent" type="button"
              aria-controls="navbarSupportedContent" aria-expanded="false"
              aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        {{-- Left Side Of Navbar --}}
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.users.index') }}">{{ __('Users') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.roles.index') }}">{{ __('Roles') }}</a>
          </li>
        </ul>

        {{-- Right Side Of Navbar --}}
        <ul class="navbar-nav ms-auto">
          {{-- Authentication Links --}}
          @guest
            @if (Route::has('login'))
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
            @endif

            @if (Route::has('register'))
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
            @endif
          @else
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdown" data-bs-toggle="dropdown"
                 href="#" role="button" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }}
              </a>
              <div class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="navbarDropdown">
                {{-- Button trigger modal --}}
                <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logout">
                  {{ __('Logout') }}
                </button>
              </div>
            </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>

  <main class="container-fluid">
    @yield('content')
  </main>

  {{-- Logout Modal --}}
  <div class="modal fade" id="logout" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">{{ __('Logout') }}</h5>
          {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
        </div>
        <div class="modal-body">
          <p class="text-center">{{ __('Are you sure ?') }}</p>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-dismiss="modal"
                  type="button">{{ __('Close') }}</button>
          <a class="btn btn-danger" href="{{ route('logout') }}" role="button"
             onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>
          <form class="d-none" id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
