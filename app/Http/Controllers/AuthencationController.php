<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Exercise;
use App\Models\SendNotification;

use App\Models\Setting;
use App\Models\About;
use Hash;
use Session;
use Auth;
use DataTables;
class AuthencationController extends Controller
{


    public function show_login(){
        return view("admin.login");
    }

    public function admin_logout(){
        Auth::logout();
        return redirect()->route("login");
    }

    public function PostLogin(Request $request)
    {

        $email=$request->get('email');
        $password=$request->get("password");
        $user= User::where('email',$email)->where("password",$password)->first();

            if($user)
            {
                Session::put('admin', $user);
                Auth::login($user,true);
                return redirect('dashboard');
            }
            else
            {
                return redirect()->back()->with('error', 'Email or Password does not exist');
            }

   }
   public function dashboard(){ 
   	
        $session=Session::get('admin');
       
        if($session)
            {
                $data['count_category'] = Category::where('is_deleted', '0')->count();
                $data['count_exercise'] = Exercise::where('is_deleted', '0')->count();
                $data['count_not'] = SendNotification::count();
                
                return view('admin.dashboard',$data);
            }
            else
            {
                return redirect()->back()->with('error', 'You Are Not Loged In...');
            }
       
    }

    public function logout(){ 
       session()->forget('admin');
        return redirect('/');
       
    }
    
    public function privacy_front_app(){
        $data=About::find(1);
        // $lang = Lang_core::all();
        $lang = "";
        if(Session::get('locale')==""){
            Session::put('locale','en');
        }
        $setting=Setting::find(1);
        return view('privacy_policy',compact('data','setting','lang'));
    }
    
    public function accountdeletion(){
        $data=About::find(1);
        // $lang = Lang_core::all();
        $lang = "";
        if(Session::get('locale')==""){
            Session::put('locale','en');
        }
        $setting=Setting::find(1);
        return view('accountdeletion',compact('data','setting','lang'));
    }
    
    public function about(){
      $data=About::find(1);
      // $lang = Lang_core::all();
        $lang = "";
        if(Session::get('locale')==""){
            Session::put('locale','en');
        }
      $setting=Setting::find(1);
      return view('admin.about',compact('data','setting','lang'));
    }
    
    public function admin_privacy(){
      $data=About::find(1);
      $setting=Setting::find(1);
      // $lang = Lang_core::all();
        $lang = "";
        if(Session::get('locale')==""){
            Session::put('locale','en');
        }
      return view('admin.terms',compact('data','setting','lang'));
    }
    
    public function Privacy(){
      $data=About::find(1);
      $setting=Setting::find(1);
      // $lang = Lang_core::all();
        $lang = "";
        if(Session::get('locale')==""){
            Session::put('locale','en');
        }
      return view('admin.terms',compact('data','setting','lang'));
    }
    
    public function app_privacy(){
      $data=About::find(1);
      $setting=Setting::find(1);
      // $lang = Lang_core::all();
        $lang = "";
        if(Session::get('locale')==""){
            Session::put('locale','en');
        }
      return view('admin.privecy-app',compact('data','setting','lang'));
    }
    
    public function data_deletion(){
      $data=About::find(1);
      $setting=Setting::find(1);
      // $lang = Lang_core::all();
        $lang = "";
        if(Session::get('locale')==""){
            Session::put('locale','en');
        }
      return view('admin.data-deletion',compact('data','setting','lang'));
    }
    
   public function edit_about(Request $request){
      $data=About::find(1);
       $setting=Setting::find(1);
       $data->about = $request->get('about');
       $data->save();
      return redirect('about');
    }
    
    public function edit_terms(Request $request){
      $data=About::find(1);
      $setting=Setting::find(1);
      $data->trems = $request->get('trems');
       $data->save();
      return redirect('Terms_condition');
    }
    
    public function edit_app_privacy(Request $request){
      $data=About::find(1);
      $setting=Setting::find(1);
      $data->privacy = $request->get('privacy');
       $data->save();
      return redirect('app_privacy');
    }
    
    public function edit_data_deletion(Request $request){
      $data=About::find(1);
      $setting=Setting::find(1);
      $data->data_deletion = $request->get('data_deletion');
       $data->save();
      return redirect('data_deletion');
    }

}
