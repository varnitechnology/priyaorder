<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Order;
use Validator;
use App\Http\Resources\OrderResource;

class OrderController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::all();
    
        return $this->sendResponse(OrderResource::collection($order), 'Order retrieved successfully.');
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
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'name' => 'required',
            'email' => 'required',
            'contact_no' => 'required',
            'contact_person_name' => 'required',
            'notes' => 'required',
            'address' => 'required',
            'shipping_id' => 'required',
            'status' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $order = Order::create($input);
   
        return $this->sendResponse(new OrderResource($order), 'Order created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
  
        if (is_null($order)) {
            return $this->sendError('order not found.');
        }
   
        return $this->sendResponse(new OrderResource($order), 'order retrieved successfully.');
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
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'date' => 'required',
            'agent_id' => 'required',
            'method_of_contact' => 'required',
            'company_id' => 'required',
            'person_name' => 'required',
            'created_by' => 'required',
            'status' => 'required'
        ]);
    
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $order->date = $input['date'];
        $order->agent_id = $input['agent_id'];
        $order->method_of_contact = $input['method_of_contact'];
        $order->company_id = $input['company_id'];
        $order->person_name = $input['person_name'];
        $order->company_notes = $input['company_notes'];
        $order->method_of_dispatch = $input['method_of_dispatch'];
        $order->address = $input['address'];
        $order->method_of_shipment = $input['method_of_shipment'];
        $order->memo_no = $input['memo_no'];
        $order->shipment_detail = $input['shipment_detail'];
        $order->document = $input['document'];
        $order->shipment_date = $input['shipment_date'];
        $order->delivery_date = $input['delivery_date'];
        $order->type = $input['type'];
        $order->status = $input['status'];
        $order->save();
   
        return $this->sendResponse(new OrderResource($order), 'Order updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
   
        return $this->sendResponse([], 'order deleted successfully.');
    }
}
