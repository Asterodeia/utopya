<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lieu extends Model
{
    protected $table = 'lieux';
    public $timestamps = true;

    public function chapitres()
    {
        return $this->hasMany('App\Chapitre');
    }
}
