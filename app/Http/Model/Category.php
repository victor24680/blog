<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table="category";
    protected $primaryKey='cate_id';
    public $timestamps=false;
    
    public function tree(){
        $categorys=$this->orderBy('cate_order','asc')->get();
        //Category::all();  
        $data=(new Category)->getTree($categorys,'cate_name','cate_id','cate_pid',0);
        return $data;
    }
    
    public function getTree($data,$field_name,$field_id='id',$field_pid='pid',$pid=0){
        $arr=array();
        foreach($data as $k => $v){
            if($v->$field_pid==$pid){//$field_pid='cate_pid'获取父级类；
                $data[$k]['_'.$field_name]=$data[$k][$field_name];
                $arr[]=$data[$k];
                foreach($data as $m => $n){
                    if($v->$field_id==$n->$field_pid){
                        $data[$m]['_'.$field_name]='├'.$data[$m][$field_name];
                        $arr[]=$data[$m];
                    }
                }
            }
        }
        return $arr;
    }
    
}
