<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index()
    {
        $years = $this->years();

        return view('content.statistic', [
            'years' => $years
        ]);
    }

    public function years()
    {
        $years = SellService::selectRaw('year(created_at) as year')
            ->groupBy('year')
            ->orderByRaw('min(year) desc')
            ->get();

        return $years;
    }
}
