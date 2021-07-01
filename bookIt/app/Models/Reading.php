<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reading extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'reading';

    protected $fillable = [
        'user_id', 'book_id', 'created_at', 'reading_time'
    ];
}
