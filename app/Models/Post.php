<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'title',
        'content',
        'image',
        'category_id',
        'slug',
        'user_id',
        'published_at'
    ];

    public function user(){
        return $this->belongsTo(User::class);
;    }

    public function readTime(){
        $wordCount = str_word_count(strip_tags($this->content));
        $minutes = ceil($wordCount / 200);
        return max(1,$minutes);

    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function claps(){
        return $this->hasMany(Clap::class);
    }
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
}
