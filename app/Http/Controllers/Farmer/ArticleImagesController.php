<?php

namespace App\Http\Controllers\Farmer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Article;
use app\Articleimage;
//use Image;
use Intervention\Image\ImageManagerStatic as Image;

class ArticleImagesController extends Controller
{
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
    public function create($id)
    {
        // dd($idarticle);
        // $authuser = Auth::user();
        // $article = $authuser->farmer->articles;
        return view('farmer.images.create',compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());
        // $authuser = Auth::user();
        // $ar = $authuser->farmer->articles->isEmpty();
        $request->validate([
            'file'  => 'required|mimes:jpg,jpeg,png,webp,svg|max:2048',
        ]);
        // if ($request->hasFile('file')) {

        //     $image      = $request->file('file');
        //     $image_name = time() . '.' . $image->extension();
    
        //     $image = Image::make($request->file('file'))
        //         ->resize(120, 120, function ($constraint) {
        //             $constraint->aspectRatio();
        //          });
    
        //     //here you can define any directory name whatever you want, if dir is not exist it will created automatically.
        //     Storage::putFileAs('public/images/1/smalls/' . $image_name, (string)$image->encode('png', 95), $image_name);
        // }
        
        if($request->hasFile('file')) {
            $file = $request->file('file');

            // Generate a file name with extension
            $fileName = 'prod-'.time().'.'.$file->getClientOriginalExtension();

            // Save the file to storage
           // $path = $file->storeAs('public/products', $fileName);
        //    $path = Storage::putFileAs(
        //     'avatars', $request->file('file'), $fileName,'public'
        //     );

            //wrzucam do /storage/app/public/produkty
            // publicznie widoczny z localhost/storage/produkty/dsdjsdsj.jpg
            //$file->store('produkty','public');
            
            $file->storeAs('produkty',$fileName,'public');

            // zmiana wymiary
            //$watermark = Image::make('images/watermark.png');
            $destinationPath = public_path('storage/produkty/thumbnail');
            Image::make($file->getRealPath())->resize(200, 150, function ($constraint) {
            $constraint->aspectRatio();
            })
            // ->insert($watermark, 'center')
            ->save($destinationPath.'/'.$fileName);

           // definiuje obiekt Articleimage
          // $artimg = new Articleimage();

           //czy to pierwsze zdjęcie ?
           $article = Article::find($request->article_id);
           // nie ma rekordów w relacji do ArticleImages
           $isdefault = false;
           if($article->articleimages->isEmpty()) {
               $isdefault = true;
           } else {
               $isdefault = false;
           }
       
           $w = $article->articleimages()->create([
               'image'=>$fileName,
               'isdefault'=> $isdefault
           ]);
           
            return redirect()->route('farmer.article.show',$request->article_id);
        }
       
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
