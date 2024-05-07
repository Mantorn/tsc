<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = ["item_id", "name", "producer", "unit", "weight", "radius", "length", "width", "depth", "size", "type", "quantity", "quantity_unit"];
}
