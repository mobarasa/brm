<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'events';

    protected $dates = ['start_date', 'end_date'];

    protected $fillable = [
        'title',
        'slug',
        'location',
        'published',
        'upload_image',
        'start_date',
        'end_date',
        'media_link',
        'content',
        'category_id',
        'user_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getImageExistAttribute()
    {
        return !is_null($this->upload_image) && file_exists(storage_path('app/public/images/events/'.$this->upload_image));
    }
}
