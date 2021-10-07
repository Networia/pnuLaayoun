<!-- Edit User Modal -->
<div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
    <div class="modal-content">
      <div class="modal-header bg-transparent">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body pb-5 px-sm-5 pt-50">
        <div class="text-center mb-2">
          <h1 class="mb-1">Edit User Information</h1>
          <p>Updating user details will receive a privacy audit.</p>
        </div>
        <form id="editUserForm" class="row gy-1 pt-75" action="{{ route('user.update',$user->id) }}" method="post">
          @csrf
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalEditUserFirstName">First Name</label>
            <input
              type="text"
              id="modalEditUserFirstName"
              name="name"
              class="form-control @error('name') error @enderror"
              placeholder="John"
              value="{{ $user->name }}"
              data-msg="Please enter your first name"
              required
            />
            @error('name')
              <span id="name" class="error">{{ $message }}</span>
            @enderror
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalEditUserEmail">Email:</label>
            <input
              type="text"
              id="modalEditUserEmail"
              name="email"
              class="form-control @error('email') error @enderror"
              value="{{ $user->email }}"
              placeholder="example@domain.com"
              required
            />
            @error('email')
              <span id="email" class="error">{{ $message }}</span>
            @enderror
          </div>
          <div class="col-12 text-center mt-2 pt-50">
            <button type="submit" class="btn btn-primary me-1">Submit</button>
            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
              Discard
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--/ Edit User Modal -->
