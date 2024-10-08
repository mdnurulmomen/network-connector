<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLocation extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $timestamps = false;

    public function location() {
        return $this->belongsTo(Location::class, 'location_id', 'id');
    }
}
