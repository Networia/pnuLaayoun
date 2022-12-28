@extends('layouts/contentLayoutMaster')

@section('title', 'Liste des Products')

@section('vendor-style')

  {{-- vendor css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/wizard/bs-stepper.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/spinner/jquery.bootstrap-touchspin.css')) }}">

<!-- FONT AWESOME CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        <form class="auth-register-form mt-2" method="POST" action="{{ route('Purchase.store') }}">
          @csrf

            <div class="col-12">
              <div class="card">
                <div class="row">
                  <div class="form-group col-md-4">
                    <label class="form-label" for="modern-username" >serie de bone</label>
                    <input type="text" id="serie_bone" name="serie_bone" class="form-control" placeholder="johndoe" />
                  </div>
                  <x-forms.select2 label="Supplier" name="supplier" htmlname="supplier" dataobject="supplier" dataname="name" datavalue="id" cols="col-xl-4 col-md-6 mb-1" />
                  <x-forms.select2 label="Stock" name="stock" htmlname="stock" dataobject="stock" dataname="name" datavalue="id" cols="col-xl-4 col-md-6 mb-1" />
                  <div class="form-group col-md-12">
                    <label class="form-label" for="modern-username">Product</label>
                    <input type="text" id="product" class="form-control" placeholder="johndoe" />
                  </div>
                </div>
              </div>
            </div>
          <div class="col-12">
            <div class="card">
              <div class="card-datatable" id="tablePurchase">
                <table class="datatables-table table" id="tablePurchaseproduct">
                  <thead>
                    <tr>
                      <th class="">{{__('reference de peneu')}}</th>
                      <th class="">{{__('designation de peneu')}}</th>
                      <th class="">{{__('Prix d\'achat')}}</th>
                      <th class="">{{__('Quantite')}}</th>
                      <th class="">{{__('SubTotal')}}</th>
                      <th class="">{{__('Delete')}}</th>
                    </tr>
                  </thead>
                </table>
                
              </div>
              
              <div class="card-body invoice-padding pb-0">
                <div class="row invoice-sales-total-wrapper">
                    <div class="col-md-6 order-md-1 order-2 mt-md-0 mt-3">
                        <p class="card-text mb-0">
                            <span class="font-weight-bold">Salesperson:</span> <span class="ml-75">Alfie Solomons</span>
                        </p>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end order-md-2 order-1">
                        <div class="invoice-total-wrapper">
                            <div class="invoice-total-item">
                                <p class="invoice-total-title">Total:</p>
                                <p id="totalpurchase" class="invoice-total-amount">0</p>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
      </form>
      </div>
</section>
@endsection


@section('vendor-script')
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    

    <script type="text/javascript">
      function totalProduct(){
        var Total = 0;
        var oneSelectedColumn = table.column(4).data();
        for (var i = 0; i < oneSelectedColumn.length; i++) {
          Total = Total + parseInt(oneSelectedColumn[i]);
        }

        $('#totalpurchase').text(Total);
        console.log(Total);
      }
    </script>

    <script>
        function incremet_decrement(prixAchat) {
              var total = 0;
              table = $('#tablePurchaseproduct').DataTable();
              $('.increment-btn').each(function(i, obj) {
                $(this).unbind('click');
                $(this).click(function () {
                    var price = $(this).parent().parent().parent().parent().parent().find('.cell-datatable').val();
                    prixAchat = price;
                    var inc_value = $(this).parent().find('.qty-input').val();
                    var value = parseInt(inc_value, 10);
                    value = isNaN(value) ? 0 : value;
                    value++;
                    $(this).parent().find('.qty-input').val(value);
                    total = prixAchat * value;
                    var row =  table.row( $(this).parents('tr'));
                    t.cell(row, 4).data(total).draw();
                    totalProduct();
                  });

              });
              $('.decrement-btn').each(function(i, obj) {
                $(this).unbind('click');
                $(this).click(function () {
                      var price = $(this).parent().parent().parent().parent().parent().find('.cell-datatable').val();
                      prixAchat = price;
                      var dec_value = $(this).closest('.product_data').find('.qty-input').val();
                      var value = parseInt(dec_value, 10);
                      value = isNaN(value) ? 0 : value;
                      if (value > 1) {
                          value--;
                          $(this).closest('.product_data').find('.qty-input').val(value);
                      }
                      total = prixAchat * value;
                      var row =  table.row( $(this).parents('tr'));
                      t.cell(row, 4).data(total).draw();
                      totalProduct();
                });

              $('.cell-datatable').each(function (i, obj) {
                $('.cell-datatable').bind("enterKey",function(e){
                    prixVente = $(this).val();
                    var dec_value = $(this).parent().parent().parent().parent().parent().find('.qty-input').val();
                    var value = parseInt(dec_value, 10);
                    total = prixVente * value;
                    var row =  table.row( $(this).parents('tr'));
                    t.cell(row, 4).data(total).draw();
                    
                });
                $('.cell-datatable').keyup(function(e){
                    if(e.keyCode == 13)
                    {
                        $(this).trigger("enterKey");
                        totalProduct();
                    }
                });
              });
              });

        }
    </script>

    <script type="text/javascript">
      function deleteProduct(allproduitts){
        table = $('#tablePurchaseproduct').DataTable();
        $('.removeProductPurchase').each(function(i, obj){
          $(this).unbind('click');
          $(this).click(function(){
              console.log("dlll" + allproduitts);
              var idProductRemove = $(this).parent().parent().find(".prixAchaat").find('.cell-datatable').attr('id');
              console.log("selelelele "+idProductRemove);
              if(jQuery.inArray(idProductRemove, allproduitts)){
                allproduitts.splice(allproduitts.indexOf(parseInt(idProductRemove)), 1);
                table.row( $(this).parents('tr')).remove().draw();
                totalProduct();
              }else{
                console.log("elsss");
              }
              console.log(allproduitts);

          })
        })
      }
    </script>

    <script type="text/javascript">
        var path = "{{ route('Product.autocomplete') }}";
        var responseProduct;
        var t = $('#tablePurchaseproduct').DataTable();
        var AllproductSelect = [];
        $( "#product" ).autocomplete({
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
                var trHTML = '';
                $('#product').val(ui.item.label);
                var resultProduct = ui.item;
                if(jQuery.inArray(resultProduct.id, AllproductSelect) === -1){
                  AllproductSelect.push(resultProduct.id);
                  console.log(resultProduct);
                  console.log(AllproductSelect);
                  t.row.add($('<tr id="'+resultProduct.id +'"><td>'+[resultProduct.label]+'</td><td>'+[resultProduct.designation]+'</td><td class="prixAchaat"><input class="form-control cell-datatable" id="' + resultProduct.id + '" type="text"  value = ' + resultProduct.prix_achat + ' ></td><td><div class="d-flex flex-row justify-content-between align-items-center rounded"><div class="d-flex flex-row align-self-center product_data"  id="qty_select"><input type="hidden" value=" 1 " class="prod_id"><div class="input-group text-center" id="qty_selector"><a class="decrement-btn"><i class="fa fa-minus" style="padding-left:9px"></i></a><input type="text" readonly="readonly" id="qty_display" class="qty-input text-center" value="1"/><a class="increment-btn"><i class="fa fa-plus" ></i></a></div></div></div></td>'
                  +'<td>'+[resultProduct.prix_achat]+'</td><td><button type="button" class="btn btn-gradient-danger removeProductPurchase">Remove</button></td></tr>')).draw(false);
                }
                incremet_decrement(resultProduct.prix_achat);
                deleteProduct(AllproductSelect);
                totalProduct();
                return false;
            }
        });
    </script>

    




@endsection
