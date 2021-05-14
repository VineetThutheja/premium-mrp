<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $hidden = ['created_at',"updated_at"];
    protected $fillable = ['productName',"sku","price","openingStock","categoryId","brandId","taxId","productTypeId","primaryUnitId","secondaryUnit","secondaryUnitId","description"];

    public function category()
    {
        return $this->belongsTo(Category::class,"categoryId","id");
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class,"brandId","id");
    }
    public function tax()
    {
        return $this->belongsTo(Tax::class,"taxId","id");
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
