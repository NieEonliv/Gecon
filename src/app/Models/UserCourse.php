<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCourse extends Model
{
    use HasFactory;
    protected $guarded = false;

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function course()
    {
        return $this->belongsTo(User::class);
    }
}
