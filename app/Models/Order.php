<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = [
        'date',
        'agent_id',
        'method_of_contact',
        'company_id',
        'person_name',
        'company_notes',
        'method_of_dispatch',
        'address',
        'method_of_shipment',
        'memo_no',
        'shipment_detail',
        'document',
        'shipment_date',
        'delivery_date',
        'type',
        'created_by',
        'status',
    ];
}
