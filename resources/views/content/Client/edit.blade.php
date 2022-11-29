@extends('layouts/contentLayoutMaster')

@section('title', __('Éditer les informations de Client : '.$last->name))

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
                    <form class="auth-register-form mt-2" method="POST" action="{{ route('client.update',request()->id) }}">
                        @csrf
                        <div class="row">
                            {{$stock}}
                            <x-forms.input label="name" name="name" :last="$last" cols="col-3"/>
                            <x-forms.input label="phone" name="number_phone" :last="$last" cols="col-3"/>
                            <x-forms.input label="Adress" name="adress" :last="$last" cols="col-3"/>
                            <x-forms.select2 label="Stock" name="stock" htmlname="stock" dataobject="stock" dataname="name" datavalue="id" :last="$stock"  cols="col-xl-3" />
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
