<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $fillable = ['app_id', 'compatibility_id', 'user_id', 'gpu', 'gpu_brand_id', 'cpu', 'cpu_brand_id', 'distro_id', 'distro_version', 'driver_version', 'works', 'broken', 'tweaks', 'works_after', 'broken_after'];

    public function app()
    {
        return $this->belongsTo(App::class,'app_id');
    }
    public function compatibility()
    {
        return $this->belongsTo(Compatibility::class);
    }
    public function distro()
    {
        return $this->belongsTo(Distro::class);
    }
    public function user()
    {
        return $this->belongsTo(Models\Auth\User::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
