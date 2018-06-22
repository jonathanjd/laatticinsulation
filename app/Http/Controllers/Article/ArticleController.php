<?php

namespace App\Http\Controllers\Article;

use App\Article;
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{

    /**
     * __construct
     * Middleare auth
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $articles = Article::orderBy('id', 'desc')->paginate(5);
        return view('admin.article.index')->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('admin.article.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation request
        //dd($request->all());
        $this->validate($request, [
            'title' => 'required|min:2|max:255',
            'permalink' => 'max:255',
            'body' => 'required',
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'required',
            'seo_title' => 'required|min:2|max:255',
            'seo_description' => 'required',
            'keywords' => 'required',
        ]);

        if ($request->file('file')) {
            # code...
            $file = $request->file('file');
            $name = 'app' . '-' . time() . '.' . $file->getClientOriginalExtension();
            //Para Hosting =>/home3/arod/public_html/laremodelingcontractors.org/img/articles/
            $path = public_path('img/articles/');
            $file->move($path, $name);
        } else {
            $path = public_path('img/articles/');
            $name = 'default-image.png';
        }

        $article = new Article();
        $article->title = $request->title;
        $article->permalink = $request->permalink != null ? $request->permalink : str_slug($request->title);
        $article->body = $request->body;
        $article->seo_title = $request->seo_title;
        $article->seo_description = $request->seo_description;
        $article->img_url = $path;
        $article->img_name = $name;
        $article->keywords = $request->keywords;
        $article->status = 'active';
        $article->user_id = auth()->user()->id;
        $article->save();
        $article->categories()->sync($request->category);

        return redirect()->route('article.index')->with('flash', 'Article Saved');
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
        $article = Article::find($id);
        return view('admin.article.show')->with('article', $article);
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
        $article = Article::find($id);
        $categories = Category::all();
        return view('admin.article.edit')->with('article', $article)->with('categories', $categories);
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
        if ($request->file('file')) {
            # code...
            $file = $request->file('file');
            $name = 'app' . '-' . time() . '.' . $file->getClientOriginalExtension();
            //Para Hosting =>/home3/arod/public_html/laremodelingcontractors.org/img/articles/
            $path = public_path('img/articles/');
            $file->move($path, $name);
            $article = Article::find($id);
            $article->title = $request->title;
            $article->permalink = $request->permalink != null ? $request->permalink : str_slug($request->title);
            $article->body = $request->body;
            $article->seo_title = $request->seo_title;
            $article->seo_description = $request->seo_description;
            $article->img_url = $path;
            $article->img_name = $name;
            $article->keywords = $request->keywords;
            $article->status = 'active';
            $article->user_id = auth()->user()->id;
            $article->save();
            $article->categories()->sync($request->category);
        } else {
            $article = Article::find($id);
            $article->title = $request->title;
            $article->permalink = $request->permalink != null ? $request->permalink : str_slug($request->title);
            $article->body = $request->body;
            $article->seo_title = $request->seo_title;
            $article->seo_description = $request->seo_description;
            $article->keywords = $request->keywords;
            $article->status = 'active';
            $article->user_id = auth()->user()->id;
            $article->save();
            $article->categories()->sync($request->category);
        }

        return redirect()->route('article.show', $article)->with('flash', 'Article Updated');

    }

    public function delete($id)
    {
        # code...
        $article = Article::find($id);
        return view('admin.article.delete')->with('article', $article);
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
        $article = Article::find($id);
        $article->categories()->detach();
        $article->delete();
        return redirect()->route('article.index')->with('flash', 'Article Deleted');
    }
}
