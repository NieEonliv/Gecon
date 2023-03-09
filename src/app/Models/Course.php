<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function module()
    {
        return $this->hasMany(CourseModule::class);
    }

    public function user()
    {
        return $this->hasMany(UserCourse::class);
    }
}
