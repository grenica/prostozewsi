<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Market;
use App\Article;
use App\Category;
use App\Feature;
use App\Http\Resources\NewsResource;
use stdClass;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($marketslug)
    {
        $tab = array();
        $marketslug=str_replace('-',' ',$marketslug);

      $farmers = Market::where('name',$marketslug)->first()->farmers;
       foreach($farmers as $farmer) {
       
        $data  = $farmer->payments->last();
        
        $today = Carbon::now()->isoFormat('YYYY-MM-DD');
        if($data->stopdata >= $today && $data->ispaid) {
            //id rolników którzy opłacili abonament i są aktywni
            $tab[] = $farmer->id;
           
        }
       }
    
    $tab_features = array();
    $tab_category = array();
            
            $a = Article::whereIntegerInRaw('farmer_id',$tab)->paginate(5);
            
            // 
            foreach($a as $a1) {
                //ustawiam licznik cech produktów
                $fr = $a1->features;
                foreach($fr as $t) {
                    $key = $t->name;
                    if(key_exists($key,$tab_features)) {
                        $tab_features[$key] += 1;
                    } else {
                        $tab_features[$key] = 1;
                    }
                   
                }
                //ustawiam licznik kategorii
                if(key_exists($a1->category->name,$tab_category)) {
                    $tab_category[$a1->category->name] += 1;
                } else {
                    $tab_category[$a1->category->name] = 1;
                }
                
             }
            //  dd($tab_features); 
             $tab_features_1=[];
             $tab_category_1=[];
             //przepisuje do tablicy asoc
             foreach($tab_features as $k => $tf) {
                 $tab_features_1[] = (object)['name'=>$k, 'count' => $tf];  
             }

             foreach($tab_category as $k => $tf) {
                $tab_category_1[] = (object)['name'=>$k, 'count' => $tf];  
            }

            // dd($tab_features_1);
            // ,'category_list'=>$tab_category
            // return NewsResource::collection($a)->merge(['features_list'=> $tab_features_1,'category_list'=>$tab_category_1]);
            return NewsResource::collection($a);
    }

    
}
