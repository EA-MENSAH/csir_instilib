<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class Usercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
    }

    public function login(request $request){
        $fields = $request->validate([
            'username'=> 'required|string',
            'password'=> 'required|string',
        ]);

        $user = User::where('username', $fields['username'])->first();

        if(!$user || !Hash::check($fields['password'], $user->password)){
                return response()->json(['message'=>'invalid credentials'], 401);
        }

        $token = $user->createToken('appToken')->plainTextToken;

        return response()->json($token, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(request $request)
    {
        $fields = $request->validate([
            'username'=>'required|string|unique:users,username',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|string|confirmed',
        ]);

        $user = User::create([
            'email' => $fields['email'],
            'username' => $fields['username'],
            'password' => bcrypt($fields['password']),
        ]);

        $token = $user->createToken('appToken')->plainTextToken;
        return response()->json([$user ,$token], 200);
    }

    public function logout(){
        auth()->user()->tokens()->delete();
        return response()->json('logged out', 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::where('id', $id)->first();
        return response()->json($user, 200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fields = $request->validate([
            'username'=>'nullable|string|unique:users,username',
            'email'=>'nullable|email|unique:users,email',
            'password'=>'nullable|string|confirmed',
        ]);

        $user = User::update($fields);
        return response()->json($user, 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::where('id', $id)->delete();
        return response()->json($user, 200);
    }
}
