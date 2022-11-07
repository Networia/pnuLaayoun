<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    use HasFactory;
    protected $fillable = [
        'num_check',
        'montent_check',
        'status_sup',
        'status_bank',

    ];
    public function bone(){
        return $this->hasMany(Bone::class);
    }
}
