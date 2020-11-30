<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    public function channels() {
        return $this->belongsToMany('App\Channel');
    }

    public function getDateAttribute($value) {
        return date('Y-m-d\TH:i:s', strtotime($value));
    }

    public function getFormattedDateAttribute() {
        return date('d/m/Y H:i:s', strtotime($this->date));
    }

    protected $appends = ["formatted_date"];

}
