<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bone extends Model
{
    use HasFactory;
    protected $fillable = [
        'serie_bone',
        'prix_total',
        'statut',
        'bone_supplier_id',
        'bone_cheque_id',
        'bone_stock_id',
    ];
    public function products(){
        return $this->hasMany(Product::class);
    }

    public function suplier(){
        return $this->belongsTo(Supplier::class);
    }
    public function cheque(){
        return $this->belongsTo(Check::class);
    }

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }
}
