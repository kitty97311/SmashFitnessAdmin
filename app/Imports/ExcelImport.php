<?php

namespace App\Imports;

use App\Models\Excel;
use Maatwebsite\Excel\Concerns\ToModel;
use Session;
use App\Models\Category;
use App\Models\Topic;
class ExcelImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        $count = Session::get("count"); 
        if ($count==1) {
            foreach($row as $r){
                if($r!=""){
                    $store = new Category();
                    $store->name = $r;
                    $store->parent_id = 1;
                    $store->save();  
                }
                Session::put("count",2);
            }
        }
       /* if($count==2){
            $get_cateogory = Category::orderby("id","DESC")->take(count($row))->get();
            $ids = array();
            foreach($get_cateogory as $g){
                $ids[] = $g->id;
            }
            $ids1 = array_reverse($ids);
            echo "<pre>";print_r($ids1);exit;
            foreach($ids1 as $l){
                foreach($row as $r){
                    if($r!=""){
                        $store = new Topic();
                        $store->name = $r;
                        $store->category_id = 1;
                        $store->subcategory_id = $l;
                        $store->save(); 
                        Session::put("count",2);
                    }                    
                }
            }
            
        }*/
       /* foreach($row as $r){
            if ($count==1) {
                $store = new Category();
                $store->name = $r;
                $store->parent_id = 1;
                $store->save();  
                Session::put("count",2);
            }else{
                if($r!=""){

                    $store = new Topic();
                    $store->name = $r;
                    $store->category_id = 1;
                    $store->save(); 
                    Session::put("count",2);
                }
                
            }
            
        }*/
        
       // return "1";

        /*if($row[0]!=""){
                return new Category([
                    'name'     => $row[0],
                    'parent_id'    => 1
                ]);
        }*/
    }
}
