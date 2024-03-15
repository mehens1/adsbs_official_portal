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
          <a href="{{ route('profile', ['id' => $data['user']['id'] ]) }}" class="text-dark ml-auto mb-3 mb-sm-0"> View Profile</a>
        </div>
        <form action="{{ route('updateProfile', ['id' => $data['user']['id'] ]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="container rounded bg-white mt-5 mb-5">
                <div class="row">
                    <div class="col-md-3 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                            <img class="rounded-circle mt-5" width="150px" src="{{ asset('assets/images/faces/' . ($auth_user->profile_picture == '' ? 'profile_image_placeholder.jpg' : $auth_user->profile_picture) ) }}">
                            <div class="mt-5 text-center">
                                <label for="uploaded_picture">Change Profile</label>
                                <input type="file" name="uploaded_picture" id="changeProfile">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 border-right">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Profile Settings</h4>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-4"><label class="labels">First Name</label><input type="text" name="first_name" class="form-control" placeholder="First Name" value="{{ $data['user']['first_name'] }}"></div>
                                <div class="col-md-4"><label class="labels">Last Name</label><input type="text" name="last_name" class="form-control" placeholder="Last Name" value="{{ $data['user']['last_name'] }}"></div>
                                <div class="col-md-4"><label class="labels">Other Name</label><input type="text" name="other_name" class="form-control" placeholder="Other Name" value="{{ $data['user']['other_name'] }}"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6"><label class="labels">Staff Code</label><input type="text" name="unique_code" class="form-control" placeholder="Staff Code" value="{{ $data['user']['unique_code'] }}"></div>
                                <div class="col-md-6"><label class="labels">Mobile Number</label><input type="text" name="phone_number" class="form-control" placeholder="Phone Number" value="{{ $data['user']['phone_number'] }}"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">Email Address</label><input type="text" name="email" class="form-control" placeholder="Email Address" value="{{ $data['user']['email'] }}"></div>
                            </div>
                            <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Update Profile</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
