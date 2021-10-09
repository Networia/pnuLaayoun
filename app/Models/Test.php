<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $fillable = [
        'f1',
        'f2',
        'f3',
        'f4',
        'f5',
    ];

    public function fillables()
    {
        return $this->fillable;
    }
}
