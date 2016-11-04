<?php
/**
 * Created by PhpStorm.
 * User: Asterodeia
 * Date: 27/10/2016
 * Time: 23:31
 */

namespace App\Http\Controllers\EJ;

use App\Chapitre;
use App\Lieu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests;

class LieuController extends Controller
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
     * Voir le lieu.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lieu = Lieu::findOrFail($id);
        $chapitres = $lieu->chapitres()->orderBy('updated_at','desc')->get();

        return view('ej/lieu', [
            'lieu' => $lieu,
            'chapitres' => $chapitres
        ]);
    }
}
