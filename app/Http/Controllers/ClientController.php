<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Models\Client;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ClientController extends Controller
{
    public function index()
    {
        return view('content.Client.table');
    }

    public function api()
    {
        $model = Client::query();
        return \DataTables::eloquent($model)
            ->toJson();
    }

    public function list_select(Request $data)
    {
        $item = Client::where('name', 'like', '%' . $data->q . '%')->get();
        $itemCount = $item->count();
        //? create if not find
        //if ($itemCount == 0) {
        //    $item [] = ['id' =>  $data->q,'name' => $data->q];
        //    $itemCount = 1;
        //}

        return ['total_count' => $itemCount, 'item' => $item];
    }

    public function create()
    {
        return view('content.Client.add');
    }

    public function store(ClientRequest $request)
    {
        $stock_id = $request->stock;
        $stock = Stock::find($stock_id);
        if (!$stock) {
            $newStock = Stock::create([
                'name' => $request->stock,
            ]);
            $stock_id = $newStock->id;
        }
        Client::create([
            'name' => $request->name,
            'number_phone' => $request->number_phone,
            'adress' => $request->adress,
            'client_stock_id' => $stock_id,
        ]);

        session()->flash('toastr', ['type' => 'success', 'title' => __('toastr.title.success'), 'contant' => __('toastr.contant.success')]);
        return redirect(route('client'));
    }

    public function edit($id)
    {
        $last = Client::findOrFail($id);
        $stock = Stock::findOrFail($last->client_stock_id);
        return view('content.Client.edit', ['last' => $last, 'stock' => $stock]);
    }

    public function update(ClientRequest $request)
    {
        $client = Client::findOrFail($request->id);
        $stock_id = $request->stock;
        if (!is_int($stock_id)){
            $stock_id = $client->client_stock_id;
        }
        $stock = Stock::find($stock_id);
        if (!$stock) {
            $newStock = Stock::create([
                'name' => $request->stock,
            ]);
            $stock_id = $newStock->id;
        }

       /* $client->update([
            'name' => $request->name,
            'number_phone' => $request->number_phone,
            'adress' => $request->adress,
            'client_stock_id' => $stock_id
        ]);*/
        $client->name = $request->name;
        $client->number_phone = $request->number_phone;
        $client->adress = $request->adress;
        $client->client_stock_id = $stock_id;
        $client->save();

        session()->flash('toastr', ['type' => 'success', 'title' => __('toastr.title.success'), 'contant' => __('toastr.contant.success')]);
        return redirect(route('client'));
    }

    public function showProfile($id)
    {
        $data = $this->getCardData($id);
        return view('content.Client.profile', $data);
    }

    public function getCardData($id)
    {
        $client = Client::findOrFail($id);
        $total_upaid_invoice_credit = 4;//Pinvoice::where('client_id', $id)->sum('total_unpaid_credit');
        //service
        $moneys = 8;//Sale::where('client_id', $id)->with(['pinvoice'])->get();
        // return($moneys);
        $espace = 0;
        $credit = 0;
        $credit_facture = 0;
        // dd($service_especes);
        // foreach ($moneys as $money) {
        //     $espace += $money->payed_espece;

        //     if ($money->invoiced == 0) {
        //         $credit += $money->unpaid_credit;
        //     }
        //     // else if($money->invoiced == 1){
        //     //     $credit_facture += $money->pinvoice->total_unpaid_credit;
        //     // }
        // }
        // $smoneys = SellService::where('client_id', $id)->with(['seinvoice'])->get();
        // $total_upaid_invoice_service_credit = Seinvoice::where('client_id', $id)->sum('total_unpaid_credit');
        // // return($moneys);
        // $sespace = 0;
        // $scredit = 0;
        $scredit_facture = 0;
        // dd($service_especes);
        // foreach ($smoneys as $money) {
        //     $sespace += $money->cash;

        //     if ($money->status == 0) {
        //         $scredit += $money->credit;
        //     }
        // }

        return [
            'client' => $client,
            'Pespace' => $espace,
            'Pcredit' => $credit,
            'Pcreditfacture' => $total_upaid_invoice_credit,
            'Sespace' => 7,//$sespace,
            'Scredit' => 7,//$scredit,
            'Screditfacture' => 7,//$total_upaid_invoice_service_credit,
            //'years' => $this->years()
        ];
    }
}
