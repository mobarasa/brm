<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    use HasFactory, softDeletes;

    protected $table = 'subscribes';

    protected $fillable = ['email'];
}
