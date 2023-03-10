<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Selling extends Model
{
    protected $guarded = [];
    public function book()
    {
        return $this->belongsTo('\App\Models\Book');
    }
}
