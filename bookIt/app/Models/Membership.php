<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;
    protected $fillable = [
        'end_date','account_type', 'user_id'
         
    ];
    protected $dates = ['end_date'];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
