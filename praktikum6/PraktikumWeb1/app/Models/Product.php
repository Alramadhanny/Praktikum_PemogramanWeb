<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\ModeL;

class Product extends ModeL
{
use HasFactory;

protected $fillable = [
'name',
'price',
'description'
];
}