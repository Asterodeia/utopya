<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    public $timestamps = true;

    public function chapitre()
    {
        return $this->belongsTo('App\Chapitre');
    }

    public function auteur()
    {
        return $this->belongsTo('App\Perso', 'auteur_id');
    }
}
