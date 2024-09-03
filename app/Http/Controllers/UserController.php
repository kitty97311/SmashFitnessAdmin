<?php

namespace App\Http\Controllers;
use App\Models\UserApp;

use Session;
use DB;
use DataTables;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function user(){
        $session=Session::get('admin');

        if($session)
            {
            	return view('admin.User.default');
            }
            else
            {
                return redirect()->back()->with('error', 'You Are Not Loged In...');
            }
    }

    public function user_datatable(){
        $user =UserApp::get();
        
        $session= Session::get('admin');
        $data = $session->email;
        
        return DataTables::of($user)

        ->editColumn('id', function ($user) {
                return $user->id;
            })
        ->editColumn('create_at', function ($user) {
                return $user->create_at;
            })
        ->editColumn('name', function ($user) {
                return $user->name;
            })
        ->editColumn('phone', function ($user) {
            return $user->phone;
            })
        ->editColumn('gender', function ($user) {
                return $user->gender;
            })
        ->editColumn('workout_intensity', function ($user) {
                return $user->workout_intensity;
            })
        ->editColumn('age', function ($user) {
                return $user->age;
            })
        ->editColumn('height', function ($user) {
                return $user->height;
            })
         ->editColumn('exercise_days', function ($user) {
                return $user->exercise_days;
            })
        
        ->make(true);
       
    }

public function delete_user(request $request){
      
        $main_id=$request->id;
        $data = UserApp::where('id', $main_id)->first();
        // echo "<pre>";
        // print_r($data);
        return $data;   
    }

    public function deleted_user(request $request){
      
        $main_id=$request->id;
        
        $id=$request->get("id");
        $data=UserApp::find($request->get("id"));

        $pic = $data->profile_pic;

            if(is_null($pic) || empty($pic)){

            }else{

                $file = public_path('storage/app/public/images/profile/'.$data->profile_pic);

                if(! file_exists($file)){
                  
                }else{  
                    unlink($file);
                }
            }
        
        $data->delete();
        return redirect('user')->with('error', 'Successfull Deleted');
    }
}
