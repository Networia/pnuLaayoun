<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStock extends Model
{
    use HasFactory;
    protected $fillable = [
        'prix_achat',
        'prix_vente',
        'quantite_dispo',
        'product_id',
        'stock_id'
    ];

}
