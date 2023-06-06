<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Sales extends Model
{
    protected $collection = 'sales';
    protected $fillable = [
        'vehicle_id', 'sale_date'
    ];

    public $timestamps = true;

    public function vehicle() {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }
}
