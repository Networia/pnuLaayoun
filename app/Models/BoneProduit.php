<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoneProduit extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'prix_achat',
        //Total
        'prouduit_id',
        'boneAchat_id',
    ];

    public function produit(){
        return $this->belongsTo(Product::class);
    }

    public function boneAchat()
    {
        return $this->belongsTo(BoneAchat::class);
    }
}
