@extends('layouts/contentLayoutMaster')

@section('title', 'Roles')

@section('vendor-style')
  <!-- Vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
@endsection
@section('page-style')
  <!-- Page css files -->
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
@endsection

@section('content')
<h3>Roles List</h3>
<p class="mb-2">
  A role provided access to predefined menus and features so that depending <br />
  on assigned role an administrator can have access to what he need
</p>

<!-- Role cards -->
<div class="row">
  @foreach ($roles as $role)
    <div class="col-xl-4 col-lg-6 col-md-6">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <span>Total {{ $role->users->count() }} users</span>
            <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
              @foreach ($role->users as $user)
                <li
                  data-bs-toggle="tooltip"
                  data-popup="tooltip-custom"
                  data-bs-placement="top"
                  title="{{ $user->name }}"
                  class="avatar avatar-sm pull-up"
                >
                  <img class="rounded-circle" src="{{ $user->image !== null ? asset($user->image) : 'https://ui-avatars.com/api/?background=7367f0&color=FFF&name='.$user->name }}" alt="Avatar" />
                </li>
              @endforeach
            </ul>
          </div>
          <div class="d-flex justify-content-between align-items-end mt-1 pt-25">
            <div class="role-heading">
              <h4 class="fw-bolder">{{ ucfirst($role->name) }}</h4>
              <a href="javascript:;" class="role-edit-modal" data-edit="{{ route('role.edit',$role->id) }}" data-id="{{ $role->id }}" data-bs-toggle="modal" data-bs-target="#addRoleModal">
                <small class="fw-bolder">Edit Role</small>
              </a>
            </div>
            {{-- <a href="javascript:void(0);" class="text-body"><i data-feather="copy" class="font-medium-5"></i></a> --}}
          </div>
        </div>
      </div>
    </div>
  @endforeach
  
  <div class="col-xl-4 col-lg-6 col-md-6">
    <div class="card">
      <div class="row">
        <div class="col-sm-5">
          <div class="d-flex align-items-end justify-content-center h-100">
            <img
              src="{{asset('images/illustration/faq-illustrations.svg')}}"
              class="img-fluid mt-2"
              alt="Image"
              width="85"
            />
          </div>
        </div>
        <div class="col-sm-7">
          <div class="card-body text-sm-end text-center ps-sm-0">
            <a
              href="javascript:void(0)"
              data-bs-target="#addRoleModal"
              data-bs-toggle="modal"
              class="stretched-link text-nowrap add-new-role"
            >
              <span class="btn btn-primary mb-1">Add New Role</span>
            </a>
            <p class="mb-0">Add role, if it does not exist</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/ Role cards -->

@include('content/_partials/_modals/modal-add-role')
@endsection

@section('vendor-script')
  <!-- Vendor js files -->
  <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.bootstrap5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.checkboxes.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/pages/modal-add-role.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/pages/app-access-roles.js')) }}"></script>
@endsection
