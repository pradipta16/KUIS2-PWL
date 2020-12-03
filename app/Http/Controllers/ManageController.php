<?php

namespace App\Http\Controllers;
use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use PDF;

class ManageController extends Controller
{

    public function __construct() 
    {
        //$this->middleware('auth');
        $this->middleware(function($request, $next) {
            if(Gate::allows('manage')) return $next($request);
            abort(403, 'Anda tidak memiliki hak akses');
        });
    }
    public function manage()
    {
    $article = Article::all();
    return view('manage',['article' => $article]);
    }

    public function add()
    {
    return view('addArticle');
    }

    public function create(Request $request)
    {
        if($request->file('image')){
            $image_name = $request->file('image')->store('images','public');
            }

        Article::create(['title' => $request->title,
                        'excerpt' => $request->excerpt,
                        'body' => $request->body,
                        'image' => $image_name
        ]);
        return redirect('/manage');
    }   

    public function edit($id)
    {
        $article = Article::find($id);
        return view('editArticle',['article'=>$article]);
    }
    public function update($id, Request $request)
    {
        $article = Article::find($id);

        $article->title = $request->title;
        $article->excerpt = $request->excerpt;
        $article->body = $request->body;

        if($article->image && file_exists(storage_path('app/public/' . $article->image)))
        {
            \Storage::delete('public/'.$article->image);
        }
        $image_name = $request->file('image')->store('images', 'public');
        $article->image = $image_name;

        $article->save();
        return redirect('/manage');
    }
    public function delete($id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect('/manage');
    }

    public function cetak_pdf(){
        $article = Article::all();
        $pdf = PDF::loadview('articles_pdf',['article'=>$article]);
        return $pdf->stream();
        }

   
}
