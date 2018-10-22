<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gpu extends Model
{
    public function entry()
    {
        return $this->hasMany(Entry::class);
    }
}
