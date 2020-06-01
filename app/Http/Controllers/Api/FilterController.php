<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Article;

class FilterController extends Controller
{

    private $id_category;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function news($marketslug)
    {
        $marketname=str_replace('-',' ',$marketslug);
        $products = DB::table('farmers')
        ->join('farmer_market','farmers.id','=','farmer_market.farmer_id')
        ->join('payments','payments.farmer_id','=','farmers.id')
        ->join('articles','articles.farmer_id','=','farmers.id')
        ->join('categories','categories.id','articles.category_id')
        ->join('markets','markets.id','farmer_market.market_id')
        ->select('categories.name as cat_name',DB::raw('count(categories.id) as count')) //DB::raw()
        ->where('markets.name',$marketname)
        ->groupBy('payments.farmer_id','categories.id')
        ->havingRaw('max(payments.stopdata) > ?',[Carbon::now()->isoFormat('YYYY-MM-DD')])
        ->get();
    //    dd($products);
        return $products;
    }

    public function filterByCategory($marketslug,$id_category) {

        $this->id_category = $id_category;
        $marketname=str_replace('-',' ',$marketslug);
        $activeFarmers = DB::table('farmers')
        ->join('farmer_market','farmers.id','=','farmer_market.farmer_id')
        ->join('payments','payments.farmer_id','=','farmers.id')
        ->join('markets','markets.id','farmer_market.market_id')
        ->select('farmers.id',DB::raw('MAX(payments.id) as max_id'))
        ->where('markets.name',$marketname)
        ->where('payments.ispaid',1)
        ->where('payments.stopdata','>',Carbon::now()->isoFormat('YYYY-MM-DD'))
        ->groupBy('payments.farmer_id')
        // ->havingRaw('max(payments.stopdata) > ?',[Carbon::now()->isoFormat('YYYY-MM-DD')])
        ->get();
        $tab=array();

        //przepisuje wynik(ID) do tablicy
        foreach($activeFarmers as $af) {
            $tab[] = $af->id;
        }
    //    dd($tab);
       $a = Article::whereIntegerInRaw('farmer_id',$tab)->whereHas('category', function($q){
        $q->where('id', '=', $this->id_category );  //  'Mięso'
        })->get();
        dd($a);
        return $activeFarmers;
    }
}
