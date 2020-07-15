<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_id', 'matter', 'issuer_id', 'currency', 'invoice_no', 'issuing_date', 'description', 'price'
    ];

    public function clients()
    {
        return $this->belongsToMany(User::class, "clients_id");
    }

    public function issuers()
    {
        return $this->belongsToMany(User::class, "issuers_id");
    }
}
