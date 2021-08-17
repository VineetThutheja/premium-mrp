<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\OrderDetailResource;
class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $order = parent::toArray($request);
        $order["businessName"] = $this->contact->buisnessName;
        $order["orderedProducts"] = OrderDetailResource::collection($this->orderDetails);
        return $order;
    }
}
