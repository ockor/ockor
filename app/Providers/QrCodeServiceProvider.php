<?php namespace App\Providers;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/5/26
 * Time: 23:29
 */

use Illuminate\Support\ServiceProvider;

class QrCodeServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->singleton('QrCodeService', function () {
            return new \App\Services\QRcode();
        });
    }
}