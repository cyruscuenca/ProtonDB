<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    protected $fillable = ['name', 'description', 'pc_min_spec', 'pc_recom_spec', 'linux_min_spec', 'linux_recom_spec', 'path_folder', 'path_int', 'path_slug', 'release_date'];

    public function entry()
    {
        return $this->belongsToMany(Entry::class);
    }
}
