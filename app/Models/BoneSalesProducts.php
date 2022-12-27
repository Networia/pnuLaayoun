<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoneSalesProducts extends Model
{
    use HasFactory;
    protected $fillable = [
        'quantity',
        'prix_achat',
        'prouduit_id',
        'boneSales_id',
    ];

    public function produit(){
        return $this->belongsTo(Product::class);
    }

    public function boneSales()
    {
        return $this->belongsTo(BoneSales::class);
    }
}
