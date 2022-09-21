@if (session('success'))
  <div class="alert alert-success shadow-lg" role="alert">
    {{ session('success') }}
  </div>
@endif

@if (session('error'))
  <div class="alert alert-danger shadow-lg" role="alert">
    {{ session('error') }}
  </div>
@endif
