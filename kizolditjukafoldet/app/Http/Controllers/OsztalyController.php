<?php

namespace App\Http\Controllers;

use App\Models\Osztaly;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OsztalyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $osztaly = Osztaly::all();
        return $osztaly;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $osztaly = new Osztaly();
        $osztaly->nev = $request->nev;
        $osztaly->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Osztaly  $osztaly
     * @return \Illuminate\Http\Response
     */
    public function show($osztalyId)
    {
        $osztaly = Osztaly::find($osztalyId);
        return $osztaly;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Osztaly  $osztaly
     * @return \Illuminate\Http\Response
     */
    public function edit(Osztaly $osztaly)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Osztaly  $osztaly
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $osztalyId)
    {
        $osztaly = Osztaly::find($osztalyId);
        $osztaly->nev = $request->nev;
        $osztaly->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Osztaly  $osztaly
     * @return \Illuminate\Http\Response
     */
    public function destroy($osztalyId)
    {
        $osztaly = Osztaly::find($osztalyId);
        $osztaly->delete();
    }

    public function loggedInOsztaly(){
        $user = Auth::user();
        $osztaly = Osztaly::find($user->osztaly_id);
        return $osztaly->nev;
    } 
}
