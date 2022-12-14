<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $table = 'abouts';

    protected $fillable = ['content', 'upload_image'];

    public function getImageExistAttribute()
    {
        return !is_null($this->upload_image) && file_exists(storage_path('app/public/images/abouts/'.$this->upload_image));
    }
}
