@extends('layouts/contentLayoutMaster')

@section('title', 'Liste des Products')

@section('vendor-style')
  {{-- vendor css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/animate/animate.min.css')) }}">

@endsection

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" type="text/css" href="{{asset('css/base/plugins/forms/pickers/form-flat-pickr.css')}}">
@endsection


@section('content')
<!-- Ajax Sourced Server-side -->
<section id="ajax-datatable">
  <div class="row">
    <div class="col-12">
      <div class="card">
          <ul class="nav nav-pills mb-0">
            @include('content.product.pills')
          </ul>
      </div>
    </div>
    <div class="col-12">
      <div class="card">
        {{-- <div class="card-body border-bottom">
          <h4 class="card-title">Search & Filter</h4>
          <div class="row">
            <div class="col-md-4 user_status"></div>
          </div>
        </div> --}}
        
        {{-- pnu table --}}
        <div class="card-datatable hidden" id="table_pnu">
          <table class="datatables-table table tablepnu" data-edit="{{ route('Product.edit' ,"") }}" data-api="{{ route('Product.pnu') }}">
            <thead>
              <tr>
                <th class=""></th>
                <th class="">{{__('id')}}</th>
                <th class="">{{__('Serie de peneu')}}</th>
                <th class="">{{__('Marque de peneu')}}</th>
                <th class="">{{__('Prix d\'achat')}}</th>
                <th class="">{{__('Prix de vente')}}</th>
                <th class="">{{__('Quentite')}}</th>
                <th class="">{{__('Stock')}}</th>
                <th class="">{{__('Date')}}</th>
                <th></th>
              </tr>
            </thead>
          </table>
        </div>

        {{-- filter table --}}
        {{-- <div class="card-datatable hidden" id="table_filter">
          <table class="datatables-table table tablefilter" data-edit="{{ route('Product.edit' ,"") }}" data-api="{{ route('Product.api') }}">
            <thead>
              <tr>
                <th class=""></th>
                <th class="">{{__('id')}}</th>
                <th class="">{{__('Reference de filter')}}</th>
                <th class="">{{__('Marque de filter')}}
                <th class="">{{__('Prix d\'achat')}}</th>
                <th class="">{{__('Prix de vente')}}</th>
                <th class="">{{__('Quentite')}}</th>
                <th class="">{{__('Date')}}</th>
                <th></th>
              </tr>
            </thead>
          </table>
        </div> --}}
      </div>
    </div>
  </div>
</section>
@endsection


@section('vendor-script')
{{-- vendor files --}}
  <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.checkboxes.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/jszip.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.rowGroup.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection

@section('page-script')
  {{-- Page js files --}}
  <script src="{{ asset(('js/scripts/tables/Product-table-datatables-advanced.js')) }}"></script>
@endsection
