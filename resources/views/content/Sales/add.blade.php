@extends('layouts/contentLayoutMaster')

@section('title', __('Nouveau vente'))

@section('vendor-style')
    <!-- vendor css files -->
    {{-- <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}"> --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/spinner/jquery.bootstrap-touchspin.css')) }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
@endsection

@section('content')
    <!-- Basic Inputs start -->
    <section id="basic-input">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">
                        <form class="auth-register-form mt-2" method="POST" action="{{ route('Stock.store') }}">
                            @csrf
                            <div class="row">

{{--
                                <x-forms.input label="name de stock" name="name" cols="col-3"/>
--}}
                                <div class="col-3">
                                    <input class="typeahead form-control" id="search" type="text">
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mt-1 me-1">Créer</button>
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
    {{-- <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script> --}}
    <!-- vendor files -->
@endsection

@section('page-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript">
        var path = "{{ route('autocomplete') }}";
        $( "#search" ).autocomplete({
            source: function( request, response ) {
                ;$.ajax({
                    url: path,
                    type: 'GET',
                    dataType: "json",
                    data: {
                        search: request.term
                    },
                    success: function( data ) {
                        response( data );
                    }
                })
                console.log("testttttttt");
                console.log(response);
            },
            select: function (event, ui) {
                $('#search').val(ui.item.label);
                console.log(ui.item);
                return false;
            }
        });

    </script>
    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/forms/form-tooltip-valid.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/forms/form-number-input.js')) }}"></script>
@endsection
