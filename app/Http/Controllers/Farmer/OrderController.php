<?php

namespace App\Http\Controllers\Farmer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;
use App\Article;
use App\OrderItem;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authuser = Auth::user();
        //TODO
        
        $orders_report = Article::where('farmer_id',$authuser->farmer->id)
        ->join('order_items','order_items.article_id','articles.id')
        ->join('orders','orders.id','order_items.order_id')
        ->join('units','units.id','articles.unit_id')
        ->select('articles.name','units.name as unit', DB::raw('SUM(order_items.quantity) as total_quantity'))
        ->where('orders.created_at','>',Carbon::now()->subDays(4)->format('Y-m-d')) //dwa dni temu !??
        ->groupBy('articles.name','units.id')
        ->get();
      
          //  dd($orders);
        $orders = DB::table('order_items')
        ->join('articles','order_items.article_id','articles.id')
        ->join('orders','order_items.order_id','orders.id')
        // ->sum('order_items.quantity * order_items.price')
        ->select('orders.id','orders.created_at',DB::raw('SUM(order_items.quantity * order_items.price) as value'))
        ->whereDate('orders.created_at','>',Carbon::now()->subDays(4)->format('Y-m-d'))
        ->where('articles.farmer_id',$authuser->farmer->id)
        ->groupBy('orders.id')
        ->orderByDesc('orders.created_at')
        ->get();

        // dd($orders);
        return view('farmer.order.index',compact('orders','orders_report'));
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
        $total = 0;
        $farmerid = Auth::user()->farmer->id;
        //dd($farmerid);
        $order = Order::find($id);
        // listuje zamówienia towarów tylko danego rolnika
        $orderitems= $order->orderitems;
        foreach($orderitems as $key => $item) {
            // echo $item->article->farmer->id.'<br>';
            if ($item->article->farmer->id != $farmerid) {
                $orderitems->forget($key);
            }
            
        }
        foreach($orderitems as $oi) {
            $total+=$item->quantity*$item->price;
        }
        
        //$orderitems->forget(0);
        // dd($total);

        return view('farmer.order.show',compact('order','orderitems','total'));
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
