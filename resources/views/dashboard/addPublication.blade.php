@extends('dashboard.layout.app')

@section('content')
    <div class="page-header">
        <h3 class="page-title"> {{ $data['page'] }} </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $data['page'] }}</li>
            </ol>
        </nav>
    </div>

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
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add New Publication</h4>
                    <form class="form-sample" method="POST" action="{{ route('submitNewPublication') }}" enctype="multipart/form-data">
                        @csrf
                        <p class="card-description">  </p>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Publication Title <span class="text-danger">*</span> </label>
                                    <div class="col-10">
                                        <input type="text" class="form-control" name="title" placeholder="Publication Title" required/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Description <span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <Textarea class="form-control" rows="10" placeholder="Description" name="description" required></Textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Document Upload</label>
                                    <div class="col-md-9">
                                        <input type="file" class="form-control" name="document"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Tags <span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <select name="tags[]" class="form-control" id="tags" multiple required>
                                            @foreach ($data['tags'] as $tag)
                                            <option value="{{ $tag['id'] }}" class="form-control">{{ $tag['tag'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>

                    </form>
                </div>
            </div>
        </div>

        {{-- <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add New User</h4>
                    <p class="card-description">  </p>
                    <form class="forms-sample">
                        <div class="form-group">
                            <label for="firstName">First Name</label>
                            <input type="text" class="form-control" id="firstName" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail3">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword4">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword4"
                                placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectGender">Gender</label>
                            <select class="form-control" id="exampleSelectGender">
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>File upload</label>
                            <input type="file" name="img[]" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled
                                    placeholder="Upload Image">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputCity1">City</label>
                            <input type="text" class="form-control" id="exampleInputCity1" placeholder="Location">
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">Textarea</label>
                            <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div> --}}

    </div>

    <!-- content-wrapper ends -->
@endsection
