<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function timestampStringAsDateString($timestampString){
        $date = new Carbon($timestampString);
        return $date->format('Y-m-d');
    }
}
