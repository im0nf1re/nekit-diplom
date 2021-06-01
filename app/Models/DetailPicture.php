<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPicture extends Model
{
    use HasFactory;

    public function monument()
    {
        $this->belongsTo('App\Models\Monument');
    }
}
