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
    <!-- FONT AWESOME CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!-- AJAX JQUERY SCRIPT -->
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
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
                                <label class="form-label" for="serie_bone">Serie de bone</label>
                                <input type="text" id="serie_bone" class="form-control"
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
                                <th class="">{{__('Total')}}</th>
                                <th class="">{{__('Supprimer')}}</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <span>
                                <b>
                                    Client:
                                </b>
                            </span>
                            <span id="name_client" class="float-right">
                            </span>
                        </div>
                        <div class="col-6">
                            <span style="float: right !important;">
                                 <span>
                                    <b>
                                        Grand Total:
                                    </b>
                                </span>
                                <span id="totalsales" class="float-right">
                                  0
                                </span>
                            </span>

                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary mt-1 me-1 submit">Créer</button>
                        </div>
                    </div>
                    {{-- <div class="card-body invoice-padding pb-0">
                         <div class="row invoice-sales-total-wrapper">
                             <div class="col-md-6 order-md-1 order-2 mt-md-0 mt-3">
                                 <p class="card-text mb-0">
                                     <span class="font-weight-bold">Client :</span> <span id="name_client" class="ml-75"></span>
                                 </p>
                             </div>
                             <div class="col-md-6 d-flex justify-content-end order-md-2 order-1">
                                 <div class="invoice-total-wrapper">
                                     <div class="invoice-total-item">
                                         <p class="invoice-total-title">Grand Total:</p>
                                         <p id="totalsales" class="invoice-total-amount">$1690</p>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>--}}
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
    <script type="text/javascript">
        function totalProduct() {
            var Total = 0;
            var oneSelectedColumn = table.column(4).data();
            for (var i = 0; i < oneSelectedColumn.length; i++) {
                Total = Total + parseInt(oneSelectedColumn[i]);
            }

            $('#totalsales').text(Total);
        }
    </script>
    <script>
        function incremet_decrement(prixVente) {
            var total = 0;
            table = $('#tableSalesproduct').DataTable();

            $('.increment-btn').each(function (i, obj) {
                $(this).unbind('click');
                $(this).click(function () {
                    console.log(prixVente);
                    var price = $(this).parent().parent().parent().parent().parent().find('.cell-datatable').val();
                    prixVente = price;
                    var inc_value = $(this).parent().find('.qty-input').val();
                    var value = parseInt(inc_value, 10);
                    value = isNaN(value) ? 0 : value;
                    value++;
                    $(this).parent().find('.qty-input').val(value);
                    total = prixVente * value;
                    var row = table.row($(this).parents('tr'));
                    table.cell(row, 4).data(total).draw();
                    totalProduct();
                });

            });


            $('.decrement-btn').each(function (i, obj) {
                $(this).unbind('click');
                $(this).click(function () {
                    var price = $(this).parent().parent().parent().parent().parent().find('.cell-datatable').val();
                    prixVente = price;
                    var dec_value = $(this).closest('.product_data').find('.qty-input').val();
                    var value = parseInt(dec_value, 10);
                    value = isNaN(value) ? 0 : value;
                    if (value > 1) {
                        value--;
                        $(this).closest('.product_data').find('.qty-input').val(value);
                    }
                    total = prixVente * value;
                    var row = table.row($(this).parents('tr'));
                    t.cell(row, 4).data(total).draw();
                    totalProduct();
                });
            });

            $('.cell-datatable').each(function (i, obj) {
                $('.cell-datatable').bind("enterKey", function (e) {
                    prixVente = $(this).val();
                    var dec_value = $(this).parent().parent().parent().parent().parent().find('.qty-input').val();
                    var value = parseInt(dec_value, 10);
                    total = prixVente * value;
                    var row = table.row($(this).parents('tr'));
                    t.cell(row, 4).data(total).draw();
                });
                $('.cell-datatable').keyup(function (e) {
                    if (e.keyCode == 13) {
                        $(this).trigger("enterKey");
                        totalProduct();
                    }
                });
            });
        }
    </script>
    <script type="text/javascript">
        function deleteProduct(ArrayProducts) {
            table = $('#tableSalesproduct').DataTable();
            $('.removeProductSales').each(function (i, obj) {
                $(this).unbind('click');
                $(this).click(function () {
                    var idProductRemove = $(this).parent().parent().find(".prixVente").find('.cell-datatable').attr('id');
                    if (jQuery.inArray(idProductRemove, ArrayProducts)) {
                        ArrayProducts.splice(ArrayProducts.indexOf(parseInt(idProductRemove)), 1);
                        table.row($(this).parents('tr')).remove().draw();
                    }
                })
            })
        }
    </script>
    <script>
        $('.submit').unbind('click');
        $('.submit').click(function () {
            var arrInfoProducts=[];
            $(".prixVente").find("input").each(function() {
                var idprosduits = $(this).attr("id");
                var newPrixProduct =  $(this).val();
                var quantity = $(this).parent().parent().find('.qty-input').val();
                var dataProduct = {id: idprosduits , prix:newPrixProduct , quantity:quantity};
                arrInfoProducts.push(dataProduct);
            });
            $.ajax({
                type: "POST",
                url: "{{ route('sales.store') }}",
                data: {
                    '_token': "{{csrf_token()}}",
                    'productsArray': arrInfoProducts,
                    'serie_bone': $('#serie_bone').val(),
                    'prix_total': $('#totalsales').text(),
                    'client_id': $('#client_data').val(),
                    'stock_id': $('#stock_id').val()
                },
                success: function (result) {
                    console.log(result); //please post output of this
                }
            });
        });
    </script>
    <script>
        var AllproductSelect = [];

        function stockProductSelected(idProduct) {
            var table = $('#tablePurchaseproduct').DataTable();
            if (jQuery.inArray(idProduct.id, AllproductSelect) === -1) {
                AllproductSelect.push(idProduct.id);
                // console.log(resultProduct);
                table.row.add($('<tr id="' + idProduct.id + '"><td>' + [idProduct.label] + '</td><td>' + [idProduct.designation] + '</td><td class="prixAchaat"><input class="form-control cell-datatable" id="' + idProduct.id + '" type="text"  value = ' + idProduct.prix_achat + ' ></td><td><div class="d-flex flex-row justify-content-between align-items-center rounded"><div class="d-flex flex-row align-self-center product_data"  id="qty_select"><input type="hidden" value=" 1 " class="prod_id"><div class="input-group text-center" id="qty_selector"><a class="decrement-btn"><i class="fa fa-minus" style="padding-left:9px"></i></a><input type="text" readonly="readonly" id="qty_display" class="qty-input text-center" value="1"/><a class="increment-btn"><i class="fa fa-plus" ></i></a></div></div></div></td>'
                    + '<td>' + [idProduct.prix_achat] + '</td><td><button type="button" class="btn btn-gradient-danger removeProductPurchase">Remove</button></td></tr>')).draw(false);
            }
            deleteProduct(AllproductSelect);
        }
    </script>
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
                    $.map(JSON.parse(data), function (a) {
                        $('#name_client').text(a.name);
                    });
                });

            });

        });
    </script>
    <script type="text/javascript">
        var path = "{{ route('autocomplete') }}";
        var responseProduct;
        var t = $('#tableSalesproduct').DataTable();
        var arrayProducts = [];
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
                var resultProduct = ui.item;
                if (jQuery.inArray(resultProduct.id, arrayProducts) === -1) {
                    arrayProducts.push(resultProduct.id);
                    t.row.add($('<tr><td>' + [resultProduct.label] + '</td><td>' + [resultProduct.designation] + '</td><td class="prixVente"><input class="form-control cell-datatable" id="' + resultProduct.id + '" type="number"  value = ' + resultProduct.prix_vente + ' ></td><td><div class="d-flex flex-row justify-content-between align-items-center rounded"><div class="d-flex flex-row align-self-center product_data"  id="qty_select"><input type="hidden" value=" 1 " class="prod_id"><div class="input-group text-center" id="qty_selector"><a class="decrement-btn"><i class="fa fa-minus" style="padding-left:9px"></i></a><input type="text" readonly="readonly" id="qty_display" class="qty-input text-center" value="1"/><a class="increment-btn"><i class="fa fa-plus" ></i></a></div></div></div></td>'
                        + '<td>' + [resultProduct.prix_vente] + '</td><td><button type="button" class="btn btn-gradient-danger removeProductSales">Supprimer</button></td></tr>')).draw(false);
                }
                stockProductSelected(resultProduct);
                incremet_decrement(resultProduct.prix_vente);
                deleteProduct(arrayProducts);
                totalProduct();
                return false;
            }
        });
    </script>

@endsection
