@extends('layouts/contentLayoutMaster')

@section('title', 'User View - Security')

@section('vendor-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/animate/animate.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
@endsection

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-sweet-alerts.css')) }}">
@endsection

@section('content')
<section class="app-user-view-security">
  <div class="row">
    <!-- User Sidebar -->
    <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
      <!-- User Card -->
      @include('user.layouts.user-card')
      <!-- /User Card -->
      <!-- Plan Card -->
      <!-- /Plan Card -->
    </div>
    <!--/ User Sidebar -->

    <!-- User Content -->
    <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
      <!-- User Pills -->
      <ul class="nav nav-pills mb-2">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('user.detail',request()->id) }}">
            <i data-feather="user" class="font-medium-3 me-50"></i>
            <span class="fw-bold">Account</span></a
          >
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('user.security',request()->id) }}">
            <i data-feather="lock" class="font-medium-3 me-50"></i>
            <span class="fw-bold">Security</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{asset('app/user/view/billing')}}">
            <i data-feather="bookmark" class="font-medium-3 me-50"></i>
            <span class="fw-bold">Billing & Plans</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{asset('app/user/view/notifications')}}">
            <i data-feather="bell" class="font-medium-3 me-50"></i><span class="fw-bold">Notifications</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{asset('app/user/view/connections')}}">
            <i data-feather="link" class="font-medium-3 me-50"></i><span class="fw-bold">Connections</span>
          </a>
        </li>
      </ul>
      <!--/ User Pills -->

      <!-- Change Password -->
      <div class="card">
        <h4 class="card-header">Change Password</h4>
        <div class="card-body">
          <form id="formChangePassword" method="POST" action="{{ route('user.security.password',request()->id) }}">
            @csrf
            <div class="alert alert-warning mb-2" role="alert">
              <h6 class="alert-heading">Ensure that these requirements are met</h6>
              <div class="alert-body fw-normal">Minimum 8 characters long, uppercase & symbol</div>
            </div>

            <div class="row">
              <div class="mb-2 col-md-6 form-password-toggle">
                <label class="form-label" for="newPassword">New Password</label>
                <div class="input-group input-group-merge form-password-toggle">
                  <input
                    class="form-control"
                    type="password"
                    id="newPassword"
                    name="password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                  />
                  <span class="input-group-text cursor-pointer">
                    <i data-feather="eye"></i>
                  </span>
                </div>
                @error('password')
                  <span id="email" class="error">{{ $message }}</span>
                @enderror
              </div>

              <div class="mb-2 col-md-6 form-password-toggle">
                <label class="form-label" for="confirmPassword">Confirm New Password</label>
                <div class="input-group input-group-merge">
                  <input
                    class="form-control"
                    type="password"
                    name="password_confirmation"
                    id="confirmPassword"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                  />
                  <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                </div>
              </div>
              <div>
                <button type="submit" class="btn btn-primary me-2">Change Password</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!--/ Change Password -->

      <!-- Two-steps verification -->
      <div class="card">
        <div class="card-body">
          <h4 class="card-title mb-50">Two-steps verification</h4>
          <span>Keep your account secure with authentication step.</span>
          @if ($user->two_factor_secret)
            <h6 class="fw-bolder mt-2">2FA</h6>
            <div class="d-flex justify-content-between border-bottom mb-1 pb-1">
              <span>{{ $user->email }}</span>
              <div class="action-icons">
                <a href="{{ route('user.security.tsv',$user->id) }}" class="text-body"><i data-feather="trash" class="font-medium-3"></i></a>
              </div>
            </div>
          @endif
          <p class="mb-0">
            Two-factor authentication adds an additional layer of security to your account by requiring more than just a
            password to log in.
            <a href="javascript:void(0);" class="text-body">Learn more.</a>
          </p>
        </div>
      </div>
      <!--/ Two-steps verification -->

      <!-- recent device -->
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Recent devices</h4>
        </div>
        <div class="table-responsive">
          <table class="table text-nowrap text-center">
            <thead>
              <tr>
                <th class="text-start">BROWSER</th>
                <th>DEVICE</th>
                <th>LOCATION</th>
                <th>RECENT ACTIVITY</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="text-start">
                  <div class="avatar me-25">
                    <img src="{{asset('images/icons/google-chrome.png')}}" alt="avatar" width="20" height="20" />
                  </div>
                  <span class="fw-bolder">Chrome on Windows</span>
                </td>
                <td>Dell XPS 15</td>
                <td>United States</td>
                <td>10, Jan 2021 20:07</td>
              </tr>
              <tr>
                <td class="text-start">
                  <div class="avatar me-25">
                    <img src="{{asset('images/icons/google-chrome.png')}}" alt="avatar" width="20" height="20" />
                  </div>
                  <span class="fw-bolder">Chrome on Android</span>
                </td>
                <td>Google Pixel 3a</td>
                <td>Ghana</td>
                <td>11, Jan 2021 10:16</td>
              </tr>
              <tr>
                <td class="text-start">
                  <div class="avatar me-25">
                    <img src="{{asset('images/icons/google-chrome.png')}}" alt="avatar" width="20" height="20" />
                  </div>
                  <span class="fw-bolder">Chrome on MacOS</span>
                </td>
                <td>Apple iMac</td>
                <td>Mayotte</td>
                <td>11, Jan 2021 12:10</td>
              </tr>
              <tr>
                <td class="text-start">
                  <div class="avatar me-25">
                    <img src="{{asset('images/icons/google-chrome.png')}}" alt="avatar" width="20" height="20" />
                  </div>
                  <span class="fw-bolder">Chrome on iPhone</span>
                </td>
                <td>Apple iPhone XR</td>
                <td>Mauritania</td>
                <td>12, Jan 2021 8:29</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!-- / recent device -->
    </div>
    <!--/ User Content -->
  </div>
</section>


@include('content/_partials/_modals/modal-edit-user')
@include('content/_partials/_modals/modal-upgrade-plan')
{{-- @include('content/_partials/_modals/modal-two-factor-auth') --}}
@endsection

@section('vendor-script')
  {{-- Vendor js files --}}
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/cleave/cleave.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/cleave/addons/cleave-phone.us.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/polyfill.min.js')) }}"></script>
@endsection

@section('page-script')
  {{-- Page js files --}}
  <script src="{{ asset(mix('js/scripts/pages/modal-two-factor-auth.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/pages/modal-edit-user.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/pages/app-user-view-security.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/pages/app-user-view.js')) }}"></script>
@endsection
