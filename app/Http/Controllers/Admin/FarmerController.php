<?php

namespace App\Http\Controllers\Admin;

use App\Farmer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;

class FarmerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //->sortByDesc('id')
        $farmers = Farmer::latest()->get();
        // dd($farmers);
        if ($request->ajax()) {
            return DataTables::of($farmers)
            ->addColumn('namelink', function ($farmer) {
                return '<a href="' . route('admin.farmer.show', $farmer->id) .'">'.$farmer->name.'</a>'; 
            })
            ->rawColumns(['namelink'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('admin.farmer.index',compact('farmers'));
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
     * @param  \App\Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function show(Farmer $farmer)
    {
        $articles=$farmer->articles;
        $active = 0;
        $lastPayment = $farmer->payments()->latest()->first();
        if($lastPayment->stopdata > Carbon::today()) {
            $active = 1;
        }
        //,'lastPayment','active'
        return view('admin.farmer.show',compact('farmer','articles','active'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function edit(Farmer $farmer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Farmer $farmer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Farmer $farmer)
    {
        //
    }
}
