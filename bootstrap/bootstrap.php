<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/5/30
 * Time: 11:45
 */


use Illuminate\Support\Str;
use Illuminate\Container\Container;

if ( ! function_exists('res'))
{
    /**
     * Generate an asset path for the application.
     *
     * @param  string  $path
     * @param  bool    $secure
     * @return string
     */
    function res($paths, $secure = null)
    {
        $debug = Config::get('app.debug');
        if( $debug ){
            //开发模式
//            $path = implode(',',$paths);

            return 'http://res.ockor.com/'.$paths;
        }else{
            // 发布模式
            return $paths;
        }
//        return app('url')->asset($path, $secure);
    }
}
