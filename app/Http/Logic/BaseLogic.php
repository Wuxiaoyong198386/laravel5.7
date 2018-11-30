<?php
/**
 * Created by PhpStorm.
 * User: wu
 * Date: 18-9-26
 * Time: 下午12:01
 */

namespace App\Http\Logic;

/**
 * @author Sean
 * @desc 逻辑层基础类
 */
class BaseLogic
{
    public $pagesize=10;

    public function success($data = [])
    {
        return response()->json([
            'return_code'    => 'SUCCESS',
            'request' =>'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],
            'message' => config('errorcode.code')[200],
            'is_error'=>false,
            'data'    => $data,
        ]);
    }

    public function fail($code, $data = [])
    {
        return response()->json([
            'return_code'    => 'SUCCESS',
            'request' =>'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],
            'message' => config('errorcode.code')[(int) $code],
            "error_code"=>$code,
            "api_code"=>$code,
            'data'    => $data,
        ]);
    }


    public function error($code){
        return array('ErrCode' => $code);
    }

}