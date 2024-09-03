<?php

namespace App\Http\Controllers;
use App\Models\Notification;
use Illuminate\Http\Request;

use Session;
use DB;
use DataTables;


class NotificationController extends Controller
{
  public function android_notification(){
        $session=Session::get('admin');

        if($session)
            {
            	$data['notification']= Notification::first();
                return view('admin.Notification.android',$data);
            }
            else
            {
                return redirect()->back()->with('error', 'You Are Not Loged In...');
            }
    }

    public function edit_android(request $request){
		$main_id=$request->id;
        $android_key=$request->android_key;

        $notification = array(
            'id'=> $main_id,
            'android_key' => $android_key
        );
        
        $updated = Notification::where('id', $main_id)
                    ->update($notification);
        return redirect()->back()->with('error', 'Success Updeted');
    }

    public function IOS_notification(){
        $session=Session::get('admin');

        if($session)
            {
            	$data['ios']= Notification::first();
            	
                return view('admin.Notification.IOS',$data);
            }
            else
            {
                return redirect()->back()->with('error', 'You Are Not Loged In...');
            }
    }

    public function edit_ios(request $request){
		$main_id=$request->id;
       $ios_key=$request->ios_key;

        $ios = array(
            'id'=> $main_id,
            'ios_key' => $ios_key
        );
        
        $updated = Notification::where('id', $main_id)
                    ->update($ios);
        return redirect()->back()->with('error', 'Success Updeted');
    }
}
