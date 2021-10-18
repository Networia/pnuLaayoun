<div class="card">
    <div class="card-body">
      <div class="user-avatar-section">
        <div class="d-flex align-items-center flex-column">
          <img
            class="img-fluid rounded mt-3 mb-2"
            src="{{ asset($user->image == null ? 'https://ui-avatars.com/api/?background=7367f0&color=FFF&name=' . $user->name : $user->image) }}"                height="110"
            width="110"
            alt="User avatar"
          />
          <div class="user-info text-center">
            <h4>{{ $user->name }}</h4>
            <span class="badge bg-light-secondary">{{ $user->roles[0]->name ?? 'No' }}</span>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-around my-2 pt-75">
        <div class="d-flex align-items-start me-2">
          <span class="badge bg-light-primary p-75 rounded">
            <i data-feather="clock" class="font-medium-2"></i>
          </span>
          <div class="ms-75">
            <h4 class="mb-0">{{ $user->created_at->format('Y-m-d') }}</h4>
            <small>Account Created at</small>
          </div>
        </div>
        <div class="d-flex align-items-start">
          <span class="badge bg-light-primary p-75 rounded">
            <i data-feather="briefcase" class="font-medium-2"></i>
          </span>
          <div class="ms-75">
            <h4 class="mb-0">568</h4>
            <small>Projects Done</small>
          </div>
        </div>
      </div>
      <h4 class="fw-bolder border-bottom pb-50 mb-1">Details</h4>
      <div class="info-container">
        <ul class="list-unstyled">
          <li class="mb-75">
            <span class="fw-bolder me-25">Full Name:</span>
            <span>{{ $user->username ?? $user->name }}</span>
          </li>
          <li class="mb-75">
            <span class="fw-bolder me-25">Email:</span>
            <span>{{ $user->email }}</span>
          </li>
          <li class="mb-75">
            <span class="fw-bolder me-25">Status:</span>
            @if ($user->status)
              <span class="badge bg-light-success">Active</span>
            @else
              <span class="badge bg-light-danger">Desactive</span>
            @endif
          </li>
          <li class="mb-75">
            <span class="fw-bolder me-25">Role:</span>
            <span>{{ $user->roles[0]->name ?? 'No' }}</span>
          </li>
        </ul>
        <div class="d-flex justify-content-center pt-2">
          <a href="javascript:;" class="btn btn-primary me-1" data-bs-target="#editUser" data-bs-toggle="modal">
            Edit
          </a>
          <a href="javascript:;" class="btn btn-outline-danger suspend-user" data-link="{{ route('user.status',$user->id) }}" >Suspended</a>
        </div>
      </div>
    </div>
  </div>