@extends('layouts/contentLayoutMaster')

@section('title', __('Nouveau Product'))

@section('vendor-style')
    <!-- vendor css files -->
    {{-- <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}"> --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/spinner/jquery.bootstrap-touchspin.css')) }}">
@endsection

@section('content')
<!-- Basic Inputs start -->
<section id="basic-input">
        <div class="row">
            <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <form class="auth-register-form mt-2" method="POST" action="{{ route('Product.store') }}">
                        @csrf
                        <div class="row">
                            <x-forms.select2 label="Catégorie" name="categorie" htmlname="categorie" dataobject="categorie" dataname="name" datavalue="id" cols="col-xl-3 col-md-6 mb-1 typecategorie" />
                            <x-forms.input  label="reference" name="reference" cols="col-3 serie_peneu input_collection" />
                            <x-forms.input  label="designation" name="designation" cols="col-3 marque_peneu input_collection" />
                            <x-forms.input label="Prix Achat" name="prix_achat"  type='number' min="0" step=".01" cols="col-3 "/>
                            <x-forms.input label="Prix vente" name="prix_vente"  type='number' min="0" step=".01" cols="col-3 "/>
                            <div class="col-3">
                                <label class="form-label" for="product-stock">Stock</label>
                                <select class="select2 form-control"  name="stocks_ids[]" multiple>
                                    @foreach ($stocks as $stock)
                                    <option value="{{$stock->id}}">{{$stock->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary mt-1 me-1">Créer</button>
                                <button type="reset" class="btn btn-outline-secondary mt-1">Réinitialiser</button>
                            </div>
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </section>
<!-- Basic Inputs end -->
@endsection

@section('vendor-script')
    <!-- vendor files -->
    <script src="{{ asset(mix('vendors/js/forms/spinner/jquery.bootstrap-touchspin.js')) }}"></script>
    {{-- <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script> --}}
    <!-- vendor files -->
@endsection

@section('page-script')
    <!-- Page js files -->
    <script>
    select = $('.select2'),
    select.each(function () {
    var $this = $(this)
    $this.wrap('<div class="position-relative"></div>')
    $this.select2({
      // the following code is used to disable x-scrollbar when click in select input and
      // take 100% width in responsive also
      dropdownAutoWidth: true,
      width: '100%',
      dropdownParent: $this.parent()
    })
  })
    </script>
    <script src="{{ asset(mix('js/scripts/forms/form-tooltip-valid.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/forms/form-number-input.js')) }}"></script>
    {{-- <script src="{{ asset(mix('js/scripts/pages/app-user-list.js')) }}"></script> --}}
    {{-- <script src="{{ asset('js/scripts/product/create-product.js') }}"></script> --}}
@endsection
