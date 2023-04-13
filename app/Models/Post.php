<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'posts';
    // Правило для изменения данных в таблице (избежание ошибки filable)
    protected $guarded = false;

    protected $withCount = ['likedUsers'];
    protected $with = ['category'];

    /**
     * The tags that belong to the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id')->withTimestamps();
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function likedUsers()
    {
        return $this->belongsToMany(User::class, 'post_user_likes', 'post_id', 'user_id');
    }

    public function getLikes()
    {
        return $this->belongsTo(PostUserLike::class, 'id', 'post_id');
    }

    public function hasLikes($post)
    {
        return auth()->user()->likedPosts->contains($post->id);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }
}
