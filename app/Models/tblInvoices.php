<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblInvoices extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'amount', 'discount','final_amount',
        'branch_id', 'cust_id', 'offer_id'
    ];
}
