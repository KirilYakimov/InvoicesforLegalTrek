<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $fillable = [
        'currency', 
    ];

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
