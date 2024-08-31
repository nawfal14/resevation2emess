<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Representation extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $fillable = [
        'show_id',
        'schedule',
        'location_id'
    ];

    public function show()
    {
        return $this->belongsTo(Show::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
