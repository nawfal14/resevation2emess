<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'shows';

    protected $fillable = [
        'slug',
        'title',
        'poster_url',
        'duration',
        'created_in',
        'location_id',
        'bookable',
        'description',
        'date',
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