<?php

namespace App\Http\Controllers;
use App\Models\User;

use Session;
use DB;
use DataTables;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function Profile(){
        $session=Session::get('admin');

        if($session)
            {
            	$data['user']= User::first();
                return view('admin.Profile.default',$data);
            }
            else
            {
                return redirect()->back()->with('error', 'You Are Not Loged In...');
            }
    }

    public function edit_Profile(request $request){
		$main_id=$request->id;
        $user_name=$request->user_name;
        $email=$request->email;
        $password=$request->password;

        $notification = array(
            'user_name' => $user_name,
            'email' => $email,
            'password' => $password
        );
        
        $updated = User::where('id', $main_id)
                    ->update($notification);
        return redirect()->back()->with('error', 'Success Updeted');
    }
}
