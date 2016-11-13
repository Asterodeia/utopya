<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Perso;
use App\Library\Dice;


class PersoController extends Controller
{
    private $caracs = ['FO', 'AG', 'CO', 'IG', 'IT', 'CH'];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (session()->has('caracs')) {
            $caracteristiques = session('caracs');
        } else {
            $dice = new Dice();
            $caracteristiques = [];
            //Tirage aléatoire des caractéristiques
            foreach ($this->caracs as $carac) {
                $caracteristiques[$carac] = $dice->roll();
            }
            session(['caracs' => $caracteristiques]);
        }
        return view('persos.create', ['caracteristiques' => $caracteristiques]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nom' => 'required|unique:persos|max:40',
            'race' => 'required|in:Eïl,Elfe,Hobbit,Humain,Nain'
        ]);
        $newPerso = ['user_id' => Auth::user()->id,
            'nom' => $request->input('nom'),
            'race' => $request->input('race')];
        foreach (session('caracs') as $caracteristique => $value) {
            $newPerso[$caracteristique] = $value;
        }
        $perso = Perso::create($newPerso);
        session()->forget('caracs');
        Log::info('Ajout du perso', ['perso' => $perso]);
        $perso->save();
        return redirect('/home');
    }

    /**
     * "Jouer" ce perso
     * @param $idPerso
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function play($idPerso)
    {
        //login du perso
        $perso = Perso::where('id', $idPerso)->first();
        session(['perso' => $perso]);
        return redirect('/ej/home');
    }

    /**
     * "Déconnecter" ce persoe
     */
    public function logout()
    {
        session()->forget('perso');
        return redirect('/home');
    }
}
