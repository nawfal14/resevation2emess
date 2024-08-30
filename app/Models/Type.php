<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function artists()
    {
        return $this->belongsToMany(Artist::class, 'artiste_type');
    }

    public function shows()
    {
        return $this->belongsToMany(Show::class, 'artiste_type_show');
    }
}
