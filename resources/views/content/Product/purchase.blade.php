@extends('layouts/contentLayoutMaster')

@section('title', 'Liste des Products')

@section('vendor-style')
  {{-- vendor css files --}}
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/wizard/bs-stepper.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/spinner/jquery.bootstrap-touchspin.css')) }}">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

@endsection

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" type="text/css" href="{{asset('css/base/plugins/forms/pickers/form-flat-pickr.css')}}">
@endsection


@section('content')
<!-- Ajax Sourced Server-side -->
<section id="ajax-datatable">
  
      <div class="row card">
        {{-- <form class="auth-register-form mt-2" method="POST" action="{{ route('Product.store') }}">
          @csrf --}}
          <div class="col-12">
            <div class="card">
              <div class="row">
                <div class="form-group col-md-4">
                  <label class="form-label" for="modern-username">serie de bone</label>
                  <input type="text" id="modern-username" class="form-control" placeholder="johndoe" />
                </div>
                <x-forms.select2 label="Supplier" name="supplier" htmlname="supplier" dataobject="supplier" dataname="name" datavalue="id" cols="col-xl-4 col-md-6 mb-1" />
                <x-forms.select2 label="Stock" name="stock" htmlname="stock" dataobject="stock" dataname="name" datavalue="id" cols="col-xl-4 col-md-6 mb-1" />
                {{-- <x-forms.select2 label="Procut" name="product" htmlname="product" dataobject="product" dataname="name" datavalue="id" cols="col-xl-12 col-md-6 mb-1" /> --}}
                <div class="form-group col-md-4">
                  <label class="form-label" for="modern-username">serie de bone</label>
                  {{-- <input type="text" id="modern-username" class="form-control" placeholder="johndoe" /> --}}
                  <select class="select2 w-100 " name="language" id="product" multiple>
                    <option>English</option>
                    <option>French</option>
                    <option>Spanish</option>
                  </select>
                  </select>
                </div>
              </div>
            </div>
          </div>
        {{-- </form> --}}
        <div class="col-12">
          <div class="card">
            {{-- <div class="card-body border-bottom">
              <h4 class="card-title">Search & Filter</h4>
              <div class="row">
                <div class="col-md-4 user_status"></div>
              </div>
            </div> --}}
            
            {{-- pnu table --}}
            <div class="card-datatable" id="table_pnu">
              <table class="datatables-table table tablepnu">
                <thead>
                  <tr>
                    <th class=""></th>
                    <th class="">{{__('reference de peneu')}}</th>
                    <th class="">{{__('designation de peneu')}}</th>
                    <th class="">{{__('Prix d\'achat')}}</th>
                    <th class="">{{__('Prix de vente')}}</th>
                    <th class="">{{__('Quantite')}}</th>
                    <th></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
</section>
@endsection


@section('vendor-script')
    <!-- vendor files -->
    {{-- <script src="{{ asset(mix('vendors/js/forms/repeater/jquery.repeater.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/spinner/jquery.bootstrap-touchspin.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script> --}}
    <script src="{{ asset(mix('vendors/js/forms/spinner/jquery.bootstrap-touchspin.js')) }}"></script>
    <!-- vendor files -->
@endsection

@section('page-script')
    <!-- Page js files -->
    {{-- <script src="{{ asset(mix('js/scripts/forms/form-tooltip-valid.js')) }}"></script> --}}
    {{-- <script src="{{ asset(mix('js/scripts/forms/form-number-input.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/wizard/bs-stepper.min.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/forms/form-wizard.js')) }}"></script> --}}
    <script src="{{ asset(mix('js/scripts/forms/form-tooltip-valid.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/forms/form-number-input.js')) }}"></script>
    {{-- <script src="{{ asset(mix('js/scripts/forms/form-repeater.js')) }}"></script> --}}
@endsection