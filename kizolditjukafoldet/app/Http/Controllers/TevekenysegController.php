<?php

namespace App\Http\Controllers;

use App\Models\Tevekenyseg;
use Illuminate\Http\Request;

class TevekenysegController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tevekenyseg = Tevekenyseg::all();
        return $tevekenyseg;
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
        $tevekenyseg = new Tevekenyseg();
        $tevekenyseg->tevekenyseg_nev = $request->tevekenyseg_nev;
        $tevekenyseg->pontszam = $request->pontszam;
        $tevekenyseg->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tevekenyseg  $tevekenyseg
     * @return \Illuminate\Http\Response
     */
    public function show($tevekenysegId)
    {
        $tevekenyseg = Tevekenyseg::find($tevekenysegId);
        return $tevekenyseg;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tevekenyseg  $tevekenyseg
     * @return \Illuminate\Http\Response
     */
    public function edit(Tevekenyseg $tevekenyseg)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tevekenyseg  $tevekenyseg
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tevekenysegId)
    {
        $tevekenyseg = Tevekenyseg::find($tevekenysegId);
        $tevekenyseg->tevekenyseg_nev = $request->tevekenyseg_nev;
        $tevekenyseg->pontszam = $request->pontszam;
        $tevekenyseg->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tevekenyseg  $tevekenyseg
     * @return \Illuminate\Http\Response
     */
    public function destroy($tevekenysegId)
    {
        $tevekenyseg = Tevekenyseg::find($tevekenysegId);
        $tevekenyseg->delete();
    }
}
