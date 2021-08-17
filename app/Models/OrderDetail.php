<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $fillable = ["productId","description","quantity","primaryUnitId","secondaryQuantity","secondaryUnitId","price","discount","taxId","subtotalBeforeTax","totalTax","lineTotal"];

    public function product()
    {
        return $this->belongsTo(Product::class,"productId");
    }

    public function tax()
    {
        return $this->belongsTo(Tax::class,"taxId","id");
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class,"brandId","id");
    }
    public function primaryUnit()
    {
        return $this->belongsTo(Unit::class,"primaryUnitId","id");
    }

    public function secondaryUnitValue()
    {
        return $this->belongsTo(Unit::class,"secondaryUnitId","id");
    }

    public function productType()
    {
        return $this->belongsTo(Tax::class,"productTypeId","id");
    }
}
