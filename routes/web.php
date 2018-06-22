<?php

use App\Article;
use App\Category;
use Illuminate\Database\Eloquent\Collection;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {

    $categories = Category::active()->select('id', 'name')->get();

    $results = new Collection();
    foreach ($categories as $category) {
        $results->push(Category::where('id', $category->id)
            ->with(['articles' => function ($query) {
                $query->active()->orderBy('created_at', 'desc');
            }])->get());
    }

    $categoryWithArticles = [];
    foreach ($results as $result) {
        foreach ($result as $category) {
            array_push($categoryWithArticles, $category);
        }
    }

    return view('home')->with('categories', $categoryWithArticles);
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
    Route::resource('category', 'Category\CategoryController', ['only' => ['index', 'create', 'edit', 'store', 'update']]);
    Route::get('article/delete/{id}', 'Article\ArticleController@delete')->name('article.delete');
    Route::resource('article', 'Article\ArticleController', ['only' => ['index', 'create', 'edit', 'show', 'store', 'update', 'destroy']]);
});


Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/{category}/{permalink}', function ($category, $permalink) {

    $article = Article::where('permalink', $permalink)->active()->first();
    if ($category != $article->categories[0]->permalink) {
        abort(404);
    }
    if ($article != null) {
        $result = Category::where('id', $article->categories[0]->id)
            ->with(['articles' => function ($query) use ($article) {
                $query->where('articles.id', '!=', $article->id)
                    ->active()
                    ->take(3)
                    ->latest();
            }])
            ->get();

        return view('articleShow', [
            'article' => $article,
            'related_articles' => $result[0], 'category' => $category
        ]);
    }

    abort(404);

})->name('showArticle');

Route::get('404', function () {
    return view('404');
})->name('404');

Route::get('/{category}', function ($category) {
    $cat = Category::wherePermalink($category)->first();

    if ($cat->permalink == 'blog') {
        $articles = Article::latest()->active()->paginate(10);
    } else {
        $articles = Article::whereHas('categories', function ($q) use ($category) {
            $q->wherePermalink($category);
        })->latest()->active()->paginate(10);
    }

    return view('articlesByCategory', ['articles' => $articles, 'category' => $cat]);
})->name('myCategory');

