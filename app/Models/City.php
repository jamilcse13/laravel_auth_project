<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class City extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'cities';
}
