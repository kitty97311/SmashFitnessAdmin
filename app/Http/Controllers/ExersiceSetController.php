<?php

namespace App\Http\Controllers;
use App\Models\ExersiceSet;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Exercise;

use Illuminate\Http\Request;
use Session;
use DB;
use DataTables;

class ExersiceSetController extends Controller
{
    public function ex_set(){
        $session=Session::get('admin');

        if($session)
            {
                $data['category']= Category::where('is_deleted', '0')->get();
                $data['exercise']= Exercise::where('is_deleted', '0')->get();
                return view('admin.Exersice Set.default',$data);
            }
            else
            {
                return redirect()->back()->with('error', 'You Are Not Loged In...');
            }
    }

    public function ex_set_datatable(){
        $exersice_set =ExersiceSet::where('is_deleted', '0')->get();
        
        $session= Session::get('admin');
        $data = $session->email;
        
        return DataTables::of($exersice_set)

        ->editColumn('id', function ($exersice_set) {
                return $exersice_set->id;
            })
        ->editColumn('cat_id', function ($exersice_set) {
            $category_name= DB::table("ex_category")->where('id', $exersice_set->cat_id)->First();
                $name = $category_name->cat_name;
                return $name;
               
            })
        ->editColumn('ex_id', function ($exersice_set) {
			$exersice_name= DB::table("exercise")->where('id', $exersice_set->ex_id)->First();
                $name = $exersice_name->name;
                return $name;
               
            })
        
        ->editColumn('action', function ($exersice_set) {
               $edit=url('edit_category',array('id'=>$exersice_set->id));        
               $delete = route('delete_category', ['id'=>$exersice_set->id]);
                
                    return '
                    <button onclick="edit_ex_set('.$exersice_set->id.')"  rel="tooltip" title="" style="margin-right: 5px; background-color:#17a2b8;  cursor: pointer; color:white; padding:5px; border-radius: 4px;" data-original-title="Remove" data-toggle="modal" data-target="#edit_category" class="btn btn-sm" ><i class="fa fa-edit " ><span> UPDATE</span></i></button></button>

                    <button onclick="delete_ex_set('.$exersice_set->id.')" rel="tooltip"  style="margin-right: 5px; cursor: pointer; color:white; padding:5px; border-radius: 4px; data-original-title="Remove" data-toggle="modal" data-target="#delete_category" class="btn btn-danger btn-sm" ><i class="fa fa-trash "><span> DELETE</span></i></button>
                    ';         
            })  
            ->make(true);
    }

    public function add_ex_set(request $request){

		$ex_set = array();
        $ex_set = $request->get("ex_id");

		foreach ($ex_set as  $value) {
			$exercise_set = new ExersiceSet();
		        $exercise_set->cat_id=$request->get("cat_id"); 
		        $exercise_set->ex_id=$value; 
		        $exercise_set->save();
		}
        Session::flash('message',"Profile Added Successfully"); 
        Session::flash('alert-class', 'alert-success');
        return redirect()->back()->with('error', 'Successfull Added');
    }

    public function edit_ex_set($id,Request $request){

        $data = ExersiceSet::where('id', $id)->first();

        $exercise =Exercise::where('is_deleted', '0')->get();
        $selexersice=explode(",",$data->ex_id);

        $txt="";
        foreach ($exercise as $ex) {
            if(in_array($ex->id,$selexersice)){
              $txt=$txt.'<option value="'.$ex->id.'" selected="selected" >'.$ex->name.'</option>';
            }else{
              $txt=$txt.'<option value="'.$ex->id.'">'.$ex->name.'</option>';
            }
        }
       $arr=array("data"=>$data,"ex_data"=>$txt);
        return $arr;
    }

    public function edited_ex_set(request $request){
		$sub_ex = array();
        $sub_ex = $request->ex_id;

		$main_id=$request->id;
        $cat_id=$request->cat_id;

		foreach ($sub_ex as  $value) {
			$exercise = array(
            'cat_id'=> $cat_id,
            'ex_id' => $value
        	);
			$updated = ExersiceSet::where('id', $main_id)
                    ->update($exercise);
		}
        
        return redirect('ex_set')->with('error', 'Success Updeted');
    }

    public function delete_ex_set(request $request){
      
        $main_id=$request->id;
        $data = ExersiceSet::where('id', $main_id)->first();
        return $data;   
    }

    public function deleted_ex_set(request $request){
      
        $main_id=$request->id;
        
        $id=$request->get("id");

        $data=ExersiceSet::find($request->get("id"));
       
        
        $data->delete();
       
        return redirect('ex_set')->with('error', 'Successfull Deleted');
    }

}
