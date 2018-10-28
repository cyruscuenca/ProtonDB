<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function entry()
    {
        return $this->hasMany(Entry::class);
    }
}
