<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compatibility extends Model
{
    public function entry()
    {
        return $this->hasMany(Entry::class);
    }
    public $timestamps = false;
}
