<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'tb_order';

    protected $fillable = [
        'user_id',
        'transaction_id',
        'sub_price',
        'admin_price',
        'total_price',
        'status',
    ];
}
