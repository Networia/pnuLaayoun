<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoneSales extends Model
{
    use HasFactory;
    protected $fillable = [
        'serie_bone',
        'prix_total',
        'statut',
        'client_id',
        'stock_id',
    ];

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }
}
