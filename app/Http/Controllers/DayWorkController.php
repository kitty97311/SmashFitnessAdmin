<?php

namespace App\Http\Controllers;
use App\Models\SubCategory;
use App\Models\DayWork;

use Illuminate\Http\Request;

use Session;
use DB;
use DataTables;

class DayWorkController extends Controller
{
    public function day_work(){
        $session=Session::get('admin');

        if($session)
            {
                $data['category']= SubCategory::get();
                return view('admin.Day_Work.default',$data);
            }
            else
            {
                return redirect()->back()->with('error', 'You Are Not Loged In...');
            }
    }

    public function day_datatable(){
        $day_work =DayWork::get();
        
        $session= Session::get('admin');
        $data = $session->email;
        
        return DataTables::of($day_work)

        ->editColumn('id', function ($day_work) {
                return $day_work->id;
            })
        ->editColumn('sub_cat_id', function ($day_work) {	
               $category_name= DB::table("ex_subcategory")->where('id', $day_work->sub_cat_id)->First();
            	$name = $category_name->cat_name;
                return $name;
            })
        ->editColumn('name', function ($day_work) {
                return $day_work->name;
            })
        ->editColumn('description', function ($day_work) {
        	return $day_work->description;
        	})
        ->editColumn('is_workout', function ($day_work) {
                $work= $day_work->is_workout;
                if($work==1){
					return "Yes";
                }else{
                	return "No";
                }
            })
        
        ->editColumn('days', function ($day_work) {
                $day= $day_work->days;
                if($day==""){
                	return "-";
                }else{
					return $day_work->days." Days";
                }
            })
              
        ->editColumn('action', function ($day_work) {
               $edit=url('edit_category',array('id'=>$day_work->id));        
               $delete = route('delete_category', ['id'=>$day_work->id]);
               $week=route('show_week',array('id'=>$day_work->id));

                    return '
                    <button onclick="edit_days('.$day_work->id.')"  rel="tooltip" title="" style="margin-right: 5px; background-color:#17a2b8; margin-top:5px; cursor: pointer; color:white; padding:5px; border-radius: 4px;" data-original-title="Remove" data-toggle="modal" data-target="#edit_category" class="btn btn-sm" ><i class="fa fa-edit " ><span> UPDATE</span></i></button></button>

                    <button onclick="delete_work('.$day_work->id.')" rel="tooltip"  style="margin-right: 5px; margin-top:5px; cursor: pointer; color:white; padding:5px; border-radius: 4px; data-original-title="Remove" data-toggle="modal" data-target="#delete_category" class="btn btn-danger btn-sm" ><i class="fa fa-trash "><span> DELETE</span></i></button>

					<a href="'.$week.'" style="padding:5px; border-radius: 4px; margin-top:5px;"   class="btn btn-success btn-sm" ><i class="fa fa-edit " ><span> Add Exersice</span></i></a>';

					// <button onclick="add_ex('.$day_work->id.')" rel="tooltip" style="margin-right: 5px; cursor: pointer; color:white; padding:5px; border-radius: 4px; margin-top:5px; data-original-title="Remove" data-toggle="modal" data-target="#edit" class="btn btn-success btn-sm" ><i class="fa fa-edit "><span> Add Exersice</span></i></button>
     //                ';
                            
            })  
            ->make(true);
    }
     public function add_day(request $request){

        $work_day = new DayWork();
        $work_day->sub_cat_id=$request->get("sub_cat_id"); 
        $work_day->name=$request->get("name"); 
        $work_day->description=$request->get("description"); 
        $work_day->is_workout=$request->get("is_workout");
        if($work_day->is_workout == 0)
	    {
	    	$work_day->days="";
	    }
	    else
	    {
	    	$work_day->days=$request->get("days");
	    }
        
      
        $work_day->save();

        Session::flash('message',"Profile Added Successfully"); 
        Session::flash('alert-class', 'alert-success');
        return redirect()->back()->with('error', 'Successfull Added');
    }

    public function edit_days($id,Request $request){
        $data = DayWork::where('id', $id)->first();
        return $data;
    }

    public function edited_work(request $request){
        $main_id=$request->id;
        $name=$request->name;
        $sub_cat_id=$request->sub_cat_id;
        $description=$request->description;
        $is_workout=$request->is_workout;
        
        if($is_workout == 0)
	    {
	    	$days="";
	    }
	    else
	    {
	    	$days=$request->days;
	    }

        $work_day = array(
            'sub_cat_id'=> $sub_cat_id,
            'name' => $name,
            'description' => $description,
            'is_workout' => $is_workout,
            'days' => $days
        );
        
        $updated = DayWork::where('id', $main_id)
                    ->update($work_day);
        return redirect('day_work')->with('error', 'Success Updeted');
    }

    public function delete_work(request $request){
      
        $main_id=$request->id;
        $data = DayWork::where('id', $main_id)->first();
        return $data;   
    }

    public function deleted_work(request $request){
      
        $main_id=$request->id;
        
        $id=$request->get("id");

        $data=DayWork::find($request->get("id"));
      
        $data->delete();
       
        return redirect('day_work')->with('error', 'Successfull Deleted'); 
    }

    public function show_week($id){
        $data['cat_id'] = $id;
        $session=Session::get('admin');

        if($session)
            {
                 return view('admin.Category.week',$data);
            }
            else
            {
                return redirect()->back()->with('error', 'You Are Not Loged In...');
            }
    }

    public function week_data($id){
        $week =Week::where('cat_id', $id)->get();
        return DataTables::of($week)

        ->editColumn('id', function ($week) {
                return $week->id;
            })
        ->editColumn('cat_id', function ($week) {
            $cate_name= DB::table("ex_category")->where('id',$week->cat_id)->First();
            $name = $cate_name->cat_name;
               return $name;
            })
        ->editColumn('week', function ($week) {
                return $week->week;
            })
          
        ->editColumn('action', function ($week) {
           $regular=route('regular',array('id'=>$week->id));      
           
                return '
              <a href="'.$regular.'" style="padding:5px; border-radius: 4px; margin-top:5px;" class="btn btn-success btn-sm" ><i class="fa fa-edit " ><span> Add Exercise</span></i></a>';
               
        })  
        ->make(true); 
    }
    public function add_ex($id,Request $request){

        $data = DayExercise::where('id', $id)->first();
        $exercise =Exercise::where('is_deleted', '0')->get();
        $selexersice=explode(",",$data->ex_id);
        $is_rest=$data->is_rest;

        $html = "";
        if($is_rest == 1){
            $html=$html.'<option value="1" >Yes</option>
                        <option value="0">No</option>';
        }
        if($is_rest == 0){
            $html=$html.'<option value="1" >Yes</option>
                            <option value="0" selected>No</option>';
        }

        $txt="";
        foreach ($exercise as $ex) {
            if(in_array($ex->id,$selexersice)){
              $txt=$txt.'<option value="'.$ex->id.'" selected="selected" >'.$ex->name.'</option>';
            }else{
              $txt=$txt.'<option value="'.$ex->id.'">'.$ex->name.'</option>';
            }
        }

        $star="";
        $rate = $data->level;
        if($rate==1){
            $s1="text-warning";
            $s2="";
            $s3="";
        }
        if($rate==2){
            $s1="text-warning";
            $s2="text-warning";
            $s3="";
        }
        if($rate==3){
            $s1="text-warning";
            $s2="text-warning";
            $s3="text-warning";
        }
        $star=$star.'<i class="fa fa-star star-light submit_star mr-1 <?= $s1;?>" id="submit_star_1" data-rating="1"></i>
                    <i class="fa fa-star star-light submit_star mr-1 <?= $s2;?>" id="submit_star_2" data-rating="2"></i>
                    <i class="fa fa-star star-light submit_star mr-1 <?= $s3;?>" id="submit_star_3" data-rating="3"></i>
                    <input type="hidden" class="level_class" name="level">';
                    
        $arr=array("data"=>$data,"ex_data"=>$txt,"is_rest"=>$html, "rate"=>$star);
        return $arr;
    }
}
