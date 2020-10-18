<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblInvoicesOrderRelation extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id', 'orderList_id', 'invoice_id'
    ];
}
