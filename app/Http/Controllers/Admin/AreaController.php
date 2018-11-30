<?php
/**
 * Created by PhpStorm.
 * User: wuxiaoyong
 * Date: 2018/11/28
 * Time: 3:45 PM
 */

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Logic\AreaLogic;

class AreaController extends Controller
{
    protected $logic;
    //构造函数
    public function __construct()
    {
        //实例化逻辑层logic类
        $this->logic=new AreaLogic();
    }
    /**
     * @author Sean
     * @desc 返回拼装好的行政区域数组
     * @param pid 父类id，如果不传此值，默认为0，取出一级行政区域
     * @return  json
     */
    public function GetAreaList(Request $request){
        try{
            $result=$this->logic->GetAreaList($request);
            return $this->Success($result);
        }
        catch (\Exception $e)
        {
            return $this->Fail(400113);
        }
    }

    /**
     * @author Sean
     * @desc 修改行政区域
     * @param area_pid 父类id，如果不传此值，默认为0，一级行政区域
     * @param area_name 区域名称
     * @return  json
     */
    public function UpdateArea(Request $request){
        try{
            $result=$this->logic->UpdateArea($request);
            return $this->Success($result);
        }
        catch (\Exception $e)
        {
            return $this->Fail(400113);
        }
    }

    /**
     * @author Sean
     * @desc 修改行政区域
     * @param area_pid 父类id，如果不传此值，默认为0，一级行政区域
     * @param area_name 区域名称
     * @return  json
     */

    public function InsertArea(Request $request){
        try{
            $result=$this->logic->InsertArea($request);
            return $this->Success($result);
        }
        catch (\Exception $e){
            return $this->Fail(400113);
        }
    }

    public function DeleteArea(Request $request){
        try{
            $result=$this->logic->DeleteArea($request);
            return $this->Success($result);
        }
        catch (\Exception $e){
            return $this->Fail(400113);
        }
    }



}