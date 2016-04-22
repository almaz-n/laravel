<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
	public function bookimage() {
        return $this->hasMany('App\Images','book_id','id');
    }
}
