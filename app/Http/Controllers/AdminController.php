<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  Admin  ::  select('id','login','pssd')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function register(Request $request)
    {
        // $request->validate([
        //     'login'=>'requered',
        //     'pssd'=>'requered'
        // ]);
       
      
    }
    public function store(Request $request){
        //
        $admin = Admin::create([
            'login' => $request->login,
            'pssd' => hash::make($request->pssd)
        ]);
        return response()->json([
            'message'=>'bien ajouter'
        ]);
    }

    public function login(Request $request)
        {
            $data = [
                'login' => $request->email,
                'pssd' => hash::check($request->pssd,Auth::admin()->pssd,[])
            ];

            return response()->json([
                'message'=>'bien'
            ]);
    
            // if (auth()->attempt($data)) {
            //     $token = auth()->user()->createToken('Laravel9PassportAuth')->accessToken;
            //     return response()->json(['token' => $token], 200);
            // } else {
            //     return response()->json(['error' => 'Unauthorised'], 401);
            // }
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
