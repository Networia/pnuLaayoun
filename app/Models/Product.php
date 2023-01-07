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
        'categorie_id',
        'stock_id',
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    // public function stock()
    // {
    //     return $this->belongsTo(Stock::class);
    // }

    public function stock()
    {
        return $this->belongsToMany(Stock::class, 'product_stock')->withPivot('prix_achat', 'prix_vente');
    }
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];
}
