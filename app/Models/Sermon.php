<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Sermon extends Model
{
    use HasFactory, softDeletes;

    protected $table = 'sermons';

    protected $dates = ['date_preached'];

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'preacher',
        'bible_passage',
        'location',
        'published',
        'upload_image',
        'date_preached',
        'media_link',
        'content',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
