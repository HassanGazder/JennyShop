<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = "Products";

    protected $fillables = [
        'Pdt_title',
        'Pdt_img',
        'Pdt_price',
        'qty',
        'Pdt_Catagory'
    ];

}
