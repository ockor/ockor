<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/5/30
 * Time: 20:28
 */
namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Redirect, Input;
use \App\Articles;

use Illuminate\Http\Request;

class ArticleController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        $articles = Articles::all();
        $active = 'aritcle';

        return view('backend.article.index',compact('articles','active'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        $article = [];
        $active = 'aritcle';
        return view('backend.article.create',compact('article','active'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:articles|max:255',
            'url' => 'required',
            'content' => 'required',
        ]);
        Input::file('indexChart')->move(public_path().'/upload',Input::file('indexChart')->getClientOriginalName());
        $article = Input::all();
        $fileName = Input::file('indexChart')->getClientOriginalName();
        $article->indexChart = 'public/upload/';
//        dd($article);
        if (Articles::create($article)) {
            return Redirect::back();
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Request $request)
    {
        $aid = $request->id;
        $article = Articles::find($aid);
        $active = 'aritcle';
        return view('backend.article.create',compact('article','active'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'title' => 'required|unique:articles,name,'.$id.'|max:255',
            'url' => 'required',
        ]);
        $article = Articles::find($id);
        $article->name = Input::get('name');
        $article->url = Input::get('url');
        $article->indexChart = Input::get('indexChart');
        $article->type = Input::get('type');
        $article->level = Input::get('level');
        $article->content = Input::get('content');

        if ($article->save()) {
            return Redirect::back();
        } else {
            return Redirect::back()->withInput()->withErrors('更新失败！');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $site = Site::find($id);
        $site->delete();

        return Redirect::back();
    }

}
