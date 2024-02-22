@extends('dashboard.layout.app')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


<!-- Quick Action Toolbar Ends-->
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <div class="d-sm-flex align-items-baseline report-summary-header">
              <h5 class="font-weight-semibold">Report Summary</h5> <span class="ml-auto">Updated Report</span> <button class="btn btn-icons border-0 p-2"><i class="icon-refresh"></i></button>
            </div>
          </div>
        </div>
        <div class="row report-inner-cards-wrapper">
          <div class=" col-md -6 col-xl report-inner-card">
            <div class="inner-card-text">
              <span class="report-title">Prices Published</span>
              <h4>{{ $data['prices_published'] }}</h4>
              <span class="report-count"> {{ $data['prices_published_this_month'] }} This Month</span>
            </div>
            <div class="inner-card-icon bg-success">
              <i class="icon-calculator"></i>
            </div>
          </div>
          <div class="col-md-6 col-xl report-inner-card">
            <div class="inner-card-text">
              <span class="report-title">Messages</span>
              <h4>{{ $data['total_messages'] }}</h4>

              <span class="report-count {{ $data['unread_messages'] != 0 ? 'text-danger' : '' }}"> {{ $data['unread_messages'] }} Unread Messages</span>

            </div>
            <div class="inner-card-icon bg-danger">
              <i class="icon-briefcase"></i>
            </div>
          </div>
          <div class="col-md-6 col-xl report-inner-card">
            <div class="inner-card-text">
              <span class="report-title">Publications</span>
              <h4>{{ $data['total_publications'] }}</h4>
              <span class="report-count"> {{ $data['total_publications_this_month'] }} This month</span>
            </div>
            <div class="inner-card-icon bg-warning">
              <i class="icon-globe-alt"></i>
            </div>
          </div>
          <div class="col-md-6 col-xl report-inner-card">
            <div class="inner-card-text">
              <span class="report-title">Users</span>
              <h4>{{ $data['total_users'] }}</h4>
              <span class="report-count"> {{ $data['total_users_this_month'] }} Added This Month</span>
            </div>
            <div class="inner-card-icon bg-primary">
              <i class="icon-people"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Quick Action Toolbar Starts-->
<div class="row quick-action-toolbar">
  <div class="col-md-12 grid-margin">
    <div class="card">
      <div class="card-header d-block d-md-flex">
        <h5 class="mb-0">Quick Actions</h5>
        <p class="ml-auto mb-0">How are your active users trending overtime?<i class="icon-bulb"></i></p>
      </div>
      <div class="d-md-flex row m-0 quick-action-btns" role="group" aria-label="Quick action buttons">
        <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
            <a href="{{ route('addUser') }}"><button type="button" class="btn px-0"> <i class="icon-user mr-2"></i> Add User</button></a>
        </div>
        <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
          <button type="button" class="btn px-0"><i class="icon-docs mr-2"></i> Post News</button>
        </div>
        <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
          <button type="button" class="btn px-0"><i class="icon-folder mr-2"></i> Publish new Price</button>
        </div>
        <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
          <button type="button" class="btn px-0"><i class="icon-book-open mr-2"></i>Create Publication</button>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection
