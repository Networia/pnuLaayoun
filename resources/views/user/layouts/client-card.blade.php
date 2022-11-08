<div class="card">
  <div class="card-body" style="padding-top:0px !important">
    <div class="user-avatar-section">
      <div class="d-flex align-items-center flex-column">
        <img
          class="img-fluid rounded mt-3 mb-2"
          src="{{ asset('https://ui-avatars.com/api/?background=7367f0&color=FFF&name=' . $client->name) }}"height="110"
          width="110"
          alt="User avatar"
        />
        <div class="user-info text-center mb-2">
          <h4>{{ $client->name }}</h4>
        </div>
      </div>
    </div>

    {{-- Pnu --}}
    <div class="client-profile-numbers" >

        <div class="d-flex align-items-start my-auto mb-2 client-profile-numbers-first">
          <span class="badge bg-light-success p-75 rounded">
            <i data-feather="dollar-sign" class="font-medium-2"></i>
          </span>
          <div class="ms-75">
            <h4 class="mb-0">{{ $Pespace }} DH</h4>
            <small>Pnu - Espèces</small>
          </div>
        </div>
  
        <div class="d-flex align-items-start my-auto mb-2 client-profile-numbers-centre">
          <span class="badge bg-light-warning p-75 rounded">
            <i data-feather="dollar-sign" class="font-medium-2"></i>
          </span>
          <div class="ms-75">
            <h4 class="mb-0">{{ $Pcreditfacture }} DH</h4>
            <small>Pnu - Crédit facture</small>
          </div>
        </div>

        <div class="d-flex align-items-start my-auto mb-2 client-profile-numbers-last">
          <span class="badge bg-light-danger p-75 rounded">
            <i data-feather="dollar-sign" class="font-medium-2"></i>
          </span>
          <div class="ms-75">
            <h4 class="mb-0">{{ $Pcredit }} DH</h4>
            <small>Pnu - Crédit</small>
          </div>
        </div>

    </div>

    <hr class="mb-xl-3">

    {{-- filter --}}
    <div class="client-profile-numbers">

      <div class="d-flex align-items-start my-auto mb-2 client-profile-numbers-first">
        <span class="badge bg-light-success p-75 rounded">
          <i data-feather="dollar-sign" class="font-medium-2"></i>
        </span>
        <div class="ms-75">
          <h4 class="mb-0">{{ $Sespace }} DH</h4>
          <small>Filter - Espèces</small>
        </div>
      </div>

      <div class="d-flex align-items-start my-auto mb-2 client-profile-numbers-centre">
        <span class="badge bg-light-warning p-75 rounded">
          <i data-feather="dollar-sign" class="font-medium-2"></i>
        </span>
        <div class="ms-75">
          <h4 class="mb-0">{{$Screditfacture}} DH</h4>
          <small>Filter - Crédit facture</small>
        </div>
      </div>

      <div class="d-flex align-items-start my-auto mb-2 client-profile-numbers-last">
        <span class="badge bg-light-danger p-75 rounded">
          <i data-feather="dollar-sign" class="font-medium-2"></i>
        </span>
        <div class="ms-75">
          <h4 class="mb-0">{{ $Scredit }} DH</h4>
          <small>Filter - Crédit</small>
        </div>
      </div>

    </div>

    <hr class="mb-xl-3">

    {{-- Battrie --}}
    <div class="client-profile-numbers">

      <div class="d-flex align-items-start my-auto mb-2 client-profile-numbers-first">
        <span class="badge bg-light-success p-75 rounded">
          <i data-feather="dollar-sign" class="font-medium-2"></i>
        </span>
        <div class="ms-75">
          <h4 class="mb-0">{{ $Sespace }} DH</h4>
          <small>Battrie - Espèces</small>
        </div>
      </div>

      <div class="d-flex align-items-start my-auto mb-2 client-profile-numbers-centre">
        <span class="badge bg-light-warning p-75 rounded">
          <i data-feather="dollar-sign" class="font-medium-2"></i>
        </span>
        <div class="ms-75">
          <h4 class="mb-0">{{$Screditfacture}} DH</h4>
          <small>Battrie - Crédit facture</small>
        </div>
      </div>

      <div class="d-flex align-items-start my-auto mb-2 client-profile-numbers-last">
        <span class="badge bg-light-danger p-75 rounded">
          <i data-feather="dollar-sign" class="font-medium-2"></i>
        </span>
        <div class="ms-75">
          <h4 class="mb-0">{{ $Scredit }} DH</h4>
          <small>Battrie - Crédit</small>
        </div>
      </div>

    </div>

    <hr class="mb-xl-3">

    {{-- Chambrer --}}
    <div class="client-profile-numbers">

      <div class="d-flex align-items-start my-auto mb-2 client-profile-numbers-first">
        <span class="badge bg-light-success p-75 rounded">
          <i data-feather="dollar-sign" class="font-medium-2"></i>
        </span>
        <div class="ms-75">
          <h4 class="mb-0">{{ $Sespace }} DH</h4>
          <small>Chambrer - Espèces</small>
        </div>
      </div>

      <div class="d-flex align-items-start my-auto mb-2 client-profile-numbers-centre">
        <span class="badge bg-light-warning p-75 rounded">
          <i data-feather="dollar-sign" class="font-medium-2"></i>
        </span>
        <div class="ms-75">
          <h4 class="mb-0">{{$Screditfacture}} DH</h4>
          <small>Chambrer - Crédit facture</small>
        </div>
      </div>

      <div class="d-flex align-items-start my-auto mb-2 client-profile-numbers-last">
        <span class="badge bg-light-danger p-75 rounded">
          <i data-feather="dollar-sign" class="font-medium-2"></i>
        </span>
        <div class="ms-75">
          <h4 class="mb-0">{{ $Scredit }} DH</h4>
          <small>Chambrer - Crédit</small>
        </div>
      </div>

    </div>

    <hr class="mb-xl-3">
    
    {{-- Oil --}}
    <div class="client-profile-numbers">

      <div class="d-flex align-items-start my-auto mb-2 client-profile-numbers-first">
        <span class="badge bg-light-success p-75 rounded">
          <i data-feather="dollar-sign" class="font-medium-2"></i>
        </span>
        <div class="ms-75">
          <h4 class="mb-0">{{ $Sespace }} DH</h4>
          <small>Oil - Espèces</small>
        </div>
      </div>

      <div class="d-flex align-items-start my-auto mb-2 client-profile-numbers-centre">
        <span class="badge bg-light-warning p-75 rounded">
          <i data-feather="dollar-sign" class="font-medium-2"></i>
        </span>
        <div class="ms-75">
          <h4 class="mb-0">{{$Screditfacture}} DH</h4>
          <small>Oil - Crédit facture</small>
        </div>
      </div>

      <div class="d-flex align-items-start my-auto mb-2 client-profile-numbers-last">
        <span class="badge bg-light-danger p-75 rounded">
          <i data-feather="dollar-sign" class="font-medium-2"></i>
        </span>
        <div class="ms-75">
          <h4 class="mb-0">{{ $Scredit }} DH</h4>
          <small>Oil - Crédit</small>
        </div>
      </div>

    </div>

    <div class="card-header border-bottom pb-50 mb-1" style="padding-left: 0px;padding-right: 0px;">
      <h4 class="card-title ">Informations :</h4>
      <div class="dropdown chart-dropdown">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical font-medium-3 cursor-pointer" data-bs-toggle="dropdown" aria-expanded="false"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
        {{-- <div class="dropdown-menu dropdown-menu-end">
          <a class="dropdown-item" href="{{route('client.edit',['id'=>$user->id, 'redirect_to'=>url()->current()])}}"><i data-feather='edit'></i> Modifier</a>
          <a class="dropdown-item" href="{{route('client.canby',$user->id)}}"><i data-feather='alert-triangle'></i> Interdire l'achat</a>
        </div> --}}
      </div>
    </div>

    <div class="info-container">
      <ul class="list-unstyled client-profile-details">

        <li class="mb-75">
          <span class="fw-bolder me-25">Nom client :</span>
          <span>{{ $client->name ?? '----'}}</span>
        </li>

        <li class="mb-75">
          <span class="fw-bolder me-25">Adresse :</span>
          <span>{{ $client->adress ?? '----'}}</span>
        </li>

        <li class="mb-75">
          <span class="fw-bolder me-25">Téléphone :</span>
          <span>{{ $client->phone ?? '----'}}</span>
        </li>

        <li class="mb-75">
          <span class="fw-bolder me-25">Date de création :</span>
          <span>{{ $client->created_at ?? '----'}}</span>
        </li>

      </ul>
      {{-- <div class="d-flex justify-content-center pt-2">
        <a href="javascript:;" class="btn btn-primary me-1" data-bs-target="#editUser" data-bs-toggle="modal">
          Edit
        </a>
      </div> --}}
    </div>
  </div>
  
</div>
