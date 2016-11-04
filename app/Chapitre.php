<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapitre extends Model
{
    protected $table = 'chapitres';
    public $timestamps = true;

    /**
     * Posts du chapitre
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function lieu(){
        return $this->belongsTo('App\Lieu');
    }
}
