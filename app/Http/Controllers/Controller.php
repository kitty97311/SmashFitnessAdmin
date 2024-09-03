<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Settings;
use DateTimeZone;
use DateTime;
use App\Models\Token;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


     public function getsitedate(){
            $setting=Settings::find(1);
            $date_zone=array();
            $timezone=$this->generate_timezone_list();
                foreach($timezone as $key=>$value){
                      if($setting->timezone==$key){
                              $date_zone=$value;
                      }
                }
            date_default_timezone_set($date_zone);   
            return date('Y-m-d h:i:s');                    
     }

      static public function generate_timezone_list(){
          static $regions = array(
                     DateTimeZone::AFRICA,
                     DateTimeZone::AMERICA,
                     DateTimeZone::ANTARCTICA,
                     DateTimeZone::ASIA,
                     DateTimeZone::ATLANTIC,
                     DateTimeZone::AUSTRALIA,
                     DateTimeZone::EUROPE,
                     DateTimeZone::INDIAN,
                     DateTimeZone::PACIFIC,
                 );
                  $timezones = array();
                  foreach($regions as $region) {
                            $timezones = array_merge($timezones, DateTimeZone::listIdentifiers($region));
                  }

                  $timezone_offsets = array();
                  foreach($timezones as $timezone) {
                       $tz = new DateTimeZone($timezone);
                       $timezone_offsets[$timezone] = $tz->getOffset(new DateTime);
                  }
                 asort($timezone_offsets);
                 $timezone_list = array();
    
                 foreach($timezone_offsets as $timezone=>$offset){
                          $offset_prefix = $offset < 0 ? '-' : '+';
                          $offset_formatted = gmdate('H:i', abs($offset));
                          $pretty_offset = "UTC{$offset_prefix}{$offset_formatted}";
                          $timezone_list[] = "$timezone";
                 }

                 return $timezone_list;
                ob_end_flush();
       }

       public function gettimezonename($timezone_id){
              $getall=$this->generate_timezone_list();
              foreach ($getall as $k=>$val) {
                 if($k==$timezone_id){
                     return $val;
                 }
              }
       }

         public function send_notification_order_android($key,$user_id,$msg,$field_type,$order_id){
          $getuser=Token::where("type","1")->where($field_type,$user_id)->get();
            if(count($getuser)!=0){               
                $reg_id = array();
                foreach($getuser as $gt){
                   $reg_id[]=$gt->token;
                }
                $regIdChunk=array_chunk($reg_id,1000);
                foreach ($regIdChunk as $k) {
                       $registrationIds =  $k;    
                        $message = array(
                            "type"=>$field_type,
                            "click_action"=>"FLUTTER_NOTIFICATION_CLICK", "order_id"=> $order_id
                          );
                        $message1 = array(
                            'body' => $msg,
                            'title' =>  __('messages.notification')
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
                      $result = curl_exec($ch);   
                      if ($result === FALSE){
                         die('Curl failed: ' . curl_error($ch));
                      }     
                     curl_close($ch);
                     $response[]=json_decode($result,true);
               }
              $succ=0;
               if($response){
                 foreach ($response as $k) {
                    if(isset($k['success'])){
                      $succ=$succ+$k['success'];
                    }
                    
                 }
              }
             if($succ>0)
              {
                   return 1;
              }
               {
                  return 0;
               }
        }
        return 0;
   }
   public function send_notification_order_IOS($key,$user_id,$msg,$field_type,$order_id){
      $getuser=Token::where("type","2")->where($field_type,$user_id)->get();
         if(count($getuser)!=0){               
               $reg_id = array();
               foreach($getuser as $gt){
                   $reg_id[]=$gt->token;
               }
                 $regIdChunk=array_chunk($reg_id,1000);
               foreach ($regIdChunk as $k) {
                       $registrationIds =  $k;    
                       $message = array(
                            "type"=>$field_type,
                            "click_action"=>"FLUTTER_NOTIFICATION_CLICK", "order_id"=> $order_id
                          );
                       $message1 = array(
                            'body' => $msg,
                            'title' =>  __('messages.notification')
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
                      $result = curl_exec($ch);   
                      if ($result === FALSE){
                         die('Curl failed: ' . curl_error($ch));
                      }     
                     curl_close($ch);
                     $response[]=json_decode($result,true);
               }
              $succ=0;
              if($response){
                 foreach ($response as $k) {
                   if(isset($k['success'])){
                      $succ=$succ+$k['success'];
                    }
                 }
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
