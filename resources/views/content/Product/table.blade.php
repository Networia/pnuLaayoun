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
        <div class="card-datatable" id="table_pnu">
            <div class="row m-2">
                <div class="col-md-4 stock1_status"></div>
            </div>
          <table class="datatables-table table tablepnu" data-edit="{{ route('Product.edit' ,"") }}" data-api="{{ route('Product.pnu') }}">
            <thead>
              <tr>
                <th class=""></th>
                <th class="">{{__('reference de peneu')}}</th>
                <th class="">{{__('designation de peneu')}}</th>
                <th class="">{{__('Prix d\'achat')}}</th>
                <th class="">{{__('Prix de vente')}}</th>
                <th class="">{{__('Quantite')}}</th>
                <th class="never">{{__('stock_id')}}</th>
                <th></th>
              </tr>
            </thead>
          </table>
        </div>

        {{-- filter table --}}
        <div class="card-datatable hidden" id="table_filter">
            <div class="row m-2">
                <div class="col-md-4 stock2_status"></div>
            </div>
            <table class="datatables-table table tablefilter" data-edit="{{ route('Product.edit' ,"") }}" data-api="{{ route('Product.filter') }}">
                <thead>
                    <tr>
                        <th class="control"></th>
                        <th class="">{{__('Reference de filter')}}</th>
                        <th class="">{{__('designation de filter')}}
                        <th class="">{{__('Prix d\'achat')}}</th>
                        <th class="">{{__('Prix de vente')}}</th>
                        <th class="">{{__('Quentite')}}</th>
                        <th class="never">{{__('stock_id')}}</th>
                        <th></th>
                    </tr>
                </thead>
            </table>
        </div>

        {{-- chamberer table --}}
        <div class="card-datatable hidden" id="table_chambrere">
            <div class="row m-2">
                <div class="col-md-4 stock3_status"></div>
            </div>
            <table class="datatables-table table tablechambrere" data-edit="{{ route('Product.edit' ,"") }}" data-api="{{ route('Product.chambriereapi') }}">
                <thead>
                <tr>
                    <th class=""></th>
                    <th class="">{{__('reference chambrere')}}</th>
                    <th class="">{{__('designation de chambrere')}}
                    <th class="">{{__('Prix d\'achat')}}</th>
                    <th class="">{{__('Prix de vente')}}</th>
                    <th class="">{{__('Quentite')}}</th>
                    <th class="never">{{__('stock_id')}}</th>
                    <th></th>
                </tr>
                </thead>
            </table>
        </div>

        {{-- battrie table --}}
        <div class="card-datatable hidden" id="table_battrie">
          <table class="datatables-table table tablebattrie" data-edit="{{ route('Product.edit' ,"") }}" data-api="{{ route('Product.battrieapi') }}">
            <thead>
              <tr>
                <th class=""></th>
                <th class="">{{__('reference de battrie')}}</th>
                <th class="">{{__('designation de battrie')}}
                <th class="">{{__('Prix d\'achat')}}</th>
                <th class="">{{__('Prix de vente')}}</th>
                <th class="">{{__('Quentite')}}</th>
                <th></th>
              </tr>
            </thead>
          </table>
        </div>

        {{-- huile table --}}
        <div class="card-datatable hidden" id="table_huile">
          <table class="datatables-table table tablehuile" data-edit="{{ route('Product.edit' ,"") }}" data-api="{{ route('Product.huileapi') }}">
            <thead>
              <tr>
                <th class=""></th>
                <th class="">{{__('reference d\'huile')}}</th>
                <th class="">{{__('designation d\'huile')}}</th>
                <th class="">{{__('Prix d\'achat')}}</th>
                <th class="">{{__('Prix de vente')}}</th>
                <th class="">{{__('Quentite')}}</th>
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
  {{-- <script src="{{ asset(('js/scripts/tables/Product-table-datatables-advanced.js')) }}"></script> --}}
  <script src="{{ asset(('js/scripts/tables/pneu-table.js')) }}"></script>
  <script src="{{ asset(('js/scripts/tables/tablefilter-table.js')) }}"></script>
  <script src="{{ asset(('js/scripts/tables/chambrere-table.js')) }}"></script>
  <script src="{{ asset(('js/scripts/tables/battrie-table.js')) }}"></script>
  <script src="{{ asset(('js/scripts/tables/huile-table.js')) }}"></script>


  <script>

function hideAll() {
    $('.card-datatable').each( (i,e) => {
        $(e).hide();
    })
  }

    $('#pnu_products').on('click', function(){
      $("#pnu_products > a").addClass("active");
    //remove class active if hase
      $("#filter_products>a").removeClass("active");
      $("#chambrere_products>a").removeClass("active");
      $("#battrie_products>a").removeClass("active");
      $("#huile_products>a").removeClass("active");

      hideAll();
      $("#table_pnu").removeClass("hidden");
      $("#table_pnu").show();
    });

      //filter
    $('#filter_products').on('click', function(){
      $("#filter_products > a").addClass("active");
        //remove class active if hase
      $("#pnu_products>a").removeClass("active");
      $("#chambrere_products>a").removeClass("active");
      $("#battrie_products>a").removeClass("active");
      $("#huile_products>a").removeClass("active");
      hideAll();
      $("#table_filter").removeClass("hidden");
      $("#table_filter").show();
    });

    //chambrere
    $('#chambrere_products').on('click', function(){
      $("#chambrere_products>a").addClass("active");
      //remove class active if hase
      $("#pnu_products>a").removeClass("active");
      $("#filter_products>a").removeClass("active");
      $("#battrie_products>a").removeClass("active");
      $("#huile_products>a").removeClass("active");
      hideAll();
      $("#table_chambrere").removeClass("hidden");
      $("#table_chambrere").show();
    });

    //battrie
    $('#battrie_products').on('click', function(){
        $("#battrie_products>a").addClass("active");
      //remove class active if hase
        $("#pnu_products>a").removeClass("active");
        $("#filter_products>a").removeClass("active");
        $("#chambrere_products>a").removeClass("active");
        $("#huile_products>a").removeClass("active");
        hideAll();
        $("#table_battrie").removeClass("hidden");
        $("#table_battrie").show();
    });

      //Huile
    $('#huile_products').on('click', function(){
      $("#huile_products> a").addClass("active");
    //remove class active if hase
      $("#pnu_products>a").removeClass("active");
      $("#filter_products>a").removeClass("active");
      $("#chambrere_products >a").removeClass("active");
      $("#battrie_products>a").removeClass("active");
      hideAll();
      $("#table_huile").removeClass("hidden");
      $("#table_huile").show();
    });
  </script>
@endsection
