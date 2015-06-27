<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/5/30
 * Time: 18:51
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model{

    protected $fillable = ['title', 'url','indexChart','type', 'content', 'level'];
}
