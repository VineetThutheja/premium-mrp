<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Resources\OrderResource;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders = OrderResource::collection(Order::where("orderType",$request["type"])->get());
        return ["data"=>$orders];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $orderData = $request->all();
            $orderCount = Order::where("orderDate",$orderData["orderDate"])->where("orderType",$orderData["orderType"])->get()->count();
            if($orderData["orderType"]=="PURCHASE"){
                $orderData["referenceNo"] = "PO-".str_replace("-","",$orderData["orderDate"])."-".sprintf("%'.03d", $orderCount+1);
            }elseif($orderData["orderType"]=="SALE"){
                $orderData["referenceNo"] = "SO-".str_replace("-","",$orderData["orderDate"])."-".sprintf("%'.03d", $orderCount+1);

            }
            $order = new Order;
            $order = $order::create($orderData);
            $order->orderDetails()->createMany($request->get('orderedProducts'));
            return response()->json(["success"=>true,"message"=>"Order created suucessfully"]);

        } catch (\Throwable $th) {
            throw $th;
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        try {
            $order = Order::findOrFail($order->id);
            $order->update($request->all());
            $orderDetails = $this->crudPartition($order->orderDetails,$request->orderedProducts);
            $order->orderDetails()->createMany($orderDetails["create"]);
            $order->orderDetails()->whereIn('id', $orderDetails["delete"]->pluck("id"))->delete();
            foreach($orderDetails["update"] as $orderDetail){
                $order->orderDetails()->where('id', $orderDetail["id"])->update($orderDetail);
                
            }

            return response()->json(["success"=>true,"message"=>"Order created suucessfully"]);

        } catch (\Throwable $th) {
            throw $th;
        }
        
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    function crudPartition($oldData, $newData)
{
    
    $oldIds = json_decode(json_encode(collect($oldData)->pluck("id"),true));
    $newIds =json_decode(json_encode(collect($newData)->pluck("id"),true));
   
    // groups
    $delete = collect($oldData)
        ->filter(function ($model) use ($newIds) {
            return !in_array($model["id"], $newIds);
        });

    $update = collect($newData)
        ->filter(function ($model) use ($oldIds) {
            return array_key_exists("id",$model) && in_array($model["id"], $oldIds);
        });
 
    $create = collect($newData)
        ->filter(function ($model) use ($oldIds) {
            return !(array_key_exists("id",$model) && in_array($model["id"], $oldIds));
        });

    
    return compact('delete', 'update', 'create');
}

}
