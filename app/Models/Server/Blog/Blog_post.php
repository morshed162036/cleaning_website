<?php

namespace App\Models\Server\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Server\Blog\Blog_category;
class Blog_post extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(Blog_category::class,'category_id');
    }
}
