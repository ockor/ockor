<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/5/30
 * Time: 17:56
 */
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Articles;


class GaoxiaoController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        $articles = Articles::where('type',1)->skip(0)->take(50)->get();
//        return \AjaxResponse::success($data);
        return view('gaoxiao/index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
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
        $article = Articles::find($id);
        return view('gaoxiao/detail',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
