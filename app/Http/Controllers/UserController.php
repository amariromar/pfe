<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User :: select('id','localisation_id','spicialiter_id' ,'nom','prenom','description','status','phone','email','password')->get();
    }
    protected function create(array $data)
    {
        return User::create([
            'email' => $data['email'],
             'nom'=>$data['nom'],
             'prenom'=>$data['prenom'],
             'phone'=>$data['phone'],
            'localisation_id'=>$data['localisation_id'],
            'spicialiter_id'=>$data['spicialiter_id'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request){
        
        // $request->validate([
        //     'localisation_id'=>'requered',
        //     'spicialiter_id'=>'requered',
        //     'nom'=>'requered',
        //      'prenom'=>'requered',
        //      'phone'=>'requered',
        //      'email'=>'requered',
        //      'password'=>'requred'
        // ]);

            $user = User::create(
                [
                    'localisation_id'=>$request->localisation_id,
                    'spicialiter_id'=>$request->spicialiter_id,
                    'email' => $request->email,
                    'nom'=>$request->nom,
                    'description'=>$request->description,
                    'prenom'=>$request->prenom,
                    'phone'=>$request->phone,
                    'password' => Hash::make($request->password),
                ]
              
            );
            return response() ->json([
                'message'=>'bien ajouter'
            ]);
    }

  

   
    public function store(Request $request)
    {
        
        User :: create ($request->post());
        return response() ->json([
            'message'=>'bien ajouter'
        ]);
    }
        
    
       


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user,$id)
    {
        $user =User::where('id','=',$id)->with('spicialiter','localisation')->get();
        // $data['nom'] = $user->nom;
        // $data['prenom'] =$user->prenom;
        // $data['phone'] =$user->phone;
        // $data['email'] =$user->email;
        // $data['status'] =$user->status;
        // $data['description'] =$user->description;


        return response()->json([
            'data' =>$user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'nom'=>'requered',
            'prenom'=>'requered',
            'phone'=>'requered',
            'email'=>'requered',
            'status'=>'requered',
            'description'=>'requered',
            'localisation_id'=>'requered',
            'spicialiter_id'=>'requered',
            'password'=>'requred'
        ]);
        $user->fill($request->post())->update();
        $user->save();
        return response()->json([
            'message'=>'bien updated'
        ]);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json([
            'message'=>'bien supprimer'
        ]);
    }
}
