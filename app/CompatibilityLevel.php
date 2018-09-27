<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompatibilityLevel extends Model
{
    public function entry()
    {
        return $this->belongsToMany(Entry::class);
    }
    public $timestamps = false;
}
