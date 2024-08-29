<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locality extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'localities';

    protected $fillable = ['postal_code', 'locality'];

}
