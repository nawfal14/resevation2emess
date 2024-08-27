<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname'
    ];

    public function types()
    {
        return $this->belongsToMany(Type::class, 'artiste_type');
    }

    public function shows()
    {
        return $this->belongsToMany(Show::class, 'artiste_show');
    }
}
