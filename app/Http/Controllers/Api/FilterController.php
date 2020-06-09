<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Article;
use App\Market;

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
        $market = Market::where('name',$marketname)->first();
        // dd($market);
        $categories = DB::table('categories')
        ->join('articles','articles.category_id','categories.id')
        ->join('farmers','farmers.id','articles.farmer_id')
        ->join('payments','payments.farmer_id','farmers.id')
        ->join('farmer_market','farmer_market.farmer_id','farmers.id')
        ->select('categories.name')
        ->distinct('categories.name')
        ->where('farmer_market.market_id',$market->id)
        ->where('payments.ispaid',1)
        ->where('categories.parent_id',$id_category)
        ->whereDate('payments.stopdata','>',Carbon::now()->isoFormat('YYYY-MM-DD'))

        // ->havingRaw('max(payments.stopdata) > ?',[Carbon::now()->isoFormat('YYYY-MM-DD')])
        ->get();
        // dd($categories);
       

    //    dd($tab);
    //    $a = Article::whereIntegerInRaw('farmer_id',$tab)->whereHas('category', function($q){
    //     $q->where('id', '=', $this->id_category );  //  'Mięso'
    //     })->get();
       
        return $categories;
    }
}
