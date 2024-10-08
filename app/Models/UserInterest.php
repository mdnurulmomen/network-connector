<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInterest extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $timestamps = false;

    public function interest() {
        return $this->belongsTo(Interest::class, 'interest_id', 'id');
    }
}
