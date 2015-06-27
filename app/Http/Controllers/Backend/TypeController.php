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
use \App\Types;

use Illuminate\Http\Request;

class TypeController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        $types = Types::all();
        $active = 'type';

        return view('backend.type.index',compact('types','active'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        $type = [];
        $active = 'type';
        return view('backend.type.create',compact('type','active'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:types|max:255',
            'type' => 'required',
            'level' => 'required',
            'index' => 'required',
        ]);
        $type = Input::all();
        if (Types::create($type)) {
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
        $type = Types::find($aid);
        $active = 'type';
        return view('backend.type.create',compact('type','active'));
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
            'name' => 'required|unique:types|max:255',
            'type' => 'required',
            'level' => 'required',
            'index' => 'required',
        ]);
        $type = Types::find($id);
        $type->name = Input::get('name');
        $type->type = Input::get('type');
        $type->index = Input::get('index');
        $type->level = Input::get('level');

        if ($type->save()) {
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
