<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $fillable = ["productId","description","quantity","primaryUnitId","secondaryQuantity","secondaryUnitId","price","discount","taxId","subtotalBeforeTax","totalTax","lineTotal"];
}
