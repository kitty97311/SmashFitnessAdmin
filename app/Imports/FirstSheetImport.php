<?php
namespace App\Imports;

use App\Models\Excel;
use Maatwebsite\Excel\Concerns\ToModel;
use Session;
use App\Models\Category;
use App\Models\Topic;
use Google\Cloud\Translate\V2\TranslateClient;

class FirstSheetImport implements ToModel
{
    public function model(array $row)
    {
         $count = Session::get("count");
         if($count==1){
            Session::put("count","2");
         }
         else{
            $get_cateogory = Category::orderby("id","DESC")->take(count($row))->get();
            $ids = array();
            foreach($get_cateogory as $g){
                $ids[] = $g->id;
            }
            $ids1 = array_reverse($ids);
           // echo "<pre>";print_r($ids1);exit;
                $i=0;
                foreach($row as $r){
                    
                        if($r!=""){
                            $result = $translate->translate($r, [
                                'target' => 'fa'
                            ]);                           
                            $store = new Topic();
                            $store->name = $r;
                            $store->name_in_lang = $result['text'];                          
                            $store->category_id = 1;
                            $store->subcategory_id = $ids1[$i];
                            $store->save();
                        }   
                        $i++;

                    
                }
            
        }
       // return "done";
    }
}