<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcel_details extends Model
{
    use HasFactory;
    public $table = 'parcel_details';
    public $timestamps = false;
    protected $keyType = 'string';
    protected $primaryKey = 'p_id';
}