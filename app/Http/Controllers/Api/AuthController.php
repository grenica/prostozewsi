<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $valid= $request->validate([
            'name' => 'required',
            'email' => 'email|required',
            'password' =>'required|confirmed'
        ]);
        $user = User::create($valid);
        $accessToken = $user ->createToken('authToken')->accessToken;
        return response(['user'=> $user, 'access_token'=> $accessToken]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $valid= $request->validate([
            'email' => 'email|required',
            'password' =>'required'
        ]);
        if(!auth()->attempt($valid)) {
            return response(['message' => 'Niewlasciwe logowanie']);
        }
        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        return response(['user'=> auth()->user(), 'access_token'=> $accessToken]);
    }

    public function currentUser()
    {
        return Auth::user();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
