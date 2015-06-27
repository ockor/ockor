<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Types extends Model{

    protected $fillable = ['name', 'type', 'index', 'level'];
}
