<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        'id' => $this->id,
        'date' => $this->date,
        'agent_id' => $this->agent_id,
        'method_of_contact' => $this->method_of_contact,
        'company_id' => $this->company_id,
        'person_name' => $this->person_name,
        'company_notes' => $this->company_notes,
        'method_of_dispatch' => $this->method_of_dispatch,
        'address' => $this->address,
        'method_of_shipment' => $this->method_of_shipment,
        'memo_no' => $this->memo_no,
        'shipment_detail' => $this->shipment_detail,
        'document' => $this->document,
        'shipment_date' => $this->shipment_date,
        'delivery_date' => $this->delivery_date,
        'type' => $this->type,
        'status' => $this->status,
        'created_by' => $this->created_by,
        'created_at' => $this->created_at->format('d/m/Y'),
        'updated_at' => $this->updated_at->format('d/m/Y'),
    }
}
