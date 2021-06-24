<?php

namespace App\Models;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Mockery\Matcher\Not;
use App\Models\Note;
use App\Models\Book;
use App\Models\Task;
use App\Models\Setting;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName',
        'lastName',
        'username',
        'email',
        'password',
        'birthDate'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function notes(){
        return $this->hasMany(Note::class);
    }

    
    public function books(){
        return $this->hasMany(Book::class);
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }
    public function setting()
    {
        return $this->hasOne(Setting::class);
    }
}
