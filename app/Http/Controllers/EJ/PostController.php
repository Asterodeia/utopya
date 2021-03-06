<?php
/**
 * Created by PhpStorm.
 * User: Asterodeia
 * Date: 27/10/2016
 * Time: 23:31
 */

namespace App\Http\Controllers\EJ;

use App\Chapitre;
use App\Post;
use App\Lieu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('perso');
    }

    /**
     * @param $id_chapitre
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listInChapitre($id_chapitre){
        $chapitre = Chapitre::findOrFail($id_chapitre);
        $lieu = $chapitre->lieu;
        $posts = $chapitre->posts()->orderBy('updated_at','asc')->get();
        return view('ej.chapitre', ['chapitre' => $chapitre, 'posts' => $posts, 'lieu' => $lieu]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'titre' => 'required|max:40',
            'texte' => 'required'
        ]);
        if($request->has('chapitre_id')){
            $chapitre = Chapitre::findOrFail($request->input('chapitre_id'));
        }else{
            $chapitre = new Chapitre;
            $chapitre->titre = $request->input('titre');
            $chapitre->lieu_id = $request->input('lieu_id');
            $chapitre->save();
        }

        $post = new Post;
        $post->titre = $request->input('titre');
        $post->texte = $request->input('texte');
        $post->auteur_id = $request->session()->get('perso')->id;
        $chapitre->posts()->save($post);

        return redirect('/ej/chapitres/'.$chapitre->id);
    }
}
