<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Market;
use Illuminate\Cookie\CookieJar;

class StartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $markets = Market::all();
        // jak nie ma ustawionego ryneczku to otwórz widok w Vue i ustaw 
        // rynek w localStorage i cookie
        if (!$request->cookie('market')) {
            return view('front.welcome2',compact('markets'));
        } else {
            return view('front.store');
        }
    }

    public function setCookie($id) {
        
        $mymarket = Market::find($id);
        $minutes = 10000;
        // return redirect()->route('start')->withCookie(cookie()->forever('market',$mymarket));
        $data = [
            'id' => $mymarket->id,
            'name' => $mymarket->name,
            'city' => $mymarket->city
        ];
        $json = json_encode($data);
        //dd($json);

        return redirect()->route('start')->cookie('market', $json, $minutes, null, null, false, false);
    }

    
    
}
