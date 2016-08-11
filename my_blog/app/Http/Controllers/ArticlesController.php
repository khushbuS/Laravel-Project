<?php
namespace UserManagementApp\Http\Controllers;
use UserManagementApp\Article;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
//use Request;
use Carbon\Carbon;

use UserManagementApp\Http\Requests;

class ArticlesController extends Controller
{
   public function __construct()
   {
    $this->middleware('auth',['only' => 'create']);
   }

    public function index()
    {
        //return \Auth::user()->name;
    	$articles=Article::latest('published_at')->get();
    	return view('articles.index',compact('articles'));
    }

    public function show(Article $article)
    {
        
        //dd($article);
        //if(is_null($article))
        //{
        //	abort(404);
        //}
        return view('articles.show',compact('article'));
    }

    public function create()
    {
        $tags=\UserManagementApp\tag::lists('name', 'id');
        return view('articles.create', compact('tags'));
    }

    public function store(Requests\ArticleRequest $request)
    {

        $article=new Article($request->all());
        \Auth::user()->articles()->save($article);

        $article->tags()->attach($request->input('tag_list'));
        /*\Session::flash('flash_message','your Article has been added !');*/
        flash()->overlay('Your article has been added successfully!','Good Job');
        return redirect('articles');
    }

    public function edit(Article $article)
    {
         $tags=\UserManagementApp\tag::lists('name', 'id');
       // $article=Article::findOrFail($id);
        return view('articles.edit', compact('article','tags'));
    }

    public function update(Article $article, Requests\ArticleRequest $request)
    {

       //$article = Article::findOrFail($id);
       $article->update($request->all());
         $article->tags()->sync($request->input('tag_list'));

       return redirect('articles');
    }
}
 