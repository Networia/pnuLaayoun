<!-- Add Role Modal -->
<div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-add-new-role">
    <div class="modal-content">
      <div class="modal-header bg-transparent">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body px-5 pb-5">
        <div class="text-center mb-4">
          <h1 class="role-title">Add New Role</h1>
          <p>Set role permissions</p>
        </div>
        <!-- Add role form -->
        <form id="addRoleForm" class="row" data-add-action="{{ route('role.create') }}" data-update-action="{{ route('role.update','') }}" method="post">
          @csrf
          <div class="col-12">
            <label class="form-label" for="modalRoleName">Role Name</label>
            <input
              type="text"
              id="modalRoleName"
              name="modalRoleName"
              class="form-control"
              placeholder="Enter role name"
              tabindex="-1"
              data-msg="Please enter role name"
            />
          </div>
          <div class="col-12">
            <h4 class="mt-2 pt-50">Role Permissions</h4>
            <!-- Permission table -->
            <div class="table-responsive">
              <table class="table table-flush-spacing">
                <tbody>
                  <tr>
                    <td class="text-nowrap fw-bolder">
                      Administrator Access
                      <span data-bs-toggle="tooltip" data-bs-placement="top" title="Allows a full access to the system">
                        <i data-feather="info"></i>
                      </span>
                    </td>
                    <td>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="selectAll" />
                        <label class="form-check-label" for="selectAll"> Select All </label>
                      </div>
                    </td>
                  </tr>
                  @foreach ($permissions as $permissionName => $subpermissions)
                    <tr>
                      <td class="text-nowrap fw-bolder">{{ $permissionName }}</td>
                      <td>
                        <div class="d-flex">
                          @foreach ($subpermissions as $subpermission)
                            <div class="form-check me-3 me-lg-5">
                              <input class="form-check-input" type="checkbox" id="{{ $subpermission->name }}" name="permissions[]{{ $subpermission->name }}" value="{{ $subpermission->name }}" />
                              <label class="form-check-label" for="{{ $subpermission->name }}"> {{ $subpermission->name }} </label>
                            </div>
                          @endforeach
                        </div>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- Permission table -->
          </div>
          <div class="col-12 text-center mt-2">
            <button type="submit" class="btn btn-primary me-1">Submit</button>
            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
              Discard
            </button>
          </div>
        </form>
        <!--/ Add role form -->
      </div>
    </div>
  </div>
</div>
<!--/ Add Role Modal -->
