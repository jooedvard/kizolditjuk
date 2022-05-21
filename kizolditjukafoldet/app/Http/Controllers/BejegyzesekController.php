<?php

namespace App\Http\Controllers;

use App\Models\Bejegyzesek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class BejegyzesekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bejegyzesek = Bejegyzesek::all();
        return $bejegyzesek;
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
        $bejegyzes = new Bejegyzesek();
        $bejegyzes->tevekenyseg_id = $request->tevekenyseg_id;
        $bejegyzes->osztaly_id = $request->osztaly_id;
        $bejegyzes->diak = $request->diak;
        $bejegyzes->allapot = $request->allapot;
        $bejegyzes->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bejegyzesek  $bejegyzesek
     * @return \Illuminate\Http\Response
     */
    public function show($bejegyzesekId)
    {
        $bejegyzes = Bejegyzesek::find($bejegyzesekId);
        return $bejegyzes;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bejegyzesek  $bejegyzesek
     * @return \Illuminate\Http\Response
     */
    public function edit(Bejegyzesek $bejegyzesek)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bejegyzesek  $bejegyzesek
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $bejegyzesId)
    {
        $bejegyzes = Bejegyzesek::find($bejegyzesId);
        $bejegyzes->allapot = $request->allapot;
        $bejegyzes->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bejegyzesek  $bejegyzesek
     * @return \Illuminate\Http\Response
     */
    public function destroy($bejegyzesekId)
    {
        $bejegyzes = Bejegyzesek::find($bejegyzesekId);
        $bejegyzes->delete();
    }

    public function expandOsztaly(){
        $bejegyzes = Bejegyzesek::with('osztaly')->get();
        return $bejegyzes;
    }

    public function expand(){
        $bejegyzes = Bejegyzesek::select('osztaly.nev','tevekenyseg.tevekenyseg_nev','tevekenyseg.pontszam','bejegyzesek.allapot')
        ->join('tevekenyseg','bejegyzesek.tevekenyseg_id','=','tevekenyseg.id')
        ->join('osztaly','bejegyzesek.osztaly_id','=','osztaly.id')->get();
        return $bejegyzes;
    }

    public function sortBy(Request $request)
    {
        $column = $request->_sort;
        if ($request->has('_order')){
            $order = $request->_order;
            $bejegyzes = Bejegyzesek::select('osztaly.nev','tevekenyseg.tevekenyseg_nev','tevekenyseg.pontszam','bejegyzesek.allapot')
            ->join('tevekenyseg','bejegyzesek.tevekenyseg_id','=','tevekenyseg.id')
            ->join('osztaly','bejegyzesek.osztaly_id','=','osztaly.id')
            ->orderBy($column, $order)->get();
        }
        else{
            $bejegyzes = Bejegyzesek::select('osztaly.nev','tevekenyseg.tevekenyseg_nev','tevekenyseg.pontszam','bejegyzesek.allapot')
            ->join('tevekenyseg','bejegyzesek.tevekenyseg_id','=','tevekenyseg.id')
            ->join('osztaly','bejegyzesek.osztaly_id','=','osztaly.id')
            ->orderBy($column)->get();
        }
        return $bejegyzes;
    }

    public function filterByOsztaly(){
        $bejegyzes = Bejegyzesek::selectRaw('sum(tevekenyseg.pontszam) as pontszam, osztaly.nev as osztaly')
        ->join('tevekenyseg','bejegyzesek.tevekenyseg_id','=','tevekenyseg.id')
        ->join('osztaly','bejegyzesek.osztaly_id','=','osztaly.id')
        ->groupBy('osztaly.nev')->where('allapot','=','elfogadva')->get();
        return $bejegyzes;
    }

    public function filterByOsztalyId($osztalyId){
        $bejegyzes = Bejegyzesek::selectRaw('sum(tevekenyseg.pontszam) as pontszam')
        ->join('tevekenyseg','bejegyzesek.tevekenyseg_id','=','tevekenyseg.id')
        ->groupBy('osztaly_id')->having('osztaly_id','=',$osztalyId)->where('bejegyzesek.allapot','=','elfogadva')->get();
        return $bejegyzes->first();
    }

    public function filterByTanar(){
        $user = Auth::user();
        $bejegyzesek = Bejegyzesek::with('osztaly')->with('tevekenyseg')->where('osztaly_id','=',$user->osztaly_id)->where('allapot','=','jóváhagyásra vár')->get();
        $bejegyzesSzam = Bejegyzesek::selectRaw('tevekenyseg_id as tevekenyseg_id, count(tevekenyseg_id) as db')->where('osztaly_id','=',$user->osztaly_id)->where('allapot','=','elfogadva')->groupBy('tevekenyseg_id')->get();

        foreach ($bejegyzesek as $bejegyzes) {
            $bejegyzes->tevekenyseg_count = $bejegyzesSzam->filter(function($value) use ($bejegyzes){
                if ($value->tevekenyseg_id === $bejegyzes->tevekenyseg_id) {                    
                    return $value;  
                }
            })->values()->first();
            if ($bejegyzes->tevekenyseg_count == null) {
                $bejegyzes->tevekenyseg_count = collect(['db' => 0]);
            }   
        }
        return $bejegyzesek;
    }

    public function listByOsztaly($osztalyId){
        $bejegyzesek = Bejegyzesek::select('osztaly.nev','tevekenyseg.tevekenyseg_nev','tevekenyseg.pontszam','bejegyzesek.allapot')
        ->join('tevekenyseg','bejegyzesek.tevekenyseg_id','=','tevekenyseg.id')
        ->join('osztaly','bejegyzesek.osztaly_id','=','osztaly.id')->where('osztaly_id','=',$osztalyId)->get();
        return $bejegyzesek;
    }

    public function elfogadottBejegyzesek($osztalyId, $tevekenysegId){
        $bejegyzesSzam = Bejegyzesek::where('allapot','=','elfogadva')->where('osztaly_id','=',$osztalyId)->where('tevekenyseg_id','=',$tevekenysegId)->count();
        return $bejegyzesSzam;
    }


}
