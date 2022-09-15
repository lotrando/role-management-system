@extends('layouts.app')

@section('content')
  <div class="row mx-1 my-2">
    <div class="col-12 d-flex justify-content-between align-items-center">
      <h1>{{ __('Users') }}</h1>
      <button role="button" class="btn btn-sm btn-success" href="{{ route('admin.users.create') }}">{{ __('Create') }}</button>
    </div>
  </div>
  <div class="card px-4 py-2 shadow">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">@sortablelink('name', __('Name'))</th>
          <th scope="col">@sortablelink('email', __('Email address'))</th>
          <th scope="col">@sortablelink('created_at', __('Created At'))</th>
          <th scope="col">@sortablelink('updated_at', __('Updated At'))</th>
          <th scope="col">{{ __('Action') }}</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at->format('d. m. Y') }}</td>
            <td>{{ $user->updated_at->format('d. m. Y') }}</td>
            <td>
              <a class="btn btn-sm btn-primary" href="{{ route('admin.users.edit', $user->id) }}">{{ __('Edit') }}</a>
              <button type="button" class="btn btn-sm btn-danger"
                onclick="event.preventDefault();
                document.getElementById('delete-user-{{ $user->id }}').submit()">
                {{ __('Delete') }}
              </button>
              <form id="delete-user-{{ $user->id }}" action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-none">
                @csrf
                @method('DELETE')
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {!! $users->appends(\Request::except('page'))->render() !!}
  </div>
@endsection
