<?php
/**
 * Created by Sean.
 * User: wu
 * Date: 18-9-26
 * Time: 上午11:39
 * Desc: 行政区域相关逻辑
 */
namespace App\Http\Logic;

use App\Http\Model\Area;
use DB;

class AreaLogic extends BaseLogic
{

    protected $area_model;

    public function __construct()
    {
        $this->area_model=new Area();
    }

    /**
     * @author Sean
     * @desc 返回拼装好的行政区域数组
     * @return  array
    */
    public function GetAreaList($request){
        //如果没有传pid，默认取一级行政区域
        if (is_null($request->pid)){
            $request->pid=0;
        }
        $result=$this->area_model::where('area_pid',$request->pid)
            ->orderBy('id','desc')
            ->get();
        return $result;
    }
    /**
     * @author Sean
     * @desc 修改行政区域
     * @param id 主键不能为空
     * @param area_pid 行政区域父id
     * @param area_name 行政区域名称
     * @return  array
     */
    public function UpdateArea($request){

        if (is_null($request->area_id) or !is_numeric($request->area_id)){
            return $this->fail(400112);
        }
        //如果没有传pid，默认一级行政区域
        if (is_null($request->area_pid)){
            $request->area_pid=0;
        }
        $update_array['area_pid']=$request->area_pid;
        $update_array['area_name']=$request->area_name;
        $request=$this->area_model::where("id",'=',$request->area_id)->update($update_array);
        return $request;
    }
    /**
     * @author Sean
     * @desc 添加行政区域
     * @param id 主键不能为空
     * @param area_pid 行政区域父id
     * @param area_id   行政区域id
     * @param area_name 行政区域名称
     * @return  array
     */
    public function InsertArea($request){
        //如果没有传pid，默认一级行政区域
        if (is_null($request->area_pid)){
            $request->area_pid=0;
        }
        $insert_array['area_id']=$request->area_id;
        $insert_array['area_pid']=$request->area_pid;
        $insert_array['area_name']=$request->area_name;

        $request=$this->area_model::create($insert_array);
        return $request;
    }
    /**
     * @author Sean
     * @desc 删除行政区域
     * @param area_id   行政区域id
     * @return  int
     */
    public function DeleteArea($request){
        //area_id为空或者不为数字，直接返回错误
        if (is_null($request->area_id) or !is_numeric($request->area_id)){
            return $this->fail(400112);
        }
        $result=$this->area_model->where('area_id','=',$request->area_id)->delete();

        return $result;

    }

}