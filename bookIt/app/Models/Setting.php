<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
     use HasFactory;
    protected $fillable = [
        'idea_color','thought_color','quote_color','uncategorized_color','low_color','medium_color', 'high_color', 'appearance', 'user_id'
         
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
