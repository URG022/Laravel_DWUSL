<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'productos';
    protected $primaryKey = 'codigo';
    protected $fillable = [
        'nombre',
        'precio',
        'marca'
    ];

    public $timestamps = true;
}
