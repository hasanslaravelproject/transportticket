<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassInCompartment extends Model
{
    use HasFactory;
    protected $table = 're_class_in_compartment';
    public $timestamps = false;
}
