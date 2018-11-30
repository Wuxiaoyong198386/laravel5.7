<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    //控制器中要用到的通用成功方法且返回json格式的数据
    public function Success($data=[]){
        return response()->json(
            [
                'return_code' => 'SUCCESS',
                'request' => 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
                'message' => config('errorcode.code')[200],
                'is_error' => false,
                'data' => $data,
            ]
        );
    }
    //控制器中要用到的通用失败方法且返回json格式的数据
    public function Fail($code){
        return response()->json(
            [
                'return_code'    => 'SUCCESS',
                'request' =>'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],
                'message' => !empty($data)?$data:config('errorcode.code')[(int) $code],
                "error_code"=>$code,
                "api_code"=>$code,
            ]
        );
    }
}
