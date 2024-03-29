
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
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"> <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('assets/images/adsbs_logo.png') }}" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="{{ asset('assets/images/adsbs_logo.png') }}" alt="ADSBS Logo" style="width: 5rem">

                </div>
                <h4>Hello! Forgot Password?</h4>
                <h6 class="font-weight-light">Enter your registered Emaill Address to continue.</h6>
                <form class="pt-3" method="POST" action="{{ route('forgotPassword') }}">
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg" id="registeredEmail" placeholder="Email Address">
                  </div>
                  <div class="mt-3">
                    <button class="btn btn-block btn-success btn-lg font-weight-medium auth-form-btn">SUBMIT</button>
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        Go back to <a href="{{ route('home') }}" class="auth-link text-black">LOGIN</a>
                    </label>
                    </div>
                  </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
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
