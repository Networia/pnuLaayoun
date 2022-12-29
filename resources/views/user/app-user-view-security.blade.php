@extends('layouts/contentLayoutMaster')

@section('title', 'Compte')

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
    <div class="col-xl-4 col-lg-5 col-md-12 order-1 order-md-0">
      <!-- User Card -->
      @include('user.layouts.user-card')
      <!-- /User Card -->
      <!-- Plan Card -->
      <!-- /Plan Card -->
    </div>
    <!--/ User Sidebar -->

    <!-- User Content -->
    <div class="col-xl-8 col-lg-7 col-md-12 order-0 order-md-1">
      <!-- Change Password -->
      <div class="card">
        <h4 class="card-header">Changer le mot de passe</h4>
        <div class="card-body">
          <form id="formChangePassword" method="POST" action="{{ route('user.security.password',request()->id) }}">
            @csrf  
            <div class="row">
              <div class="mb-2 col-md-6 form-password-toggle">
                <label class="form-label" for="newPassword">Nouveau mot de passe</label>
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
                <label class="form-label" for="confirmPassword">Confirmer le nouveau mot de passe</label>
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
              <div class="col-12">
                <p class="fw-bolder">Exigences de mot de passe :</p>
                <ul class="ps-1 ms-25">
                  <li class="mb-50">Au moins 8 caractères</li>
                  <li class="mb-50">Au moins un caractère minuscule</li>
                  <li>Au moins un chiffre, un symbole ou un caractère d'espacement</li>
                </ul>
              </div>
              <div>
                <button type="submit" class="btn btn-primary me-2">Changer le mot de passe</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!--/ Change Password -->

      <!-- Two-steps verification -->
      <div class="card">
        <div class="card-body">
          <h4 class="card-title mb-50">Authentification à deux facteurs (2FA)</h4>
          <span>Gardez votre compte sécurisé avec authentification à deux facteurs.</span>
          @if ($user->two_factor_secret)
            <h6 class="fw-bolder mt-2">2FA Activé</h6>
            <div class="d-flex justify-content-between border-bottom mb-1 pb-1">
              <span>{{ $user->email }}</span>
              <div class="action-icons">
                <a href="{{ route('user.security.tsv',$user->id) }}" class="text-body"><i data-feather="trash" class="font-medium-3"></i></a>
              </div>
            </div>
          @endif
          <p class="mb-0">
              L'authentification à deux facteurs ajoute une couche de sécurité supplémentaire à votre compte en exigeant plus qu'un simple mot de passe pour vous connecter.
          </p>
        </div>
      </div>
      <!--/ Two-steps verification -->

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
