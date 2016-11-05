<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perso extends Model
{
    protected $table = 'persos';
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }
}
