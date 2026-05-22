<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['nama_device', 'serial_number', 'topic'];
}
