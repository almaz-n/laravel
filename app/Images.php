<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    public function books()
    {
        return $this->belongsTo('App\Books');
    }
}
