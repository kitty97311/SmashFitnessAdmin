<?php
namespace App\Http\Controllers;
use App\Models\Smash;
use App\Models\SubSmash;
use App\Models\SmashPlus;
use App\Models\SubSmashPlus;
use App\Models\Workout;
use App\Models\Category;
use App\Models\Week;
use App\Models\DayExercise;
use App\Models\Exercise;

use Illuminate\Http\Request;
use Session;
use DB;
use DataTables;
class WorkoutController extends Controller
{
    public function show_workout(){
        $session=Session::get('admin');

        if($session)
            {
                $data['category']= Category::where('is_deleted', '0')->get();
                $data['smash']= Smash::where('is_deleted', '0')->get();
                $data['sub_smash']= SubSmash::where('is_deleted', '0')->get();
                $data['smashplus']= SmashPlus::where('is_deleted', '0')->get();
                $data['sub_smashplus']= SubSmashPlus::where('is_deleted', '0')->get();
                return view('admin.Workout.default', $data);
            }
        else
            {
                return redirect()->back()->with('error', 'You Are Not Logged In...');
            }
    }

    public function workout_datatable(){
        $workout = Workout::where('is_deleted', '0')->get();
        
        $session= Session::get('admin');
        $data = $session->email;

        return DataTables::of($workout)
            ->editColumn('id', function ($workout) {
                return $workout->id;
            })
            ->editColumn('sub_smash_name', function ($workout) {
                if ($workout->sub_smash_id > 0) {
                    $sub_smash_name= DB::table("sub_smash")->where('id', $workout->sub_smash_id)->First();
                    $name = $sub_smash_name->name;
                    return $name;
                } else {
                    return '';
                }
            })
            ->editColumn('sub_smashplus_name', function ($workout) {
                if ($workout->sub_smashplus_id > 0) {
                    $sub_smash_name= DB::table("sub_smashplus")->where('id', $workout->sub_smashplus_id)->First();
                    $name = $sub_smash_name->name;
                    return $name;
                } else {
                    return '';
                }
            })
            ->editColumn('workout_name', function ($workout) {
                return $workout->name;
            })
            ->editColumn('workout_image', function ($workout) {
                return asset('storage/app/public/images/workout')."/". $workout->img;
            })
            ->editColumn('workout_level', function ($workout) {
                if ($workout->level_id == 0) return '';
                $category_name= DB::table("ex_category")->where('id', $workout->level_id)->First();
                $name = $category_name->cat_name;
                return $name;
            })
            ->editColumn('workout_period', function ($workout) {
                return $workout->period;
            })
            ->editColumn('workout_size', function ($workout) {
                return $workout->size;
            })
            ->editColumn('workout_calories', function ($workout) {
                return $workout->calories;
            })
            ->editColumn('action', function ($workout) {
                $edit = url('edit_workout',array('id'=>$workout->id));        
                $delete = route('delete_workout', ['id'=>$workout->id]);
                return '
                    <button onclick="edit_workout('.$workout->id.')"  rel="tooltip" style="margin-right: 5px; background-color:#17a2b8;  cursor: pointer; margin-top:5px; color:white; padding:5px; border-radius: 4px;" data-original-title="edit" data-toggle="modal" data-target="#edit" class="btn btn-sm" ><i class="fa fa-edit " ><span> UPDATE</span></i></button>
                    <button onclick="delete_workout('.$workout->id.')" rel="tooltip" style="margin-right: 5px; cursor: pointer; color:white; padding:5px; border-radius: 4px; margin-top:5px;data-original-title="Remove" data-toggle="modal" data-target="#delete_workout" class="btn btn-danger btn-sm" ><i class="fa fa-trash "><span> DELETE</span></i></button>';
            })
            ->make(true);
    }

    public function add_workout(request $request){
        if($request->hasFile('workout_image'))
        {
            $file = $request->file('workout_image');
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $picture = "workout_".time() . '.' . $extension;
            $destinationPath = Storage_path("app/public/images/workout");
            $request->file('workout_image')->move($destinationPath, $picture);
            $image= $picture;
        }else{
            $image=null;
        }

        $workout = new Workout();
        $workout->sub_smash_id = $request->get("sub_smash_id");
        $workout->sub_smashplus_id = $request->get("sub_smashplus_id");
        $workout->name = $request->get("workout_name");
        $workout->level_id = $request->get("workout_level");
        $workout->img = $image;
        $workout->save();
        $workout->id;

        Session::flash('message',"Workout Added Successfully"); 
        Session::flash('alert-class', 'alert-success');
        return redirect()->back()->with('error', 'Success Added');
    }

    public function edit_workout($id, Request $request){
        $data = Workout::where('id', $id)->first();
        return $data;
    }

    public function edited_workout(request $request){
        $id = $request->id;
        $data = Workout::where('id', $id)->first();

        $main_id=$request->id;
        $sub_smash_id=$request->sub_smash_id;
        $sub_smashplus_id=$request->sub_smashplus_id;
        $workout_name=$request->workout_name;
        $workout_level=$request->workout_level;
        $workout_special=$request->workout_special;
        $workout_period=$request->workout_period;
        $workout_size=$request->workout_size;
        $workout_calories=$request->workout_calories;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $picture = "workout_".time() . '.' . $extension;
            $destinationPath = Storage_path("app/public/images/workout");
            $request->file('image')->move( $destinationPath, $picture);
            $image = $picture;
        } else {
            $data = Workout::where('id', $main_id)->first();
            $image = $data->img;
        }


        $workout = array(
            'sub_smash_id'=> $sub_smash_id,
            'sub_smashplus_id'=> $sub_smashplus_id,
            'name'=> $workout_name,
            'level_id'=> $workout_level,
            'special'=> $workout_special,
            'period'=> $workout_period,
            'size'=> $workout_size,
            'calories'=> $workout_calories,
            'img' => $image
        );

        $updated = Workout::where('id', $main_id)->update($workout);
        return redirect('workout')->with('error', 'Success Updated');
    }

    public function delete_workout(request $request){
      
        $main_id=$request->id;
        $data = Workout::where('id', $main_id)->first();
        return $data;
    }

    public function deleted_workout(request $request){
      
        $main_id=$request->id;

        $id=$request->get("id");

        $data=Workout::find($request->get("id"));

        $file = public_path('storage/app/public/images/workout/'.$data->img);

        if (!file_exists($file)) {
        } else {
            unlink($file);
        }

        $data->delete();
       
        return redirect('workout')->with('error', 'Success Deleted');
    }
}