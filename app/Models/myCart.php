<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class myCart extends Model
{
    use HasFactory;

    protected $fillable = [
        'productID',
        'dateAdd',
        'userID',
        'orderID',
        'quantity',
    ];
}
