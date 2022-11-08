<div class="card">
  <div class="card-header">
      <div class="btn-group">
          <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle budget-dropdown"
              data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{ request()->chart_vente_produits_year ?? Carbon\Carbon::now()->year }}
          </button>
          <div class="dropdown-menu">
              @foreach ($years as $year)
                  <a class="dropdown-item"
                      href="{{ route('statistic', ['chart_vente_produits_year' => $year->year]) }}">{{ $year->year }}</a>
              @endforeach
          </div>
      </div>
      <div class="card-body">
          <div id="chart_vente_produits"
              data-url="{{ route('client.statistic.chart.vente.produits', ['chart_vente_produits_year' => request()->chart_vente_produits_year, 'client_id' => request()->id]) }}"></div>
      </div>
  </div>
</div>
