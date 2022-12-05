<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory, softDeletes;

    protected $table = 'contacts';

    protected $fillable = ['name', 'email', 'content'];
}
