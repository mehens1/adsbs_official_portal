
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $data['page'] }} :: Adamawa State Bureau of Statistics</title>

    <link rel="stylesheet" href="{{ asset('assets/vendors/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/adsbs_logo.png') }}" />
  </head>
  <body>
  <body>
    <div class="container-scroller">
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex align-items-center">
          <a class="navbar-brand brand-logo" href="{{ route('dashboard') }}">
            <img src="{{ asset('assets/images/adsbs_logo.png') }} " alt="logo" class="logo-dark" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="{{ route('dashboard') }}"><img src="{{ asset('assets/images/adsbs_logo.png') }}" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
          <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Welcome back!</h5>
          <ul class="navbar-nav navbar-nav-right ml-auto">
            <form class="search-form d-none d-md-block" action="#">
              <i class="icon-magnifier"></i>
              <input type="search" class="form-control" placeholder="Search Here" title="Search here">
            </form>
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator message-dropdown" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <i class="icon-speech"></i>
                <span class="count">7</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="messageDropdown">
                <a class="dropdown-item py-3">
                  <p class="mb-0 font-weight-medium float-left">You have 1 unread mails </p>
                  <span class="badge badge-pill badge-primary float-right">View all</span>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    {{-- <img src="{{ $auth_user->profile_picture == "" ? asset('profile_image_placeholder.jpg') : $auth_user->profile_picture }}" alt="image" class="img-sm profile-pic"> --}}
                  </div>
                  <div class="preview-item-content flex-grow py-2">
                    <p class="preview-subject ellipsis font-weight-medium text-dark">{{ $auth_user->first_name }} {{ $auth_user->last_name }}</p>
                    <p class="font-weight-light small-text"> The meeting is cancelled </p>
                  </div>
                </a>

              </div>
            </li>
            <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle ml-2" src="{{ asset('assets/images/faces/' . ($auth_user->profile_picture == '' ? 'profile_image_placeholder.jpg' : $auth_user->profile_picture) ) }}" alt="Profile image"> <span class="font-weight-normal"> {{ $auth_user->first_name}} {{ $auth_user->other_name}} {{ $auth_user->last_name }} </span></a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" src="{{ asset('assets/images/faces/' . ($auth_user->profile_picture == '' ? 'profile_image_placeholder.jpg' : $auth_user->profile_picture) ) }}" alt="Profile image" style="width: 5rem; height: 5rem">
                  <p class="mb-1 mt-3">{{ $auth_user->first_name}} {{ $auth_user->other_name}} {{ $auth_user->last_name }}</p>
                  <p class="font-weight-light text-muted mb-0">{{ $auth_user->email == "" ? $auth_user->phone_number : $auth_user->email }}</p>
                </div>
                <a class="dropdown-item" href="{{ route('profile') }}"><i class="dropdown-item-icon icon-user text-primary"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="dropdown-item" type="submit"><i class="dropdown-item-icon icon-power text-primary"></i>Sign Out</button>
                </form>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="{{ asset('assets/images/faces/' . ($auth_user->profile_picture == '' ? 'profile_image_placeholder.jpg' : $auth_user->profile_picture) ) }}" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">{{ $auth_user->first_name}} {{ $auth_user->other_name}} {{ $auth_user->last_name }}</p>
                  <p class="designation">{{ $auth_user->role == "" ? $auth_user->email : $auth_user->role }}</p>
                </div>
                <div class="icon-container">
                  <i class="icon-bubbles"></i>
                  <div class="dot-indicator bg-danger"></div>
                </div>
              </a>
            </li>
            <li class="nav-item nav-category">
              <span class="nav-link">Dashboard</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('dashboard') }}">
                <span class="menu-title">Dashboard</span>
                <i class="icon-screen-desktop menu-icon"></i>
              </a>
            </li>
            <li class="nav-item nav-category"><span class="nav-link">Pages</span></li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#home-page" aria-expanded="false" aria-controls="home-page">
                <span class="menu-title">Home Page</span>
                <i class="icon-home menu-icon"></i>
              </a>
              <div class="collapse" id="home-page">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{ route('prices') }}">Prices</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ route('keyStatistics') }}">Key Statistics</a></li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#publications" aria-expanded="false" aria-controls="publications">
                  <span class="menu-title">Publications</span>
                  <i class="icon-globe menu-icon"></i>
                </a>
                <div class="collapse" id="publications">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('addPublication') }}">Add Publication</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('publications') }}">Publications</a></li>
                  </ul>
                </div>
            </li>

            <li class="nav-item nav-category"><span class="nav-link">Administration</span></li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#users" aria-expanded="false" aria-controls="users">
                  <span class="menu-title">Users</span>
                  <i class="icon-people menu-icon"></i>
                </a>
                <div class="collapse" id="users">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('addUser') }}">Add Users</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('users') }}">Users</a></li>
                  </ul>
                </div>
            </li>


          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            @yield('content')
          </div>
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Adamawa State Bureau of Statistics {{ date('Y') }}</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Site Developed by Samson Meheni of <a href="https://mehenscreatives.com" target="_blank">MEHENS CREATIVES TECHNOLOGY</a></span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script>
    <!-- endinject -->
  </body>
</html>
