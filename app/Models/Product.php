<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'reference',
        'designation',
        'prix_achat',
        'prix_vente',
        'quantite_dispo',
        'categorie_id',
        'stock_id',
    ];

    public function categories()
    {
        return $this->belongsTo(Categorie::class);
    }

    // public function stock()
    // {
    //     return $this->belongsTo(Stock::class);
    // }

    public function stock()
    {
        return $this->belongsToMany(Stock::class, 'product_stock');
    }
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];
}
