@extends('layouts/contentLayoutMaster')

@section('title', 'Account')

@section('vendor-style')
  <!-- vendor css files -->
  <link rel='stylesheet' href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel='stylesheet' href="{{ asset(mix('vendors/css/animate/animate.min.css')) }}">
  <link rel='stylesheet' href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
@endsection
@section('page-style')
  <!-- Page css files -->
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-sweet-alerts.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
@endsection

@section('content')
<div class="row">
  <div class="col-12">
    <ul class="nav nav-pills mb-2">
      <!-- Account -->
      <li class="nav-item">
        <a class="nav-link active" href="{{ route('settings.account') }}">
          <i data-feather="user" class="font-medium-3 me-50"></i>
          <span class="fw-bold">Account</span>
        </a>
      </li>
      <!-- security -->
      <li class="nav-item">
        <a class="nav-link" href="{{ route("settings.security") }}">
          <i data-feather="lock" class="font-medium-3 me-50"></i>
          <span class="fw-bold">Security</span>
        </a>
      </li>
      <!-- billing and plans -->
      <li class="nav-item">
        <a class="nav-link" href="{{asset('page/account-settings-billing')}}">
          <i data-feather="bookmark" class="font-medium-3 me-50"></i>
          <span class="fw-bold">Billings &amp; Plans</span>
        </a>
      </li>
      <!-- notification -->
      <li class="nav-item">
        <a class="nav-link" href="{{asset('page/account-settings-notifications')}}">
          <i data-feather="bell" class="font-medium-3 me-50"></i>
          <span class="fw-bold">Notifications</span>
        </a>
      </li>
      <!-- connection -->
      <li class="nav-item">
        <a class="nav-link" href="{{asset('page/account-settings-connections')}}">
          <i data-feather="link" class="font-medium-3 me-50"></i>
          <span class="fw-bold">Connections</span>
        </a>
      </li>
    </ul>

    <!-- profile -->
    <div class="card">
      <div class="card-header border-bottom">
        <h4 class="card-title">Profile Details</h4>
      </div>
      <div class="card-body py-2 my-25">
        <!-- header section -->
        <div class="d-flex">
          <a href="#" class="me-25">
            <img
              src="{{ asset(Auth::user()->image == null ? 'https://ui-avatars.com/api/?background=22C2F4&color=01377D&name=' . Auth::user()->name : Auth::user()->image) }}"
              id="account-upload-img"
              class="uploadedAvatar rounded me-50"
              alt="profile image"
              height="100"
              width="100"
            />
          </a>
          <!-- upload and reset button -->
          <div class="d-flex align-items-end mt-75 ms-1">
            <div>
              <label for="account-upload" class="btn btn-sm btn-primary mb-75 me-75">Upload</label>
              <form action="{{ route('settings.account.image') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="file" id="account-upload" name="image" hidden accept="image/*" required />
                  <button class="btn btn-sm btn-outline-success mb-75">Save</button>
              </form>
              {{-- <button type="button" id="account-reset" class="btn btn-sm btn-outline-secondary mb-75">Reset</button> --}}
              @error('image')
                <span id="" class="error">{{ $message }}</span>
              @enderror
              <p class="mb-0">Allowed file types: jpg, jpeg, png, bmp.</p>
            </div>
          </div>
          <!--/ upload and reset button -->
        </div>
        {{-- <div class="media">
            <a href="javascript:void(0);" class="mr-25">
            <img
                src="{{ asset(Auth::user()->image === 'false' ? 'https://ui-avatars.com/api/?background=22C2F4&color=01377D&name=' . Auth::user()->name : Auth::user()->image) }}"
                id="account-upload-img"
                class="rounded mr-50"
                alt="profile image"
                height="80"
                width="80"
            />
            </a>
            <!-- upload and reset button -->
            <div class="media-body mt-75 ml-1">
            <label for="account-upload" class="btn btn-sm btn-primary mb-75 mr-75">Upload</label>
            <form action="{{ route('login') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" id="account-upload" name="image" hidden accept="image/*" required />
                <button class="btn btn-sm btn-outline-success mb-75">Save</button>
            </form>
            <p>Allowed jpg, jpeg, png, bmp. Max size of 2Mb</p>
            </div>
            <!--/ upload and reset button -->
        </div> --}}
        <!--/ header section -->
        @if (session('status') == 'profile-information-updated')
            <div class="col-12 mt-75">
                <div class="alert alert-success mb-50" role="alert">
                    {{-- <h4 class="alert-heading">Your email is not confirmed. Please check your inbox.</h4> --}}
                    <div class="alert-body">
                        <p href="javascript: void(0);" class="alert-link">
                            {{ __('auth.profile-information-updated') }}</p>
                    </div>
                </div>
            </div>
        @endif
        <!-- form -->
        <form class="validate-form mt-2 pt-50" action="{{ route('user-profile-information.update') }}" method="post">
          @method('put')
          @csrf
          <div class="row">
            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="accountFirstName">Name</label>
              <input
                type="text"
                class="form-control"
                id="accountFirstName"
                name="name"
                placeholder="Please enter first name"
                value="{{ Auth::user()->name }}"
                data-msg="Please enter first name"
              />
              @error('name')
                <span id="" class="error">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-12 col-sm-6 mb-1">
              <label class="form-label" for="accountEmail">Email</label>
              <input
                type="email"
                class="form-control"
                id="accountEmail"
                name="email"
                placeholder="Email"
                value="{{ Auth::user()->email }}"
              />
              @error('email')
                <span id="" class="error">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary mt-1 me-1">Save changes</button>
              <button type="reset" class="btn btn-outline-secondary mt-1">Discard</button>
            </div>
          </div>
        </form>
        <!--/ form -->
      </div>
    </div>

    <!-- deactivate account  -->
    {{-- <div class="card">
      <div class="card-header border-bottom">
        <h4 class="card-title">Delete Account</h4>
      </div>
      <div class="card-body py-2 my-25">
        <div class="alert alert-warning">
          <h4 class="alert-heading">Are you sure you want to delete your account?</h4>
          <div class="alert-body fw-normal">
            Once you delete your account, there is no going back. Please be certain.
          </div>
        </div>

        <form id="formAccountDeactivation" class="validate-form" onsubmit="return false">
          <div class="form-check">
            <input
              class="form-check-input"
              type="checkbox"
              name="accountActivation"
              id="accountActivation"
              data-msg="Please confirm you want to delete account"
            />
            <label class="form-check-label font-small-3" for="accountActivation">
              I confirm my account deactivation
            </label>
          </div>
          <div>
            <button type="submit" class="btn btn-danger deactivate-account mt-1">Deactivate Account</button>
          </div>
        </form>
      </div>
    </div> --}}
    <!--/ profile -->
  </div>
</div>
@endsection

@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/cleave/cleave.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/cleave/addons/cleave-phone.us.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/pages/page-account-settings-account.js')) }}"></script>
@endsection
