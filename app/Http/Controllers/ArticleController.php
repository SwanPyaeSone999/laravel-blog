<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleValidate;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth')->except(['index','details']);
    }


    public function index()
    {
          $data =   Article::latest()->paginate(5);
          return view('articles.index',compact('data'));

    }

    public function details($id)
    {
            $article  = Article::find($id);
            return view('articles.detail',compact('article'));
    }

    public function add()
    {
            return view('articles.add');
    }

    public function create(ArticleValidate $request)
    {
            $create = Article::create([
                'title'=>$request->title,
                'body'=>$request->body,
                'category_id'=>$request->category_id,
            ]);
            return redirect('/articles');
    }


    public function delete($id)
    {
        $delete = Article::find($id)->delete();
        return redirect('/articles')->with('success','An Article deleted!');
    }

    public function edit($id)
    {
        $edit = Article::find($id);
        return view('articles.edit',compact('edit'));
    }


    public function update(ArticleValidate $request,$id)
    {
            $create = Article::find($id)->update([
                'title'=>$request->title,
                'body'=>$request->body,
                'category_id'=>$request->category_id,
            ]);
            return redirect('/articles');
    }

}
