<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Monument;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Monument extends Model
{
    use HasFactory;

    public function categories()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function detail_pictures()
    {
        return $this->hasMany('App\Models\DetailPicture');
    }

    public function want_to_visit_users()
    {
        return $this->belongsToMany(User::class, 'want_to_visits', 'monument_id', 'user_id');
    }

    public function visited_user()
    {
        return $this->belongsToMany(User::class, 'visited_monuments', 'monument_id', 'user_id');
    }

    public function is_visited()
    {
        return in_array(Auth::id(), $this->visited_user()->pluck('users.id')->toArray());
    }

    public function is_want_to_visit()
    {
        return in_array(Auth::id(), $this->want_to_visit_users()->pluck('users.id')->toArray());
    }
}
