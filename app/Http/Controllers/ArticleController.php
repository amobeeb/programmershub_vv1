<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Auth;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
class ArticleController extends Controller
{
    use UploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::where('is_approved',1)->latest()->get();
         return view('member.article.index')
         ->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('member.article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $article = new Article();
       $article->title = $request->title;
       $article->description = $request->description;
       $article->cover_image = $this->file_upload('cover','article/cover/');
       $article->member_id = Auth('members')->user()->id;
       $article->slug = Str::slug($request->title);
       $article->is_approved = 0; //not activated
       $article->save();
       dd('success');
    }

    public function personal(){
       
        return view('member.article.personal')
         ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $article = Article::where('slug', $slug)->first();
        return view('member.article.show')
         ->with('article', $article); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $article = $article;
        return view('member.article.edit')->with('article', $article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        $article->title = $request->title;
        $article->description = $request->description;
        $article->cover_image = $this->file_upload('cover','article/cover/');
        $article->member_id = Auth('members')->user()->id;
        $article->slug = Str::slug($request->title);
        $article->is_approved = 0; //not activated
        $article->save();
        dd('updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }


    public function published(){
        $articles = Article::where('is_approved',1)->latest()->get();
        return view('administrator.article.published')
        ->with('articles', $articles);
    }
    public function unpublished(){
        $articles = Article::where('is_approved',0)->latest()->get();
        return view('administrator.article.unpublished')
        ->with('articles', $articles);
    }

    public function toggle_article_approve($id){
        $article = Article::find($id);
        $article->is_approved = $article->is_approved == 1 ? 0 : 1;
        $article->save();
        return  back();
    }

}
