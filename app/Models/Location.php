<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug', 'designation', 'address', 'locality_id'
    ];

    public function locality()
    {
        return $this->belongsTo(Locality::class);
    }

    public function representations()
    {
        return $this->hasMany(Representation::class);
    }
}