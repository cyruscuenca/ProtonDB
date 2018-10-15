<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distro extends Model
{
    public function entry()
    {
        return $this->hasMany(Entry::class);
    }
}
