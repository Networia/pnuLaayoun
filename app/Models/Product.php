<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'serie_peneu',
        // 'marque_peneu',
        // 'reference_filter',
        // 'marque_filter',
        // 'marque_baterie',
        // 'num_voltage',
        // 'serie_chambrere',
        // 'marque_chambrere',
        // 'serie_huile',
        // 'marque_huile',
        // 'lettrage_huile',
        'reference',
        'designation',
        'prix_achat',
        'prix_vente',
        'quantite_dispo',
        'product_categorie_id',
        'product_bone_id',
        'product_stock_id',
    ];
    public function categories()
    {
        return $this->belongsTo(Categorie::class);
    }
    public function bones()
    {
        return $this->belongsTo(Bone::class);
    }
    public function stocks()
    {
        return $this->belongsTo(Stock::class);
    }
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];
}
