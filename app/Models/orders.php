<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;
    protected $table = "orders";

    protected $fillables = [    
        'Pdt_title',
        'Pdt_img',
        'Pdt_price',
        'qty',
        'Pdt_Catagory',
        'Cus_id',
    ];
}
