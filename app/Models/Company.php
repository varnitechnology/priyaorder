<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';
    protected $fillable = [
        'name',
        'email',
        'contact_no',
        'contact_person_name',
        'notes',
        'address',
        'shipping_id',
        'status',
    ];
}
