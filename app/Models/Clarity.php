<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clarity extends Model
{
    use HasFactory;
    //protected $table = 'clarities';
    protected $fillable = [
        'name',
        'status',
    ];
}
