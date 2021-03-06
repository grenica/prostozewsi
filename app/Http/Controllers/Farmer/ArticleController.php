<?php

namespace App\Http\Controllers\Farmer;

use App\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Feature;
use App\Region;
use App\Category;
use App\Unit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authuser = Auth::user();
        $features = Feature::all();
        $category = Category::all();
        $units = Unit::pluck('name','id');
        $features =Feature::all();
        $myarticles= $authuser->farmer->articles;
        return view("farmer.article.index")->with(compact('myarticles','category','units','features'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $features = Feature::all();
        $category = Category::all();
        $units = Unit::pluck('name','id');
        $features =Feature::all();
        return view("farmer.article.create")->with(compact('features','category','units','features'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name' => 'required|min:4',
            'unit_id' => 'required',
            'price' => 'required',
            'category_id' =>'required'
        ]);
        $authuser = Auth::user();
        $features= $request->feature;
    //    dd($features);
        $article = $authuser->farmer()->first()->articles()->create($request->all());
        //dodaje cechy do artykułu
        // dd($features);
        $article->features()->attach($features);
       // $authuser->farmer()->first()->articles()->features()->first()->attach($features);
        return redirect()->route('farmer.artimages.create',$article->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $f = Storage::files();
        // dd($f);
        // $path = public_path('products');
       // $files = Storage::allfiles('avatars');
       // dd($files);
       // $visibility = Storage::getVisibility('public/avatars/n5fUUWo3kopDozHCH7iJ9tUgt8ifs84PYLaOFNQp.jpeg');
        //dd($visibility);
       // $url = Storage::url('public/avatars/n5fUUWo3kopDozHCH7iJ9tUgt8ifs84PYLaOFNQp.jpeg');
       // dd($url);
       

        $article = Article::find($id);
        $images = $article->articleimages;
        return view('farmer.article.show',compact('article','images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $unit = $article->unit;
        $unitsAll = Unit::pluck('name','id');
        $featuresAll = Feature::all();//pluck('name','id');
        $features = $article->features;
        $ftab =[];
        //przepisuje z obiektu do tablicy
        foreach($features as $f) {
            $ftab[]= $f->id;
        }
        foreach($featuresAll as $f_all) {
            if(in_array($f_all->id,$ftab)) {
                $f_all->checked = true;
            } else {
                $f_all->checked = false;
            }
           
        }
        //    dd($featuresAll); 
        //  dd($features);
        return view('farmer.article.edit',compact('article','unit','unitsAll','featuresAll'));
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
        // dd($request);
        $article = Article::findOrFail($request->hidden_id);
        // $featuresAll = Feature::all();
        // $features_relation = 
        // $feature = $request->feature;
        $article->features()->sync($request->feature);
        $article->update($request->all());
        return redirect()->route('farmer.article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $images = $article->articleimages;
        $features = $article->features;
        // dd($features);
        //odpidam zależne cechy produktu
        $article->features()->detach($features);
        
        // uswam pliki obrazków
        foreach($images as $img) {
            $file1 = '../../../../storage/app/public/produkty/'.$img.'.webp';
            $file2 = '../../../../storage/app/public/produkty/'.$img.'.jpg';
            if(Storage::exists($file1) || Storage::exists($file2)) {
                Storage::delete($file1);
                Storage::delete($file2);
            }
            //usuwam z bazy
            $img->delete();
        }
        $article->delete();
        return redirect()->route('farmer.article.index')->with('status','Pozycja została usunięta !!');
    }
    public function ajax_category(Request $request) {
        if($request->ajax()) {
            // $categories = Category::findOrFail($request->hidden_id);
            // $categories->update($request->all()); 
            $allcategory = Category::where('parent_id','0')->get();
            foreach($allcategory as $category) {
                //jak nie mam "dzieci"
                // if($category->children->isEmpty()) {
                //     $category->haschildren = 0;
                    
                // } else {
                //     $category->haschildren = 1;
                // }
                    $category=$category->children;  
                
            }
           return response()->json(['success' => $allcategory]);
        
      //return response()->json(array('msg'=> $msg), 200);
        }
        // $msg = "This is a simple message.";
        // return response()->json(array('msg'=> $msg), 200);
    }
    public function ajax_category_child(Request $request) {
        if($request->ajax()) {
            $id = $request->id;
            $children = Category::find($id)->children;
            foreach($children as $category) {
               $category=$category->children;  
            }
           return response()->json(['success' => $children]);
        
        }
    
    }
}
