<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;



class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory ;
    use SoftDeletes;
    use Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }


     public function setImageAttribute($file)
    {
        if (!$file) return;

        if ($this->attributes['image'] ?? false) {
            Storage::disk('public')->delete($this->attributes['image']);
        }

        $path = $file->store('posts', 'public');
        $this->attributes['image'] = $path;
    }

}
