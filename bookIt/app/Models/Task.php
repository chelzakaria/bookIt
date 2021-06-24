<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'start_date','end_date','book_id','task_name','task_description','status','task_importance','notification'
         
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
