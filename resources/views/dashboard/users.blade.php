@extends('dashboard.layout.app')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        {{ $errors->first() }}
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-sm-flex align-items-center mb-4">
          <h4 class="card-title mb-sm-0">{{ $data['page'] }}</h4>
          <a href="{{ route('addUser') }}" class="text-dark ml-auto mb-3 mb-sm-0"> Add new User</a>
        </div>
        <div class="table-responsive border rounded p-1">
          <table class="table">
            <thead>
              <tr>
                <th class="font-weight-bold">Profile</th>
                <th class="font-weight-bold">Unique ID</th>
                <th class="font-weight-bold">First Name</th>
                <th class="font-weight-bold">Last Name</th>
                <th class="font-weight-bold">Other Name</th>
                <th class="font-weight-bold">Phone Number</th>
                <th class="font-weight-bold">Email</th>
                <th class="font-weight-bold">Action(s)</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($data['users'] as $user)

                <tr>
                    <td>
                        <img class="img-xs rounded-circle" src="{{ $user->profile_picture == "" ? asset('assets/images/faces/profile_image_placeholder.jpg') : $user->profile_picture }}" alt="profile image">
                    </td>
                    <td>{{ $user['unique_code'] }}</td>
                    <td>{{ $user['first_name'] }}</td>
                    <td>{{ $user['last_name'] }}</td>
                    <td>{{ $user['other_name'] }}</td>
                    <td><a href="tel:+234{{ $user['phone_number'] }}">{{ $user['phone_number'] }}</a></td>
                    <td><a href="mailto:{{ $user['email'] }}">{{ $user['email'] }}</a></td>
                    <td>
                        <a href="{{ route('viewUser', ['id' => $user->id]) }}" class="btn btn-icon bg-success">
                            <button class="btn btn-icon bg-success"><i class="icon-eye text-white"></i></button>
                        </a>
                        {{-- <a href="{{ route('deleteUser') }}?action=delete&id{{ $user->id }}">
                            <button class="btn btn-icon bg-danger"><i class="icon-trash text-white"></i></button>
                        </a> --}}
                        <form action="{{ route('deleteUser', ['user' => $user]) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-icon bg-danger">
                                <i class="icon-trash text-white"></i>
                            </button>
                        </form>
                    </td>
                </tr>

                @endforeach

            </tbody>
          </table>
        </div>
        <div class="d-flex mt-4 flex-wrap">
          <p class="text-muted">Showing 1 to 10 of 57 entries</p>
          <nav class="ml-auto">
            <ul class="pagination separated pagination-info">
              <li class="page-item"><a href="#" class="page-link"><i class="icon-arrow-left"></i></a></li>
              <li class="page-item active bg-danger"><a href="#" class="page-link">1</a></li>
              <li class="page-item"><a href="#" class="page-link">2</a></li>
              <li class="page-item"><a href="#" class="page-link">3</a></li>
              <li class="page-item"><a href="#" class="page-link">4</a></li>
              <li class="page-item"><a href="#" class="page-link"><i class="icon-arrow-right"></i></a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
