<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perso extends Model
{
    protected $table = 'persos';
    public $timestamps = true;
    protected $fillable = ['user_id', 'nom', 'race', 'FO', 'AG', 'CO', 'IG', 'IT', 'CH'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
