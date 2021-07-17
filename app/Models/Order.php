<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ["referenceNo","orderDate","quotationNo","supplierId","branchId","subtotal","totalTax","total","discountType","discount","discountAmount","purchaseTaxId","purchaseTax","shippingDetails","shippingCharges","purchaseTotal","additionalDetails"];


    public function orderDetails(Type $var = null)
    {
        return $this->hasMany(OrderDetail::class,"orderId");
    }

}
