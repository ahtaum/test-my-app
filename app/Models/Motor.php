<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Motor extends Model
{
    protected $collection = 'motors';
    protected $fillable = [
        'machine', 'suspension_type', 'transmision_type', 'vehicle_id'
    ];

    public $timestamps = true;

    public function vehicle() {
        return $this->belongsTo(Vehicle::class);
    }

    public function sales() {
        return $this->belongsTo(Sales::class, 'vehicle_id');
    }
}
