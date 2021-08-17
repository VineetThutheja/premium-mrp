<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $orderDetail = parent::toArray($request);
        $orderDetail["productName"] = $this->product->productName; 
        $orderDetail["tax"] = $this->tax->tax; 
        $orderDetail["taxRate"] = $this->tax->tax_rate; 
        $orderDetail["primaryUnit"] = empty($this->primaryUnitId)?"":$this->primaryUnit->unit;
        $orderDetail["secondaryUnitValue"]= empty($this->secondaryUnitId)?"":$this->secondaryUnitValue->unit;
        return $orderDetail;
    }
}
