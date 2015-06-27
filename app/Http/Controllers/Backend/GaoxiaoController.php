<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/5/30
 * Time: 18:54
 */
namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Redirect, Input;
use \App\Articles;

use Illuminate\Http\Request;

class GaoxiaoController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        $articles = Articles::all();
        $active = 'articles';


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
        dd("fdf");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:sites|max:255',
            'url' => 'required',
        ]);
        if (Site::create(Input::all())) {
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
    public function show($id)
    {
        //
        $site = Site::find($id);
        return $site;
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
            'name' => 'required|unique:sites,name,'.$id.'|max:255',
            'url' => 'required',
        ]);

        $site = Site::find($id);
        $site->name = Input::get('name');
        $site->url = Input::get('url');
        $site->level = Input::get('level');
        $site->desc = Input::get('desc');

        if ($site->save()) {
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
