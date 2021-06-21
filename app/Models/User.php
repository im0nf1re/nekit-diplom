<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Monument;
use App\Models\User;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public function role()
    {
        $this->belongsTo('App\Models\Role');
    }

    public function want_to_visit_monuments()
    {
        return $this->belongsToMany(Monument::class, 'want_to_visits', 'user_id', 'monument_id');
    }

    public function visited_monuments()
    {
        return $this->belongsToMany(Monument::class, 'visited_monuments', 'user_id', 'monument_id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
}
