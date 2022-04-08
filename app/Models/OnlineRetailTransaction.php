<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlineRetailTransaction extends Model
{
    use HasFactory;

    protected $table = 'online_retail_transactions';
    protected $fillable = [
        'inv_code', 'stock_code', 
        'description', 'qty', 
        'inv_date', 'price',
        'customer_id', 'country'
    ];
}
