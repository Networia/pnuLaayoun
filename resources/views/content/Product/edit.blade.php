@extends('layouts/contentLayoutMaster')

@section('title', __('Éditer les informations de Product : '.$last->name))

@section('vendor-style')
    <!-- vendor css files -->
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/spinner/jquery.bootstrap-touchspin.css')) }}">
@endsection

@section('content')
<!-- Basic Inputs start -->
<section id="basic-input">
        <div class="row">
            <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <form class="auth-register-form mt-2" method="POST" action="{{ route('Product.update',request()->id) }}">
                        @csrf
                        <div class="row">

                            <x-forms.select2 :last="$last" label="Catégorie" name="categorie" htmlname="categorie" dataobject="categorie" dataname="name" datavalue="id" cols="col-xl-3 col-md-6 mb-1 typecategorie" />
                            <x-forms.input  :last="$last" label="reference" name="reference" cols="col-3 serie_peneu input_collection" />
                            <x-forms.input  :last="$last" label="designation" name="designation" cols="col-3 marque_peneu input_collection" />
                            <div class="col-3">
                                <label class="form-label" for="product-stock">Stock</label>
                                <select class="select2 form-control"  name="stocks_ids[]" multiple>
                                    @foreach ($stocks as $stock)
                                    <option value="{{$stock->id}}" {{ in_array($stock->id,$stocks_by_product) ? 'selected' : '' }}>{{$stock->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary mt-1 me-1">Sauvegarder</button>
                                <button type="reset" class="btn btn-outline-secondary mt-1">Réinitialiser</button>
                            </div>
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
    <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
    <!-- vendor files -->
@endsection

@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/forms/form-select2.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/forms/form-tooltip-valid.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/forms/form-number-input.js')) }}"></script>
@endsection
