@extends('layouts/contentLayoutMaster')

@section('title', 'Liste des Products')

@section('vendor-style')
    {{-- vendor css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
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
            <form id="add_productPurchase">
                <div class="col-12">
                    <div class="card">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="form-label" for="modern-username">Serie de bone</label>
                                <input type="text" id="modern-username" class="form-control"
                                       placeholder="Serie de bone"/>
                            </div>
                            <x-forms.select2 label="Stock" name="stock" htmlname="stock" dataobject="stock"
                                             dataname="name" datavalue="id" cols="col-xl-4 col-md-6 mb-1"
                                             id="stock_id"/>
                            <div class="form-group col-xl-4 col-md-6 mb-1">
                                <label class="form-label" for="basic-icon-default-fullname">Client</label>
                                <select class="client-by-stock" id="client_data">
                                    {{--
                                                                        <option value="0">Animal ?</option>
                                    --}}
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="form-label" for="modern-username">Product</label>
                                <input type="text" id="product" class="form-control" placeholder="produit"/>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary mt-1 me-1">Créer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            {{-- </form> --}}
            <div class="col-12">
                <div class="card">
                    <div class="card-datatable">
                        <table class="datatables-table table" id="tableSalesproduct">
                            <thead>
                            <tr>
                                <th class="">{{__('reference')}}</th>
                                <th class="">{{__('designation')}}</th>
                                <th class="">{{__('Prix de vente')}}</th>
                                <th class="">{{__('Quantite')}}</th>
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
    <script src="{{ asset(mix('vendors/js/forms/spinner/jquery.bootstrap-touchspin.js')) }}"></script>
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
    <!-- vendor files -->
@endsection

@section('page-script')
    <!-- Page js files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.client-by-stock').select2();
            $(document).delegate("#stock_id", "change", function () {
                var stock_id = $('#stock_id').val();
                $.get('/client/clients-by-stock-id', {client_stock_id: stock_id}, function (data, textStatus, jqXHR) {
                    $('#client_data').select2({
                        data: $.map(JSON.parse(data), function (a) {
                            return {
                                "id": a.id,
                                "text": a.name
                            }
                        })
                    });
                });

            });

        });

    </script>
    <script type="text/javascript">
        var path = "{{ route('autocomplete') }}";
        var responseProduct;
        var t = $('#tableSalesproduct').DataTable();
        $("#product").autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: path,
                    type: 'GET',
                    dataType: "json",
                    data: {
                        search: request.term
                    },
                    success: function (data) {
                        response(data);
                    }
                })
            },
            select: function (event, ui) {
                var trHTML = '';
                $('#product').val(ui.item.label);
                 var resultProduct  = ui.item;
                  t.row.add([resultProduct.label , resultProduct.designation, resultProduct.prix_vente,resultProduct.quantite_dispo]).draw(false);
                  return false;
            }
        });
    </script>

@endsection