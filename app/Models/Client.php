<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'number_phone',
        'adress',
        'client_stock_id'

    ];
    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }
}
