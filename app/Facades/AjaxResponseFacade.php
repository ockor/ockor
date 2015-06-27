<?php namespace App\Facades;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/5/26
 * Time: 23:19
 */

use Illuminate\Support\Facades\Facade;

class AjaxResponseFacade extends Facade {

    protected static function getFacadeAccessor() { return 'AjaxResponseService'; }

}