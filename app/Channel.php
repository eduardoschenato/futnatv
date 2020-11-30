<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    public function matches() {
        return $this->belongsToMany('App\Match');
    }
}
