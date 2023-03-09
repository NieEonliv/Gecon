<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleOccupation extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function occupation()
    {
        return $this->belongsTo(Occupation::class);
    }

    public function module()
    {
        return $this->hasOne(Module::class);
    }
}
