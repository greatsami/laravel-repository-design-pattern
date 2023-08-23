<?php

namespace App\Models;

use App\Enum\BlogPostSourceEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'source' => BlogPostSourceEnum::class,
        'published_at' => 'datetime',
    ];
}
