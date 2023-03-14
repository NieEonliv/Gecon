<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function occupation()
    {
        return $this->hasMany(ModuleOccupation::class);
    }

    public function course()
    {
        return $this->hasOne(CourseModule::class);
    }
}
