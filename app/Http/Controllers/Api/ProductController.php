<?php

namespace App\Http\Controllers\Api;

use App\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProduct($id)
    {
      
    //    $article=Article::find($id)
    //    ->first(['articles.id','articles.name','articles.desc','articles.price']);
    //    $article['dupa']=['a'=>'a1','b1'=>'b11'];
        $article = DB::table('articles')
        ->join('units','articles.unit_id','=','units.id')
        ->join('farmers','articles.farmer_id','=','farmers.id')
        ->select('articles.id','articles.name','articles.desc','articles.price')
        ->addselect('units.name as Unit','farmers.name as FarmerName','farmers.id as FarmerId')
        ->where('articles.id',$id)
        ->get();
        foreach($article as $art) {
            $art->images = Article::find($art->id)->articleimages()->get(['image','isdefault']);
        }
        return $article;
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
