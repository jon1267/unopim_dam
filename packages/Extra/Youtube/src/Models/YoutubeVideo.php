<?php

namespace Extra\Youtube\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YoutubeVideo extends Model
{
    use HasFactory;

    protected $table = 'youtube_videos';
    protected $fillable = ['title', 'youtube_url'];
}
