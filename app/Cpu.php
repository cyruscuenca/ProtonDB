<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cpu extends Model
{
    public function entry()
    {
        return $this->hasMany(Entry::class);
    }
}
