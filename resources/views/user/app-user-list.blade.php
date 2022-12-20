@extends('layouts/contentLayoutMaster')

@section('title', 'Liste des utilisateurs')

@section('vendor-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')) }}">
@endsection

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
@endsection

@section('content')
<!-- users list start -->
<section class="app-user-list">
  <!-- list and filter start -->
  <div class="card">
    <div class="card-body border-bottom">
      <div class="row">
        {{-- <div class="col-md-4 user_role"></div>
        <div class="col-md-4 user_plan"></div> --}}
        <div class="col-12 user_status"></div>
      </div>
    </div>
    <div class="card-datatable table-responsive pt-0">
      <table class="user-list-table table" data-api="{{ route('user.api') }}" data-status="{{ route('user.status','') }}" data-detail="{{ route('user.security','') }}">
        <thead class="table-light">
          <tr>
            <th></th>
            <th class="all">Nom complet</th>
            <th class="desktop tablet-l tablet-p">Rôle</th>
            <th class="desktop tablet-l tablet-p">Statut</th>
            <th class="all">Actions</th>
          </tr>
        </thead>
      </table>
    </div>
    <!-- Modal to add new user starts-->
    <div class="modal modal-slide-in new-user-modal fade" id="modals-slide-in">
      <div class="modal-dialog">
        <form id="model-user" class="add-new-user modal-content pt-0" action="{{ route('user.store') }}" method="POST">
          @csrf
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
          <div class="modal-header mb-1">
            <h5 class="modal-title" id="exampleModalLabel">Nouvel utilisateur</h5>
          </div>
          <div class="modal-body flex-grow-1 mt-0">
            <div class="mb-1">
              <label class="form-label" for="basic-icon-default-fullname">Nom complet</label>
              <input
                type="text"
                class="form-control dt-full-name @error('name') error @enderror"
                id="basic-icon-default-fullname"
                name="name"
              />
              @error('name')
                <span id="" class="error">{{ $message }}</span>
              @enderror
            </div>
            <div class="mb-1">
              <label class="form-label" for="basic-icon-default-email">Email</label>
              <input
                type="text"
                id="basic-icon-default-email"
                class="form-control dt-email @error('email') error @enderror"
                name="email"
              />
              @error('email')
                <span id="" class="error">{{ $message }}</span>
              @enderror
            </div>
            <div class="mb-1">
              <label class="form-label" for="basic-icon-default-password">Mot de passe</label>
              <input
                type="text"
                id="basic-icon-default-password"
                class="form-control dt-password @error('password') error @enderror"
                name="password"
              />
              @error('password')
                <span id="" class="error">{{ $message }}</span>
              @enderror
            </div>
            <div class="mb-1">
              <label class="form-label" for="basic-icon-default-password_confirmation">Confirmation mot de passe</label>
              <input
                type="text"
                id="basic-icon-default-password_confirmation"
                class="form-control dt-password_confirmation"
                name="password_confirmation"
              />
            </div>
            <div class="mb-1">
              <label class="form-label" for="user-role">Rôle</label>
              <select id="user-role" class="select2 form-select" name="role">
                @foreach ($roles as $role)
                  <option value="{{ $role->name }}">{{ $role->name }}</option>
                @endforeach
              </select>
            </div>
            <button type="submit" class="btn btn-primary me-1 mt-1">Ajouter</button>
            <button type="reset" class="btn btn-outline-secondary mt-1" data-bs-dismiss="modal">Annuler</button>
          </div>
        </form>
      </div>
    </div>
    <!-- Modal to add new user Ends-->
  </div>
  <!-- list and filter end -->
</section>
<!-- users list ends -->
@endsection

@section('vendor-script')
  {{-- Vendor js files --}}
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/jszip.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.rowGroup.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/cleave/cleave.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/cleave/addons/cleave-phone.us.js')) }}"></script>
@endsection

@section('page-script')
  {{-- Page js files --}}
  <script src="{{ asset(mix('js/scripts/pages/app-user-list.js')) }}"></script>
@endsection
