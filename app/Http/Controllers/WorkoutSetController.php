<?php

namespace App\Http\Controllers;
use App\Models\WorkoutSet;
use App\Models\Workout;
use App\Models\SubCategory;
use App\Models\Exercise;

use Illuminate\Http\Request;
use Session;
use DB;
use DataTables;

class WorkoutSetController extends Controller
{
    public function show_workout_set(){
        $session=Session::get('admin');

        if($session)
            {
                $data['workout']= Workout::where('is_deleted', '0')->get();
                $data['exercise']= Exercise::where('is_deleted', '0')->get();
                return view('admin.Workout_Set.default',$data);
            }
            else
            {
                return redirect()->back()->with('error', 'You Are Not Logged In...');
            }
    }

    public function workout_set_datatable(){
        $workout_set = WorkoutSet::where('is_deleted', '0')->get();
        
        $session= Session::get('admin');
        $data = $session->email;
        
        return DataTables::of($workout_set)

        ->editColumn('id', function ($workout_set) {
                return $workout_set->id;
            })
        ->editColumn('workout_id', function ($workout_set) {
            $workout_name= DB::table("workout")->where('id', $workout_set->workout_id)->First();
                $name = $workout_name->name;
                return $name;
            })
        ->editColumn('ex_id', function ($workout_set) {
			$exersice_name= DB::table("exercise")->where('id', $workout_set->ex_id)->First();
                $name = $exersice_name->name;
                return $name;
            })
        ->editColumn('action', function ($workout_set) {                
                return '
                    <button onclick="edit_workout_set('.$workout_set->id.')"  rel="tooltip" title="" style="margin-right: 5px; background-color:#17a2b8;  cursor: pointer; color:white; padding:5px; border-radius: 4px;" data-original-title="Remove" data-toggle="modal" data-target="#edit_workout_set" class="btn btn-sm" ><i class="fa fa-edit " ><span> UPDATE</span></i></button></button>
                    <button onclick="delete_workout_set('.$workout_set->id.')" rel="tooltip"  style="margin-right: 5px; cursor: pointer; color:white; padding:5px; border-radius: 4px; data-original-title="Remove" data-toggle="modal" data-target="#delete_workout_set" class="btn btn-danger btn-sm" ><i class="fa fa-trash "><span> DELETE</span></i></button>
                ';
            })
            ->make(true);
    }

    public function add_workout_set(request $request){

		$arr = array();
        $arr = $request->get("ex_id");

		foreach ($arr as  $value) {
			$workout_set = new WorkoutSet();
		        $workout_set->workout_id=$request->get("workout_id"); 
		        $workout_set->ex_id=$value; 
		        $workout_set->save();
		}
        Session::flash('message',"Data Added Successfully"); 
        Session::flash('alert-class', 'alert-success');
        return redirect()->back()->with('error', 'Successfully Added');
    }

    public function edit_workout_set($id,Request $request){

        $data = WorkoutSet::where('id', $id)->first();

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

    public function edited_workout_set(request $request){
		$sub_ex = array();
        $sub_ex = $request->ex_id;

		$main_id=$request->id;
        $workout_id=$request->workout_id;

		foreach ($sub_ex as  $value) {
			$exercise = array(
            'workout_id'=> $workout_id,
            'ex_id' => $value
        	);
			$updated = WorkoutSet::where('id', $main_id)
                    ->update($exercise);
		}
        
        return redirect('workout_set')->with('error', 'Success Updated');
    }

    public function delete_workout_set(request $request){
      
        $main_id=$request->id;
        $data = WorkoutSet::where('id', $main_id)->first();
        return $data;   
    }

    public function deleted_workout_set(request $request){
      
        $main_id=$request->id;
        
        $id=$request->get("id");

        $data=WorkoutSet::find($request->get("id"));
       
        
        $data->delete();
       
        return redirect('workout_set')->with('error', 'Successfully Deleted');
    }

}
