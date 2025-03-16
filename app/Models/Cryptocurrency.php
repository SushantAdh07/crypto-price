<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cryptocurrency extends Model
{
    protected $fillable = ['name', 'symbol', 'price_usd', 'last_updated'];
}
