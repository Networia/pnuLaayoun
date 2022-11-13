{{-- pnu table --}}
<div class="card-datatable">
    <table class="datatables-table table" data-edit="{{ route('Product.edit' ,"") }}" data-api="{{ route('Product.api') }}">
      <thead>
        <tr>
          <th class=""></th>
          <th class="">{{__('id')}}</th>
          <th class="">{{__('Serie de peneu')}}</th>
          <th class="">{{__('Marque de peneu')}}</th>
          {{-- <th class="">{{__('Reference de filter')}}</th>
          <th class="">{{__('Marque de filter')}}</th>
          <th class="">{{__('Numero de viltage')}}</th>
          <th class="">{{__('Série de chmabrier')}}</th>
          <th class="">{{__('Marque de chmabrier')}}</th> --}}
          <th class="">{{__('Prix d\'achat')}}</th>
          <th class="">{{__('Prix de vente')}}</th>
          <th class="">{{__('Quentite')}}</th>
       {{--   <th class="">{{__('Ctégorie')}}</th>
          <th class="">{{__('Stock')}}</th>
          <th class="">{{__('Bonne')}}</th>--}}
          <th class="">{{__('Date')}}</th>
          <th></th>
        </tr>
      </thead>
    </table>
  </div>