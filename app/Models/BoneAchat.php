<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoneAchat extends Model
{
    use HasFactory;
    protected $fillable = [
        'serie_bone',
        'prix_total',
        'statut',
        'supplier_id',
        'stock_id',
    ];

    public function suplier(){
        return $this->belongsTo(Supplier::class);
    }

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }
}
