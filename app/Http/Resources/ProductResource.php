<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id"=>$this->id,
            "productName"=>$this->productName,
            "sku"=>$this->sku,
            "price"=>$this->price,
            "openingStock"=>$this->openingStock,
            "categoryId"=>$this->categoryId,
            "category"=>empty($this->categoryId)?"":$this->category->category,
            "taxId"=>$this->taxId,
            "tax"=>empty($this->taxId)?"":$this->tax->tax,
            "taxRate"=>empty($this->taxId)?"":$this->tax->tax_rate,
            "brandId"=>$this->brandId,
            "brand"=>empty($this->brandId)?"":$this->brand->brand,
            "productTypeId"=>$this->productTypeId,
            "productType"=>empty($this->productTypeId)?"":$this->productType->productType,
            "primaryUnitId"=>$this->primaryUnitId,
            "primaryUnit"=>empty($this->primaryUnitId)?"":$this->primaryUnit->unit,
            "secondaryUnitId"=>$this->secondaryUnitId,
            "secondaryUnitValue"=>empty($this->secondaryUnitId)?"":$this->secondaryUnitValue->unit,
            "description"=>$this->description
        ];
    }
}
