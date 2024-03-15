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
          <a href="{{ route('editProfile', ['id' => $data['user']['id'] ]) }}" class="text-dark ml-auto mb-3 mb-sm-0"> Edit Profile</a>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px" src="{{ asset('assets/images/faces/' . ($auth_user->profile_picture == '' ? 'profile_image_placeholder.jpg' : $auth_user->profile_picture) ) }}">
                    <span class="font-weight-bold">{{ $data['user']['first_name'] }} {{ $data['user']['last_name'] }}</span><span class="text-black-50">{{ $data['user']['email'] }}</span><span> </span>

                    @if ($auth_user->profile_picture)
                    <form action="{{ route('deleteProfilePicture', ['id' => $auth_user]) }}" method="POST">
                        @csrf
                        @method('put')
                        <input type="hidden" name="nullData">
                        <div class="mt-3 text-center"><button class="btn btn-danger profile-button" type="submit">Remove Picture</button></div>
                    </form>
                    @endif
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4 col-sm-12"><label class="labels">First Name</label> <br> <strong>{{ $data['user']['first_name'] }}</strong> </div>
                        <div class="col-md-4 col-sm-12"><label class="labels">Last Name</label> <br> <strong>{{ $data['user']['last_name'] }}</strong> </div>
                        <div class="col-md-4 col-sm-12"><label class="labels">Other Name</label> <br> <strong>{{ $data['user']['other_name'] }}</strong> </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4 col-sm-12 mb-4"><label class="labels">Email</label> <br> <strong>{{ $data['user']['email'] }}</strong> </div>
                        <div class="col-md-4 col-sm-12 mb-4"><label class="labels">Phone Number</label> <br> <strong>{{ $data['user']['phone_number'] }}</strong> </div>
                        <div class="col-md-4 col-sm-12 mb-4"><label class="labels">Uniqe Code</label> <br> <strong>{{ $data['user']['unique_code'] }}</strong> </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
