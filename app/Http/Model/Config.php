<?php


namespace App\Http\Model;
use Illuminate\Database\Eloquent\Model;
class Config extends Model
{
    protected $table="config";
    protected $primaryKey='conf_id';
    public $timestamps=false;
    protected $guarded=[];
    /**
	
	标题
	名称
	类型 input ,textarea,radio
	类型值
	排序
	说明

    */



}
