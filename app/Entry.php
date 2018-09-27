<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    public function app()
    {
        return $this->belongsTo(App::class);
    }
    public function compatibility_level()
    {
        return $this->belongsToMany(CompatibilityLevel::class);
    }
}
