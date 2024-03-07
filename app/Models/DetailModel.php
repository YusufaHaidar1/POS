<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;

    protected $table = 't_penjualan_detail';
    protected $primaryKey = 'detail_id';
    public $timestamps = false;

}