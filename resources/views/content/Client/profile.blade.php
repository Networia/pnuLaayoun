@extends('layouts/contentLayoutMaster')

@section('title', $client->name .' : Produits vendus ' )

@section('vendor-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/animate/animate.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')) }}">

  <link rel="stylesheet" href="{{ asset(mix('vendors/css/charts/apexcharts.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
  {{-- <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.min.css')) }}"> --}}

@endsection

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/charts/chart-apex.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-sweet-alerts.css')) }}">
  <link rel="stylesheet" href="{{ asset(('vendors/css/tables/datatable/dataTables.dateTime.min.css')) }}">

  <link rel="stylesheet" type="text/css" href="{{asset('css/base/plugins/forms/pickers/form-flat-pickr.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/base/plugins/forms/pickers/form-pickadate.css')}}">
@endsection

@section('content')
<section class="app-user-view-account">
  <div class="row">
    <!-- User Sidebar -->
    <div class="col-xl-12 col-lg-12 col-md-12">
      <!-- User Card -->
      @include('user.layouts.client-card')
      <!-- /User Card -->
    </div>

    {{-- <div class="col-xl-6 col-lg-12 col-md-12">
      <!-- User Card -->
      @include('user.layouts.client-chart-products-card')
      <!-- /User Card -->
    </div> --}}
    {{-- <div class="col-xl-6 col-lg-12 col-md-12">
      <!-- User Card -->
      @include('user.layouts.client-chart-services-card')
      <!-- /User Card -->
    </div> --}}
    <!--/ User Sidebar -->

    <!-- User Content -->
    <div class="col-12 order-0 order-md-1">
      <!-- User Pills -->
      {{-- <div class="card">
        <ul class="nav nav-pills mb-0">
          @include('content.client.pills')
        </ul>
      </div> --}}
      <!--/ User Pills -->

      <div class="tab-content">

          <div role="tabpanel" class="card tab-pane active" id="products-fill" aria-labelledby="products-tab-fill" aria-expanded="true">

              <div class="card-body mt-2">
                <form class="dt_adv_search" method="POST">
                  <div class="row">
                    <div class="col-12">
                      <div class="form-row">

                        <div class="col-12">
                          <label>Filtrer par date:</label>
                          <div class="form-group mb-0">
                            <input
                              type="text"
                              class="form-control dt-date flatpickr-range dt-input"
                              data-column="11"
                              placeholder="De ... à ..."
                              data-column-index="10"
                              name="dt_date"
                            />
                            <input
                              type="hidden"
                              class="form-control dt-date start_date dt-input"
                              data-column="11"
                              data-column-index="10"
                              name="value_from_start_date"
                            />
                            <input
                              type="hidden"
                              class="form-control dt-date end_date dt-input"
                              name="value_from_end_date"
                              data-column="11"
                              data-column-index="10"
                            />
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                </form>
              </div>
              {{-- {{ route('sale.edit' ,"") }} --}}
              {{-- {{ route('client.sale.api', request()->id) }} --}}
            <table class="datatables-table table table-products" data-edit="" data-api="" data-profile_client="{{route('client.profil',"")}}">
              <thead>
                <tr>
                    <th class="control"></th>
                    <th class="all"></th>
                    <th class="never">{{__('id')}}</th>
                    <th class="desktop tablet-p tablet-l">{{__('Série')}}</th>
                    <th class="desktop tablet-p tablet-l">{{__('Marque')}}</th>
                    <th class="desktop tablet-l">{{__('Quantité')}}</th>
                    <th class="desktop">{{__('P.unitaire')}}</th>
                    <th class="all">{{__('Total')}}</th>
                    <th class="desktop">{{__('Espéce')}}</th>
                    <th class="desktop">{{__('Crédit')}}</th>
                    <th class="all">{{__('Facturée')}}</th>
                    <th class="desktop">{{__('Date de vente')}}</th>
                </tr>
              </thead>
            </table>


          </div>

          @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      @php
                        session()->flash('toastr', ['type' => 'error', 'title' => __('toastr.title.error'), 'contant' =>  __($error)]);
                      @endphp
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
         @endif
      </div>



      <!-- /Activity Timeline -->
    </div>
    <!--/ User Content -->
  </div>
</section>
<div class="archive-form-wrapper" hidden>
  <div hidden class="archive-form" id="down-form" style="margin: auto;"> 
    {{-- <button style="margin: auto;" type="button" data-toggle="modal" id="onshowbtn" data-target="#onshow">Archiver</button> --}}
    <div class="btn-group" class="btn btn-primary">
        {{-- <form action="{{ route('pinvoice.store', $client->id) }}" class="onshowbtnForm" method="post">
          @csrf
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary waves-effect waves-float waves-light" data-bs-toggle="modal" data-bs-target="#exampleModal">
  <i data-feather='file-text'></i> Facturer
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Facturation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <label>Facture N° : </label>
                  <div class="form-group">
                              <input type="text" name="number" class="form-control mb-1 invoice-edit-input" required/>
                    </div>

                            
                            <label for="fp-default">Date:</label>
                            <div class="form-group">
                                <input type="text" id="fp-default" name="date" class="form-control  dt-date flatpickr-basic dt-input " placeholder="AAAA-MM-JJ" required/>
                            </div>
                       

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-primary down-btn"  data-dismiss="modal">Générer une facture</button>
      </div>
    </div>
  </div>
</div>
         
        </form> --}}
    </div>
  </div>
</div>


{{-- @include('content/_partials/_modals/modal-edit-user') --}}
{{-- @include('content/_partials/_modals/modal-upgrade-plan') --}}
@endsection

@section('vendor-script')
  {{-- Vendor js files --}}
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/cleave/cleave.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/cleave/addons/cleave-phone.us.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
  {{-- data table --}}
  <script src="{{ asset(mix('vendors/js/extensions/moment.min.js')) }}"></script>
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
  <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/polyfill.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/charts/apexcharts.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.checkboxes.min.js')) }}"></script>
  <script src="{{ asset(('vendors/js/tables/datatable/dataTables.dateTime.min.js')) }}"></script>
  <script src="{{ asset(('vendors/js/tables/datatable/moment.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
  {{-- <script src="{{ asset(mix('vendors/js/pickers/pickadate/pickadate.min.js')) }}"></script> --}}

@endsection

@section('page-script')
  {{-- Page js files --}}
  <script src="{{ asset(mix('js/scripts/pages/modal-edit-user.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/pages/app-user-view-account.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/pages/app-user-view.js')) }}"></script>
  <script src="{{ asset(('js/scripts/tables/clients/sale_client-table-datatables-advanced.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/pages/dashboard-ecommerce.js')) }}"></script>
@endsection
