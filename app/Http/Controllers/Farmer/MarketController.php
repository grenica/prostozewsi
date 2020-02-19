<?php

namespace App\Http\Controllers\Farmer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Market;
use Illuminate\Support\Facades\Auth;

class MarketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authuser = Auth::user();
        $allmarkets = Market::pluck('name','id');
        $mymarkets = $authuser->farmer->markets;
       
        return view('farmer.market.index',compact('mymarkets','allmarkets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allmarkets = Market::pluck('name','id');
        return view('farmer.market.create',compact('allmarkets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       // dd($request->market_id);
        $markerid = Market::find($request->market_id);
        //dd($markerid);
        Auth::user()->farmer()->first()->markets()->attach($markerid);
       return redirect()->route('farmer.market.index');
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
        if(request()->ajax()) {
            $market = Market::findOrFail($id);
            return response()->json(['result'=> $market]);
        }
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
        if($request->ajax()) {
            $markets = Market::findOrFail($request->hidden_id);
            $markets->update($request->all()); 
           return response()->json(['success' => $request]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $markets = Market::find($id);
        $markets->delete();
        return redirect()->route('farmer.market.index')->with('status','Pozycja została usunięta !!');
    }
}
