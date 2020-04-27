<?php

namespace App\Http\Controllers\Api;

use App\Article;
use App\Http\Controllers\Controller;
use App\Market;
use Illuminate\Http\Request;
use App\Order;
use App\User;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    private $successStatus = 200;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        
        //do zrobienia autoryzacja
        // $user = User::find($request->userID);
        // $order = Order::create([
        //     'market_id' => 1, //TODO
        //     'client_id' => $user->id,
        //     'canceled' => false,
        //     'home_delivery' => false
        // ]);
        
        $user = Auth::user();
        $market = Market::find($request->market);
        //$market=$request->market;
        // nie mam danych w tabeli clients
        $client = $user->client;
        if($client == null) {
            $user->client()->create();
        }
        // jak nie mam przypisanych ryneczków // pusta kolekcja
        if($client->markets->isEmpty()) {
            $client->markets()->attach($market);
        }
        //dodaje zamówienie do bazy 
        $order = $user->client->orders()->create([
            'market_id' => $market->id,
            'canceled' => false,
            'home_delivery' => false, // docelowo $request->home_delivery
        ]);
        //dodaje pozycje zamówienia
        // $koszyk = json_decode($request->cart,true);
        foreach($request->cart as $cart) {
            $article = Article::find($cart['id']);
            $order->orderitems()->create([
                'article_id' => $article->id,
                'quantity' => $cart['quantity'],
                'price' => $article->price
            ]);
        }
        return response()->json(['success' => $user], $this->successStatus);
       // return response()->json(['success' => $koszyk], $this->successStatus);

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
