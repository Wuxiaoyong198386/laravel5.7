<?php
/**
 * Created by PhpStorm.
 * User: wuxiaoyong
 * Date: 2018/11/28
 * Time: 3:45 PM
 */

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class RedisController extends Controller
{
    public function TestReids(){

        Redis::set('myname', 'wuxiaoyong');

        $myname=Redis::get('myname');

        if(Redis::exists('myage')){

            Redis::get('myage');
        }else{

            Redis::set('myage',35);
        }
        $myage=Redis::get('myage');

        $array=array("myname"=>$myname,"myage"=>$myage);
        return $this->Success($array);

    }


}