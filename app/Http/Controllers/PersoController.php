<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Perso;


class PersoController extends Controller
{
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
        return view('persos-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $perso = new Perso;
        $perso->user_id = Auth::user()->id;
        $perso->name = $request->input('name');
        $perso->race = $request->input('race');

        Log::info('Ajout du perso', ['perso' => $perso]);
        $perso->save();
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
     * "Déconnecter" ce perso
     */
    public function logout(){
        session()->forget('perso');
        return redirect('/home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
}
