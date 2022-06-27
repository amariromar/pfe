<?php

namespace App\Http\Controllers;

use App\Models\Localisation;
use Illuminate\Http\Request;

class LocalisationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Localisation :: select('id','ville')->get();
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
        
        Localisation :: create ($request->post());
        return response() ->json([
            'message'=>'bien ajouter'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Localisation  $localisation
     * @return \Illuminate\Http\Response
     */
    public function show(Localisation $localisation)
    {
        $data['ville']=$localisation->ville;
        return response()->json([
            'localisation'=>$$data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Localisation  $localisation
     * @return \Illuminate\Http\Response
     */
    public function edit(Localisation $localisation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Localisation  $localisation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Localisation $localisation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Localisation  $localisation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Localisation $localisation)
    {
        //
    }
}
