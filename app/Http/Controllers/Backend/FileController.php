<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/6/1
 * Time: 22:54
 */

namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Redirect, Input;

use Illuminate\Http\Request;

class FileController extends Controller {
    public function index()
    {
        return view('backend.fileupload');
    }
    public function store(Request $request)
    {
        if($request->hasFile('uploadFile')){
            $file = $request->file('uploadFile');
            $clientName = $file -> getClientOriginalName();
            Input::file('uploadFile')->move(public_path().'/upload',Input::file('uploadFile')->getClientOriginalName());
            echo "{$clientName}<br>";
        }
        return 'hello world';
    }
}
?>