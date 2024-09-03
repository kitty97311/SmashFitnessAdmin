<?php

namespace App\Http\Controllers;
use App\Models\SendNotification;
use App\Models\TokenData;
use App\Models\User;
use App\Models\Notification;
use Sentinel;
use Session;
use DB;
use DataTables;
use Illuminate\Http\Request;

class SendNotificationController extends Controller
{
    public function send_not(){
        $session=Session::get('admin');

        if($session)
            {
            	return view('admin.Send Notification.default');
            }
            else
            {
                return redirect()->back()->with('error', 'You Are Not Loged In...');
            }
    }

    public function send_datatable(){

        $send_notification =SendNotification::get();
        
        $session= Session::get('admin');
        $data = $session->email;

        return DataTables::of($send_notification)

        ->editColumn('id', function ($send_notification) {
                return $send_notification->id;
            })
        ->editColumn('message', function ($send_notification) {

                return $send_notification->message;
            })
            ->make(true);
    }

    public function add_not(request $request){

        $user=Notification::first();
        
        $msg=$request->get("message");

        $android=$this->send_notification_android($user->android_key,$msg);
        $ios=$this->send_notification_IOS($user->ios_key,$msg);
       
        $send = new SendNotification();
        $send->message=$request->get("message"); 
        
        $send->save();

        Session::flash('message',"Profile Added Successfully"); 
        Session::flash('alert-class', 'alert-success');
        return redirect()->back()->with('error', 'Successfull Send');
    }

     public function send_notification_android($key,$msg){
     	$getuser=TokenData::where("type","android")->get();

        $i=0;
        if(count($getuser) != 0){

        	$reg_id = array();
               foreach($getuser as $gt){
               	$reg_id[]=$gt->token;
               }
              
               $regIdChunk=array_chunk($reg_id,1000);
               foreach ($regIdChunk as $k) {
                       $registrationIds =  $k;
						
                        $message = array(
                            'message' => $msg,
                            'title' =>  __('message.notification')
                          );
                        $message1 = array(
                            'body' => $msg,
                            'title' =>  __('message.notification')
                        );
                       $fields = array(
                          'registration_ids'  => $registrationIds,
                          'data'              => $message,
                          'notification'      =>$message1
                       );

                       $url = 'https://fcm.googleapis.com/fcm/send';
                       
                       $headers = array(
                         'Authorization: key='.$key,// . $api_key,
                         'Content-Type: application/json'
                       );

                      $json =  json_encode($fields);   
                      $ch = curl_init();
                      curl_setopt($ch, CURLOPT_URL, $url);
                      curl_setopt($ch, CURLOPT_POST, true);
                      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                      curl_setopt($ch, CURLOPT_POSTFIELDS,$json);
                      $result = curl_exec($ch);

                    if ($result === FALSE){
                         die('Curl failed: ' . curl_error($ch));
                      }     
                     curl_close($ch);
                     $response[]=json_decode($result,true);
               }
               $succ=0;
               foreach ($response as $k) {
                  $succ=$succ+$k['success'];
               }
             if($succ>0)
              {
                   return 1;
              }
            else
               {
                  return 0;
               }
        }
        return 0;
        }

     public function send_notification_IOS($key,$msg){
					
     	 $getuser=TokenData::where("type","ios")->get();

         if(count($getuser)!=0){               
               $reg_id = array();
               foreach($getuser as $gt){
                   $reg_id[]=$gt->token;
               }
                
              $regIdChunk=array_chunk($reg_id,1000);
               foreach ($regIdChunk as $k) {
                       $registrationIds =  $k;

                       $message = array(
                            'message' => $msg,
                            'title' =>  __('message.notification')
                          );
                        $message1 = array(
                            'body' => $msg,
                            'title' =>  __('message.notification')
                        );
                       $fields = array(
                          'registration_ids'  => $registrationIds,
                          'data'              => $message,
                          'notification'=>$message1
                       );

                       $url = 'https://fcm.googleapis.com/fcm/send';
                       $headers = array(
                         'Authorization: key='.$key,// . $api_key,
                         'Content-Type: application/json'
                       );
                      $json =  json_encode($fields);   
                      $ch = curl_init();
                      curl_setopt($ch, CURLOPT_URL, $url);
                      curl_setopt($ch, CURLOPT_POST, true);
                      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                      curl_setopt($ch, CURLOPT_POSTFIELDS,$json);

                      if ($result === FALSE){
                         die('Curl failed: ' . curl_error($ch));
                      }     
                     curl_close($ch);
                     $response[]=json_decode($result,true);
                     
               }
              $succ=0;
               foreach ($response as $k) {
                  $succ=$succ+$k['success'];
               }
             if($succ>0)
              {
                   return 1;
              }
            else
               {
                  return 0;
               }
        }
        return 0;
     }
}    

