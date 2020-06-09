<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Market;
use App\Article;
use Illuminate\Support\Carbon;
use App\Http\Resources\ProductByCategoryResource;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    private $id_category;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Category::where('parent_id','0')->get();
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($marketslug,$id_category)
    {
        $tab = array();
        $this->id_category = $id_category;
        $marketname=str_replace('-',' ',$marketslug);
        // tablica aktywnych (opłaconych) rolników 
        $activeFarmers = DB::table('farmers')
        ->join('farmer_market','farmers.id','=','farmer_market.farmer_id')
        ->join('payments','payments.farmer_id','=','farmers.id')
        ->join('markets','markets.id','farmer_market.market_id')
        ->select('farmers.id',DB::raw('MAX(payments.id) as max_id'))
        ->where('markets.name',$marketname)
        // ->where('farmer_market.market_id',$id_category)
        ->where('payments.ispaid',1)
        ->where('payments.stopdata','>',Carbon::now()->isoFormat('YYYY-MM-DD'))
        ->groupBy('payments.farmer_id')
        // ->havingRaw('max(payments.stopdata) > ?',[Carbon::now()->isoFormat('YYYY-MM-DD')])
        ->get();
        //  dd($activeFarmers);

        //przepisuje wynik(ID) do tablicy
        foreach($activeFarmers as $af) {
            $tab[] = $af->id;
        }
    //    dd($tab);
        // z artykułow szukam categorii przekazany przez categoryname
    //    $a = Article::whereIntegerInRaw('farmer_id',$tab)->with(['category' => function($q) {
    //        $q -> where('name','=','Warzywniak');
    //    }])->paginate(16);
       $a = Article::whereIntegerInRaw('farmer_id',$tab)->whereHas('category', function($q){
            $q->where('parent_id', '=', $this->id_category );  //  'Mięso'
        })->paginate(16);

        // dd($a); //$this->categoryname
       return ProductByCategoryResource::collection($a);
    }

    
}
