<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'locations';

    protected $fillable = [
        'slug', 'designation', 'address', 'locality_id', 'website', 'phone'
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