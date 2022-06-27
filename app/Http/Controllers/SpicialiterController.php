<?php

namespace App\Http\Controllers;

use App\Models\Spicialiter;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SpicialiterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Spicialiter :: select('id','libelle')->get();
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
        // $this->validate($request,[
        //     'libelle'=>'requered'
        // ]);
        
        $spicialiter = Spicialiter::create([
            'libelle' => $request->libelle
        ]);
        return response()->json([
            'message'=>'bien ajouter'
        ]);
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Spicialiter  $spicialiter
     * @return \Illuminate\Http\Response
     */
    public function show(Spicialiter $spicialiter)
    {
        $data['libelle']=$spicialiter->libelle;
        return response()->json([
            'spisialiter' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Spicialiter  $spicialiter
     * @return \Illuminate\Http\Response
     */
    public function edit(Spicialiter $spicialiter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Spicialiter  $spicialiter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Spicialiter $spicialiter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Spicialiter  $spicialiter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spicialiter $spicialiter)
    {
        //
    }
}
