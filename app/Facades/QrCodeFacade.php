<?php namespace App\Facades;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/5/26
 * Time: 23:32
 */

use Illuminate\Support\Facades\Facade;

class QrCodeFacade extends Facade {

    protected static function getFacadeAccessor() { return 'QrCodeService'; }

}