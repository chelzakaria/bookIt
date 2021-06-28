<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'due_date','task_id','status','user_id', 'seen'
         
    ];
    protected $dates = [
        'created_at',
        'updated_at',
        'due_date'
    ];
    use HasFactory;
}
