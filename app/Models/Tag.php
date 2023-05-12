<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tags';
    // Правило для изменения данных в таблице (избежание ошибки fillable)
    protected $guarded = false;

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
