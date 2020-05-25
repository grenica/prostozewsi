<?php

namespace App\Http\Controllers\Farmer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $authuser = Auth::user();
        //sprawdzam czy jest coś w modelu relacji (jakiś rekord)
        if(!$authuser->farmer()->exists()) {
            //dodaj pierwszy rekord w tabeli farmers
            return redirect()->route('farmer.profil.index');
        }
        $articles=$authuser->farmer->articles;
        // dd(Carbon::now()->subDays(9)->format('Y-m-d'));
        // $lastEarn = $this->lastEarnings($authuser)[0];
        // dd($lastEarn);
        
        $allClients = $this->allClients($authuser);
        // dd($allClients);
        $bs = $this->bestsellers($authuser);
        // dd($bs);
        if ($request->ajax()) {
            return DataTables::of($bs)
                ->addIndexColumn()
                // ->addColumn('action', function ($row) {
                //     $btn = 'Edit';
                //     $btn = $btn . ' Delete';
                //     return $btn;
                // })
                // ->rawColumns(['action'])
                ->make(true);
        }
        // ,'lastEarn'
        return view('farmer.dashboard.index',compact('articles','allClients','bs'));
    }
    private function lastEarnings($user) {
        //zysk z zamowień 10 dni wstecz
        $last = DB::table('order_items')
        ->join('articles','order_items.article_id','articles.id')
        ->join('orders','order_items.order_id','orders.id')
        //,DB::raw('COUNT(DISTINCT(order_items.order_id)) as count_orders')
        ->select(DB::raw('SUM(order_items.quantity * order_items.price) as lastEarn,COUNT(DISTINCT(order_items.order_id)) as countOrders'))
        // ->distinct('order_items.order_id')
        // ->count('order_items.order_id')
        ->whereDate('orders.created_at','>',Carbon::now()->subDays(10)->format('Y-m-d'))
        ->where('articles.farmer_id',$user->farmer->id)
        ->groupBy('articles.farmer_id')
        ->get();
        return $last;
    }
    private function allClients($user) {
        $allClients = DB::table('order_items')
        ->join('articles','order_items.article_id','articles.id')
        ->join('orders','order_items.order_id','orders.id')
        ->where('articles.farmer_id',$user->farmer->id)
        ->distinct()
        ->count('orders.client_id');

        return $allClients;
    }
    private function bestsellers($user) {
        $bs = DB::table('order_items')
        ->join('articles','order_items.article_id','articles.id')
        ->join('orders','order_items.order_id','orders.id')
        ->select('order_items.article_id','articles.name',DB::raw('SUM(order_items.quantity) as Ilosc'))
        ->where('articles.farmer_id',$user->farmer->id)
        ->groupBy('order_items.article_id')
        ->orderBy('Ilosc','desc')
        ->get();

        return $bs;
    }
    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }
}
