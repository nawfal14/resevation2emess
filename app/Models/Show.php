<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'slug',
        'title',
        'poster_url',
        'duration',
        'description',
        'date',
        'location_id'
    ];

    public function types()
    {
        return $this->belongsToMany(Type::class, 'artiste_type_show');
    }

    public function artists()
    {
        return $this->belongsToMany(Artist::class, 'artiste_show');
    }

    public function representations()
    {
        return $this->hasMany(Representation::class);
    }

    public function showPrices()
    {
        return $this->hasMany(Price::class);
    }
}
