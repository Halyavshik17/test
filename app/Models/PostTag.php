<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    use HasFactory;

    protected $table = 'post_tags';
    // Правило для изменения данных в таблице (избежание ошибки fillable)
    protected $guarded = false;
}
