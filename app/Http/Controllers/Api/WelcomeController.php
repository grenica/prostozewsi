<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Market;
use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function news_main($id)
    {
        $tab = array();

      $farmers = Market::find($id)->farmers;
       foreach($farmers as $farmer) {
        //    $data = DB::table('farmers')
        //    ->join('payments','farmers.id','=','payments.farmer_id')
        //     ->select('farmers.name','payments.ispaid','payments.stopdata')->get();
        //     $tab[]=$data;
        $data  = $farmer->payments->last();
        // dd($data->stopdata);
        //dd(Carbon::now()->isoFormat('YYYY-MM-DD'));
        $today = Carbon::now()->isoFormat('YYYY-MM-DD');
        if($data->stopdata >= $today && $data->ispaid) {
            //id rolników którzy opłacili abonament i są aktywni
            $tab[] = $farmer->id;
           
        }
       }
        // whereIntegerInRaw
        $products = DB::table('articles')
        ->join('articleimages','articles.id','=','articleimages.article_id')
        ->join('units','articles.unit_id','=','units.id')
        ->join('farmers','articles.farmer_id','=','farmers.id')
        ->select('articles.id','articles.name','articles.desc','articles.price','articles.created_at')
        ->addSelect('articleimages.image')
        ->addselect('units.name as Unit','farmers.name as FarmerName','farmers.id as FarmerId')
        ->where('articleimages.isdefault',1)
        ->orderBy('articles.created_at','desc')
        ->whereIntegerInRaw('articles.farmer_id',$tab)->take(4)
        ->get();
       
    // do obiektu art dodaje pole "images"
    // foreach($products as $art) {
    //     $art->images = Article::find($art->id)->articleimages()->get(['id','image','isdefault']);
    // }
    return $products;
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

}
