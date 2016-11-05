<?php
/**
 * Created by PhpStorm.
 * User: Asterodeia
 * Date: 27/10/2016
 * Time: 23:31
 */

namespace App\Http\Controllers\EJ;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Lieu;

class EJHomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ej/home', [
            'lieux' => Lieu::all()
        ]);
    }
}
