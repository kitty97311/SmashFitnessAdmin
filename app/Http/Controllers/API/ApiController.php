<?php

namespace App\Http\Controllers\API;
error_reporting(-1);
ini_set('display_errors', 'On');
use Illuminate\Http\Request;
ini_set('max_execution_time', 0);
use App\Http\Controllers\Controller;
use Auth;
use Session;
use validate;
use Sentinel;
use Response;
use Validator;
use Stripe\Stripe;
use Stripe\Charge;
use DB;
use DataTables;
use Hash;
use Mail;

use App\Models\Setting;
use App\Models\About;
use App\Models\Category;
use App\Models\Smash;
use App\Models\SubSmash;
use App\Models\SmashPlus;
use App\Models\SubSmashPlus;
use App\Models\Workout;
use App\Models\WorkoutSet;
use App\Models\UploadImages;
use App\Models\UploadVideos;
use App\Models\Week;
use App\Models\DayExercise;
use App\Models\Exercise;
use App\Models\AboutUs;
use App\Models\UserApp;
use App\Models\Payment;
use App\Models\Terms;
use App\Models\ExerciseSet;
use App\Models\ExersiceStep;
use App\Models\DayProgress;
use App\Models\Tokan;
use App\Models\Feed;
use App\Models\Supplement;

class ApiController extends Controller
{
   
	public function get_category(Request $request){
       $data = Category::get();
        $response=array();
        if(count($data)>0){  
            $edit=array();
            $delete=array(); 
            $temp_array=array("create"=>$data,"update"=>$edit,"delete"=>$delete);   
            $response['success']="1";
            $response['message']="Get Category List";
            $response['exercise']=$temp_array;
        }else{
            $response['success']="0";
            $response['message']="No Excercise Found";
        }
        return json_encode($response);
    }

	public function get_smash(Request $request){
        $data = Smash::get();
        $response=array();
        if(count($data)>0){  
            $edit=array();
            $delete=array(); 
            $temp_array=array("create"=>$data,"update"=>$edit,"delete"=>$delete);   
            $response['success']="1";
            $response['message']="Get Smash List";
            $response['smash']=$temp_array;
        }else{
            $response['success']="0";
            $response['message']="No Smash Found";
        }
        return json_encode($response);
    }

	public function get_sub_smash(Request $request){
        $data = SubSmash::get();
        $response=array();
        if(count($data)>0){  
            $edit=array();
            $delete=array(); 
            $temp_array=array("create"=>$data,"update"=>$edit,"delete"=>$delete);   
            $response['success']="1";
            $response['message']="Get Sub Smash List";
            $response['sub_smash']=$temp_array;
        }else{
            $response['success']="0";
            $response['message']="No Sub Smash Found";
        }
        return json_encode($response);
    }

	public function get_sub_smashplus(Request $request){
        $data = SubSmashPlus::get();
        $response=array();
        if(count($data)>0){
            $edit=array();
            $delete=array(); 
            $temp_array=array("create"=>$data,"update"=>$edit,"delete"=>$delete);   
            $response['success']="1";
            $response['message']="Get Sub Smash List";
            $response['sub_smash']=$temp_array;
        }else{
            $response['success']="0";
            $response['message']="No Sub Smash Found";
        }
        return json_encode($response);
    }

    public function get_allexcercise(Request $request){

        $data = Exercise::where("is_deleted","0")->get();
        $response=array();
        if(count($data)>0){  
	        $edit=array();
			$delete=array(); 
        	$temp_array=array("create"=>$data,"update"=>$edit,"delete"=>$delete);   
            $response['success']="1";
            $response['message']="Get Excercise List";
            $response['exercise']=$temp_array;
        }else{
            $response['success']="0";
            $response['message']="No Excercise Found";
        }
        return json_encode($response);
    }

    public function get_subsmashexcercise(Request $request){
        $response = array("success" => "0", "message" => "Validation error");
        $rules = [
            'sub_smash_id'=>'required'
        ];
        $messages = array(
                  'sub_smash_id.required' => "sub_smash_id is required"
        );
        $validator = Validator::make($request->all(), $rules,$messages);
        if ($validator->fails()) {
            $message = '';
            $messages_l = json_decode(json_encode($validator->messages()), true);
            foreach ($messages_l as $msg) {
                $message .= $msg[0];
            }
            $response['message'] = $message;
        } else {
            $sub_smash_id=$request->get('sub_smash_id');
            if ($sub_smash_id > 0) $data = Exercise::where("sub_smash_id", $sub_smash_id)->where("is_deleted","0")->get();
            else $data = Exercise::where("is_deleted","0")->get();
            $response=array();
            if(count($data)>0){  
                $edit=array();
                $delete=array(); 
                $temp_array=array("create"=>$data,"update"=>$edit,"delete"=>$delete);   
                $response['success']="1";
                $response['message']="Get Excercise List";
                $response['exercise']=$temp_array;
            }else{
                $response['success']="0";
                $response['message']="No Excercise Found";
            }
        }
        return json_encode($response);
    }

    public function get_exercise(Request $request){
        if(!empty($request->get('set_id')))
        {
            $set_data = ExerciseSet::where("id",$request->get('set_id'))->where("is_deleted","0")->first();
            if($set_data)
            {
                $ex_data = Exercise::select('id','name','time','image')->where("id",$set_data->ex_id)->where("is_deleted","0")->orderby('id','DESC')->first();
                $data=array();
                $data[]=$ex_data;
            }
            else
            {
                $response['success']="0";
                $response['message']="No Data Found";
                return json_encode($response);
            }
        }
        else
        {
            $data = Exercise::select('id','name','time','image')->where("is_deleted","0")->get();
        }
        $response=array();
        if($data){  
            
            $response['success']="1";
            $response['message']="Get Term Data";
            $response['exercise']=$data;
        }else{
            $response['success']="0";
            $response['message']="No Data Found";
        }
        return json_encode($response);
    }

    public function get_exercise_step_list(Request $request){
        $response = array("success" => "0", "message" => "Validation error");
        $rules = [
            'ex_id'=>'required'
        ];
       
        $messages = array(
                  'ex_id.required' => "ex_id is required"
        );
        $validator = Validator::make($request->all(), $rules,$messages);
        if ($validator->fails()) {
            $message = '';
                $messages_l = json_decode(json_encode($validator->messages()), true);
                foreach ($messages_l as $msg) {
                    $message .= $msg[0];
                }
                $response['message'] = $message;
        } else {

                    $ex_id=$request->get('ex_id');
                    $ex_data = Exercise::where("id",$ex_id)->where("is_deleted","0")->first();
                    if($ex_data){
                        $step_data = ExersiceStep::select('id','step')->where("ex_id",$ex_id)->get();
                        
                        $response['success']="1";
                        $response['message']="Get Step List";
                        $response['exercise']=array("url"=>$ex_data->url,"step"=>$step_data);
                    }else{
                        $response['success']="0";
                        $response['message']="Data Not Found";
                    }
        }
        return json_encode($response);
    }

    public function user_register(Request $request){
        $response = array("success" => "0", "message" => "Validation error");
        $rules = [
            'name'=>'required',
            'phone' => 'unique:app_user|required', //unique:(table_name)
            'email' => 'unique:app_user|required', //unique:(table_name)
            'gender'=>'required',
            'workout_intensity'=>'required',
            'age'=>'required',
            'exercise_days'=>'required',
            'height'=>'required',
            'token'=>'required',
            'type'=>'required'
        ];
       
        $messages = array(
                  'name.required' => "name is required",
                  'phone.required' => "phone is required",
                  'phone.unique' => "Phone number is already registered with us, Please try different number",
                  'email.required' => "email is required",
                  'email.unique' => "Email is already registered with us, Please try different email",
                  'gender.required' => "gender is required",
                  'age.required' => "age is required",
                  'workout_intensity.required' => "workout_intensity is required",
                  'height.required' => "height is required",
                  'exercise_days.required' => "exercise_days is required",
                  'token.required' => "token is required",
                  'type.required' => "type is required"
        );

        $validator = Validator::make($request->all(), $rules,$messages);
        if ($validator->fails()) {
            $message = '';
                $messages_l = json_decode(json_encode($validator->messages()), true);
                foreach ($messages_l as $msg) {
                    $message .= $msg[0];
                }
                $response['message'] = $message;
        } else {

            $user = new UserApp();
            $user->name=$request->get("name"); 
            $user->phone=$request->get("phone"); 
            $user->email=$request->get("email");
            $user->password=$request->get("password");
            $user->gender=$request->get("gender"); 
            $user->age=$request->get("age");
            $user->workout_intensity=$request->get("workout_intensity");
            $user->height=$request->get("height");
            $user->exercise_days=$request->get("exercise_days");
            $user->save();
            $user->id;

            $token=$request->get('token');
            $type=$request->get('type');

            $data = Tokan::where('token',$token)->first();
            if($data){

                if($request->get("token") != ""){
                     $data->user_id=$user->id;
                }
               
                $data->save();
            }
            if($user){
                        $response['success']="1";
                        $response['message']="Get data successfully";
                        $response['data']=$user;
                    }else{
                        $response['success']="0";
                        $response['message']="Data Not Found";
                    }
            }
        return json_encode($response);
    }

    public function user_login(Request $request){
        $response = array("success" => "0", "message" => "Validation error");
        $rules = ['email'=>'required'];
        $messages = array(
            'email.required' => "Email is required",
        );

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $message = '';
            $messages_l = json_decode(json_encode($validator->messages()), true);
            foreach ($messages_l as $msg) {
                $message .= $msg[0];
            }
            $response['message'] = $message;
        } else {
            $email = $request->get('email');
            $password = $request->get('password');

            $data = UserApp::where('email', $email)->where('password', $password)->first();
            if ($data) {
                $response['success']="1";
                $response['message']="Get data successfully";
                $response['data']=$data;
            } else {
                $response['success']="0";
                $response['message']="Email or Password is not correct.";
            }
        }
        return json_encode($response);
    }

    public function get_set_by_category(Request $request){
      
       $data = Category::get();
       $total_time = array();
       $total_Cal = array();
        foreach ($data as  $value) {

           $total = ExerciseSet::where('cat_id',$value->id)->count();

           $total_ex = ExerciseSet::where('cat_id',$value->id)->get();
                foreach ($total_ex as $val) {

                    $data_ex = Exercise::where('id',$val->ex_id)->first();
                          $total_time[]=$data_ex->time;
                           $total_Cal[]=$data_ex->calories;  
                }

                $ls['id']=$value->id;
                $ls['name']=$value->cat_name;
                $ls['image']=$value->cat_icon;
                $ls['total_exercise']=$total;
                $ls['time']=array_sum($total_time);
                $ls['calories']=array_sum($total_Cal);
                $ls['level']=$value->level;
                $ls['description']=$value->description;
                $add[]=$ls;
        }

        if($data){
                    $response['success']="1";
                    $response['message']="Get data successfully";
                    $response['data']= $add;
                }else{
                    $response['success']="0";
                    $response['message']="Data Not Found";
                }
           
        return json_encode($response);
    }

    public function getexercisebycategory(Request $request){
        $response = array("success" => "0", "message" => "Validation error");
        $rules = [
            'cat_id'=>'required',  
        ];
       
        $messages = array(
                  'cat_id.required' => "cat_id is required",
        );

        $validator = Validator::make($request->all(), $rules,$messages);
        if ($validator->fails()) {
            $message = '';
                $messages_l = json_decode(json_encode($validator->messages()), true);
                foreach ($messages_l as $msg) {
                    $message .= $msg[0];
                }
                $response['message'] = $message;
        } else {

            $cat_id=$request->get('cat_id');
            $data = ExerciseSet::join('exercise', 'exercise.id', '=', 'ex_id')
                                ->join('ex_category', 'ex_category.id', '=', 'exercise_sets.cat_id')
                                ->where("cat_id",$cat_id)
                                ->where("exercise_sets.is_deleted","0")
                                ->get(['exercise.id', 'exercise.name', 'exercise.image','exercise.repeat_count','exercise.url','exercise.cat_name','exercise.time','exercise.calories','exercise.gif','exercise.created_at','exercise.updated_at','exercise.is_deleted','exercise.deleted_at','exercise.datetime','exercise_sets.created_at']);
           
            if($data){
                        $response['success']="1";
                        $response['message']="Get data successfully";
                        $response['data']=$data;
                    }else{
                        $response['success']="0";
                        $response['message']="Data Not Found";
                    }
            }
        return json_encode($response);
    }
    
    public function tokan_data(Request $request){
        $response = array("success" => "0", "message" => "Validation error");
        $rules = [
            'token'=>'required',  
            'type'=>'required',  
        ];
       
        $messages = array(
                  'token.required' => "token is required",
                  'type.required' => "type is required",
        );

        $validator = Validator::make($request->all(), $rules,$messages);
        if ($validator->fails()) {
            $message = '';
                $messages_l = json_decode(json_encode($validator->messages()), true);
                foreach ($messages_l as $msg) {
                    $message .= $msg[0];
                }
                $response['message'] = $message;
        } else {

            $token=$request->get('token');
            $type=$request->get('type');
           
                $user = new Tokan();
                $user->token=$request->get("token"); 
                $user->type=$request->get("type"); 
                $user->user_id=0;
                $user->save();
           
            }
                if($user){
                    $response['success']="1";
                    $response['message']="your data succefully insert";
                    $response['data']=$user;
                }else{
                    $response['success']="0";
                    $response['message']="Data Not Found";
                }
        return json_encode($response);
    }
    
    public function about(){
        $data=About::find(1);
        
        unset($data->trems);
        unset($data->privacy);
        unset($data->data_deletion);
        if($data){
              $response['status']= 1;
              $response['msg']="About List";
              $response['data']=$data;
              
          }else{
               $data3 =array();
               $response['status']= 0;
               $response['message']="Data Not Found";
               $response['data'] = $data;               
          }
        return Response::json($response);
    }
   
    public function admin_privacy(){
        $data=About::find(1);
        unset($data->privacy);
            unset($data->about);
            unset($data->data_deletion);
        if($data){
                $response['status']= 1;
                $response['msg']="Privecy List";
                $response['data']=$data;
                
            }else{
                $data3 =array();
                $response['status']= 0;
                $response['message']="Data Not Found";
                $response['data'] = $data;               
            }
            return Response::json($response);
    }

   	public function get_home(Request $request){
        $smashes = [];
        $data['category']= Category::where('is_deleted', '0')->get();
        $data['smash']= Smash::where('is_deleted', '0')->get();
        $data['sub_smash']= SubSmash::where('is_deleted', '0')->get();
        $data['workout'] = Workout::where('is_deleted', '0')->get();
        foreach ($data['smash'] as $smash) {
            $obj = new \stdClass();
            $obj->id = $smash->id;
            $obj->category = $smash->name;
            $obj->list = [];
            $count = 0;
            foreach ($data['workout'] as $workout) {
                foreach ($data['sub_smash'] as $sub_smash) {
                    if ($workout->sub_smash_id == $sub_smash->id && $sub_smash->smash_id == $smash->id) {
                        $subobj = new \stdClass();
                        foreach ($data['category'] as $category) {
                            if ($category->id == $workout->level_id) {
                                $subobj->level = $category->cat_name;
                            }
                        }
                        $subobj->id = $workout->id;
                        $subobj->img = $workout->img;
                        $subobj->title = $workout->name;
                        $subobj->time = $workout->period;
                        $subobj->count = $workout->size;
                        $subobj->calories = $workout->calories;
                        array_push($obj->list, $subobj);
                        $count++;
                    }
                }
                if ($count > 2) break;
            }
            array_push($smashes, $obj);
        }
        $response=array();
        if(count($smashes)>0){  
            $response['success']="1";
            $response['message']="Get sections for home screen";
            $response['data']=$smashes;
        }else{
            $response['success']="0";
            $response['message']="No Data Found";
        }
        return json_encode($response);
    }

    public function get_smashplus(Request $request){
        $smashes = [];
        $data['category']= Category::where('is_deleted', '0')->get();
        $data['smash']= SmashPlus::where('is_deleted', '0')->get();
        $data['sub_smash']= SubSmashPlus::where('is_deleted', '0')->get();
        $data['workout'] = Workout::where('is_deleted', '0')->get();
        foreach ($data['smash'] as $smash) {
            $obj = new \stdClass();
            $obj->id = $smash->id;
            $obj->category = $smash->name;
            $obj->list = [];
            $count = 0;
            foreach ($data['workout'] as $workout) {
                foreach ($data['sub_smash'] as $sub_smash) {
                    if ($workout->sub_smashplus_id == $sub_smash->id && $sub_smash->smashplus_id == $smash->id) {
                        $subobj = new \stdClass();
                        foreach ($data['category'] as $category) {
                            if ($category->id == $workout->level_id) {
                                $subobj->level = $category->cat_name;
                            }
                        }
                        $subobj->id = $workout->id;
                        $subobj->img = $workout->img;
                        $subobj->title = $workout->name;
                        $subobj->time = $workout->period;
                        $subobj->count = $workout->size;
                        $subobj->calories = $workout->calories;
                        array_push($obj->list, $subobj);
                        $count++;
                    }
                }
                if ($count > 2) break;
            }
            array_push($smashes, $obj);
        }
        $response=array();
        if(count($smashes)>0){  
            $response['success']="1";
            $response['message']="Get sections for home screen";
            $response['data']=$smashes;
        }else{
            $response['success']="0";
            $response['message']="No Data Found";
        }
        return json_encode($response);
    }

    public function get_workout(Request $request){
        $response = array("success" => "0", "message" => "Validation error");
        $rules = [
            'workout_id'=>'required',  
        ];
       
        $messages = array(
                  'workout_id.required' => "workout_id is required",
        );

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $message = '';
            $messages_l = json_decode(json_encode($validator->messages()), true);
            foreach ($messages_l as $msg) {
                $message .= $msg[0];
            }
            $response['message'] = $message;
        } else {
            $workout_id = $request->get('workout_id');
            $data = WorkoutSet::join('exercise', 'exercise.id', '=', 'ex_id')
                        ->join('workout', 'workout.id', '=', 'workout_sets.workout_id')
                        ->where("workout_id",$workout_id)
                        ->where("workout_sets.is_deleted","0")
                        ->get(['exercise.id', 'exercise.name', 'exercise.image','exercise.repeat_count','exercise.url','exercise.cat_name','exercise.time','exercise.calories','exercise.gif','exercise.created_at','exercise.updated_at','exercise.is_deleted','exercise.deleted_at','exercise.datetime','workout_sets.created_at']);
            if($data) {
                $response['success']="1";
                $response['message']="Get data successfully";
                $response['data']=$data;
            }else{
                $response['success']="0";
                $response['message']="Data Not Found";
            }
        }
        return json_encode($response);
    }

    public function get_workout_set(Request $request){
        $data = Workout::get();
        $categories= Category::where('is_deleted', '0')->get();
        foreach ($data as $value) {
            $total_time = array();
            $total_Cal = array();
            $total = WorkoutSet::where('workout_id',$value->id)->count();
            $total_ex = WorkoutSet::where('workout_id',$value->id)->get();
            foreach ($total_ex as $val) {
                $data_ex = Exercise::where('id',$val->ex_id)->first();
                    $total_time[]=$data_ex->time;
                    $total_Cal[]=$data_ex->calories;  
            }

            foreach ($categories as $category) {
                if ($category->id == $value->level_id) {
                    $ls['level']=$category->cat_name;
                }
            }
            $ls['id']=$value->id;
            $ls['sub_smash_id']=$value->sub_smash_id;
            $ls['sub_smashplus_id']=$value->sub_smashplus_id;
            $ls['name']=$value->name;
            $ls['img']=$value->img;
            $ls['total_exercise']=$total;
            $ls['time']=array_sum($total_time);
            $ls['calories']=array_sum($total_Cal);
            $add[]=$ls;
        }
 
        if($data){
            $response['success']="1";
            $response['message']="Get data successfully";
            $response['data']= $add;
        } else {
            $response['success']="0";
            $response['message']="Data Not Found";
        }
            
        return json_encode($response);
    }

    public function get_home_special(Request $request){
        $data = Workout::where('is_deleted', '0')->where('special', 1)->get();
        if($data) {
            $response['success']="1";
            $response['message']="Get data successfully";
            $response['data']=$data;
        }else{
            $response['success']="0";
            $response['message']="Data Not Found";
        }
        return json_encode($response);
    }

    public function post_images(Request $request){
        $response = array("success" => "0", "message" => "Validation error");
        $rules = [
            'id'=>'required',
            'images'=>'required'
        ];
       
        $messages = array(
                  'id.required' => "User id is required.",
                  'images.required' => "At least one image is required."
        );

        $validator = Validator::make($request->all(), $rules,$messages);
        if ($validator->fails()) {
            $message = '';
                $messages_l = json_decode(json_encode($validator->messages()), true);
                foreach ($messages_l as $msg) {
                    $message .= $msg[0];
                }
                $response['message'] = $message;
        } else {
            if($request->hasFile('images'))
            {
                $files = $request->file('images');

                $destinationPath = Storage_path("app/public/images/upload/");
                if (!is_dir($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }
                foreach ($files as $file) {
                    $fileName = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension() ?: 'png';
                    $picture = "UploadImage_". microtime(true) . '.' . $extension;
                    $file->move($destinationPath,$picture);
                    $image = $picture;

                    $newData = new UploadImages();
                    $newData->owner_id=$request->id;
                    $newData->image=$image;
                    $newData->save();
                }
                $response['success']="1";
                $response['message']="Post data successfully";
                $response['data']="success";
            } else {
                $response['success']="0";
                $response['message']="Data Not Found";
            }
        }
        return json_encode($response);
    }

    public function post_videos(Request $request){
        $response = array("success" => "0", "message" => "Validation error");
        $rules = [
            'id'=>'required',
            'videos'=>'required'
        ];
       
        $messages = array(
                  'id.required' => "User id is required.",
                  'videos.required' => "At least one video is required."
        );

        $validator = Validator::make($request->all(), $rules,$messages);
        if ($validator->fails()) {
            $message = '';
                $messages_l = json_decode(json_encode($validator->messages()), true);
                foreach ($messages_l as $msg) {
                    $message .= $msg[0];
                }
                $response['message'] = $message;
        } else {
            if($request->hasFile('videos'))
            {
                $files = $request->file('videos');

                $destinationPath = Storage_path("app/public/images/upload/");
                if (!is_dir($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }
                foreach ($files as $file) {
                    $fileName = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension() ?: 'mp4';
                    $picture = "UploadVideo_". microtime(true) . '.' . $extension;
                    $file->move($destinationPath,$picture);
                    $video = $picture;

                    $newData = new UploadVideos();
                    $newData->owner_id=$request->id;
                    $newData->video=$video;
                    $newData->save();
                }
                $response['success']="1";
                $response['message']="Post data successfully";
                $response['data']="success";
            } else {
                $response['success']="0";
                $response['message']="Data Not Found";
            }
        }
        return json_encode($response);
    }

    public function get_userinfo(Request $request){
        $response = array("success" => "0", "message" => "Validation error");
        $rules = ['id'=>'required'];
        $messages = array(
            'id.required' => "User id is required",
        );

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $message = '';
            $messages_l = json_decode(json_encode($validator->messages()), true);
            foreach ($messages_l as $msg) {
                $message .= $msg[0];
            }
            $response['message'] = $message;
        } else {
            $id = $request->get('id');

            $data = UserApp::where('id', $id)->first();
            $data2 = UploadImages::where('owner_id', $id)->get();
            $data3 = UploadVideos::where('owner_id', $id)->get();
            if ($data2) {
                $data['upload'] = $data2;
            }
            if ($data3) {
                $data['upload2'] = $data3;
            }
            if ($data) {
                $response['success']="1";
                $response['message']="Get data successfully";
                $response['data']=$data;
            } else {
                $response['success']="0";
                $response['message']="Data not found.";
            }
        }
        return json_encode($response);
    }

    public function update_password(Request $request){
        $response = array("success" => "0", "message" => "Validation error");
        $rules = ['id'=>'required'];
        $messages = array(
            'id.required' => "User id is required",
        );

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $message = '';
            $messages_l = json_decode(json_encode($validator->messages()), true);
            foreach ($messages_l as $msg) {
                $message .= $msg[0];
            }
            $response['message'] = $message;
        } else {
            $id = $request->get('id');
            $password = $request->get('password');

            $data = array(
                'password' =>$password
            );
            
            $updated = UserApp::where('id', $id)
                        ->update($data);
    
            if ($updated) {
                $response['success']="1";
                $response['message']="Change password successfully.";
                $response['data']="Success";
            } else {
                $response['success']="0";
                $response['message']="Something error.";
            }
        }
        return json_encode($response);
    }

    public function get_feed(Request $request){
        $response = array("success" => "0", "message" => "Validation error");
        $rules = ['id'=>'required'];
        $messages = array(
            'id.required' => "Image/Video id is required",
        );

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $message = '';
            $messages_l = json_decode(json_encode($validator->messages()), true);
            foreach ($messages_l as $msg) {
                $message .= $msg[0];
            }
            $response['message'] = $message;
        } else {
            $id = $request->get('id');
            $media = $request->get('media');
            
            if ($media == 0) $data = Feed::where('image_id', $id)->get();
            if ($media == 1) $data = Feed::where('video_id', $id)->get();
            if (count($data) > 0) {
                foreach ($data as $datum) {
                    $user = UserApp::where('id', $datum->user_id)->first();
                    $ls['id']=$datum->id;
                    $ls['favorite']=$datum->favorite;
                    $ls['react']=$datum->react;
                    $ls['user']=$user;
                    $add[]=$ls;
                }
            }
            if (count($data) > 0) {
                $response['success']="1";
                $response['message']="Get data successfully";
                $response['data']=$add;
            } else {
                $response['success']="0";
                $response['message']="Data not found.";
            }
        }
        return json_encode($response);
    }

	public function get_supplement(Request $request){
        $data = Supplement::get();
        $response=array();
        if(count($data)>0){
            $response['success']="1";
            $response['message']="Get Data List";
            $response['data']=$data;
        }else{
            $response['success']="0";
            $response['message']="No Data Found";
        }
        return json_encode($response);
    }
}
