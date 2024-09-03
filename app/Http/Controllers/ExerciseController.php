<?php

namespace App\Http\Controllers;
use App\Models\Exercise;
use App\Models\SubSmash;
use App\Models\categoryStatic;
use App\Models\ExersiceStep;

use Illuminate\Http\Request;
use Session;
use DB;
use DataTables;
class ExerciseController extends Controller
{
    public function exercise(){
        $session=Session::get('admin');

        if($session)
            {
                $data['category']= categoryStatic::get();
                $data['sub_smash']= SubSmash::where('is_deleted', '0')->get();
                return view('admin.Exercise.default',$data);
            }
            else
            {
                return redirect()->back()->with('error', 'You Are Not Loged In...');
            }
    }

    public function exercise_datatable(){
        $exercise =Exercise::where('is_deleted', '0')->get();
        
        $session= Session::get('admin');
        $data = $session->email;

        return DataTables::of($exercise)

        ->editColumn('id', function ($exercise) {
                return $exercise->id;
            })
        ->editColumn('name', function ($exercise) {
                return $exercise->name;
            })
        ->editColumn('sub_smash_name', function ($exercise) {
                if ($exercise->sub_smash_id > 0) {
                    $sub_smash= DB::table("sub_smash")->where('id', $exercise->sub_smash_id)->First();
                    $name = $sub_smash->name;
                    return $name;
                } else {
                    return '';
                }
            })
        ->editColumn('cat_name', function ($exercise) {
                if ($exercise->cat_name > 0) {
                    $category= DB::table("category")->where('id', $exercise->cat_name)->First();
                    $name = $category->name;
                    return $name;
                } else {
                    return '';
                }
            })
        ->editColumn('time', function ($exercise) { 
                return $exercise->time;
            })
       ->editColumn('image', function ($exercise) {
                return asset('storage/app/public/images/menu_item_icon')."/". $exercise->image;
            })
        ->editColumn('repeat_count', function ($exercise) {
                return  $exercise->repeat_count;
            })
        ->editColumn('url', function ($exercise) {
                return $exercise->url;
            })
            
        ->editColumn('action', function ($exercise) {
               $edit=url('edit_exercise',array('id'=>$exercise->id));        
               $delete = route('delete_exercise', ['id'=>$exercise->id]);
               $step_table=route('step_table',array('id'=>$exercise->id));

                return '
                <button onclick="edit_exercise('.$exercise->id.')"  rel="tooltip" title="" style="margin-right: 5px; background-color:#17a2b8;  cursor: pointer; margin-top:5px; color:white; padding:5px; border-radius: 4px;" data-original-title="edit_exercise" data-toggle="modal" data-target="#edit_exercise" class="btn btn-sm" ><i class="fa fa-edit " ><span> UPDATE</span></i></button>

                <button onclick="delete_exercise('.$exercise->id.')" rel="tooltip"  style="margin-right: 5px; cursor: pointer; color:white; padding:5px; border-radius: 4px; margin-top:5px;data-original-title="Remove" data-toggle="modal" data-target="#delete_exercise" class="btn btn-danger btn-sm" ><i class="fa fa-trash "><span> DELETE</span></i></button>

                <a href="'.$step_table.'" style="margin-right: 5px; background-color:#ffc107; cursor: pointer; color:white; padding:5px; border-radius: 4px; margin-top:5px;" class="btn btn-sm" ><i class="fa fa-edit " ><span> STEP</span></i></a>';
            })   
            ->make(true);
    }

     public function add_exercise(request $request){

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $picture = "Menuitem_".time() . '.' . $extension;
            $destinationPath = Storage_path("app/public/images/menu_item_icon/");
            $request->file('image')->move( $destinationPath,$picture);
            $image= $picture;
        }else{
            $image=null;
        }

        $exercise = new Exercise();
        $exercise->name=$request->get("name"); 
        $exercise->cat_name=$request->get("cat_name"); 
        $exercise->time=$request->get("time"); 
        $exercise->calories=$request->get("calories"); 
        $exercise->repeat_count=$request->get("repeat_count"); 
        $exercise->url=$request->get("url"); 
        
        //get("form name") and $user->category_name(table field name)
        $exercise->image=$image;
        $exercise->save();

        Session::flash('message',"Profile Added Successfully"); 
        Session::flash('alert-class', 'alert-success');
        return redirect()->back()->with('error', 'Successfull Added');
    }

    public function edit_exercise($id, Request $request){
        $data = Exercise::where('id', $id)->first();
        
        return $data; 
    }

    public function edited_exercise(request $request){
        $main_id=$request->id;
        $sub_smash=$request->sub_smash;
        $cat_name=$request->cat_name;
        $name=$request->name;
        $time=$request->time;
        $calories=$request->calories;
        $repeat_count=$request->repeat_count;
        $url=$request->url;

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $picture = rand().time() . '.' . $extension;
            $destinationPath = Storage_path("app/public/images/menu_item_icon/");
            $request->file('image')->move( $destinationPath,$picture);
            $image= $picture;
        }else{

            $data = Exercise::where('id', $main_id)->first();
            $image=($data->image);
        }

        $exercise = array(
            'cat_name'=> $cat_name,
            'sub_smash_id'=>$sub_smash,
            'name' => $name,
            'time' => $time,
            'calories' => $calories,
            'repeat_count' => $repeat_count,
            'url' => $url,
            'image' => $image
        );
        
        $updated = Exercise::where('id', $main_id)
                    ->update($exercise);
        return redirect('exercise')->with('error', 'Success Updeted');
    }

    public function delete_exercise(request $request){
      
        $main_id=$request->id;
        $data = Exercise::where('id', $main_id)->first();
        return $data;   
    }

    public function deleted_exercise(request $request){
      
        $main_id=$request->id;
        
        $id=$request->get("id");

        $data=Exercise::find($request->get("id"));
       
        $unlik_file = 'storage/app/public/images/menu_item_icon/'.$data->image;
        unlink($unlik_file);
           
        $data->delete();
       
        return redirect('exercise')->with('error', 'Successfull Deleted');
    }

    public function step_table($id){
        $session=Session::get('admin');
        $data['ex_id'] = $id;
        if($session)
            {
                return view('admin.Exercise.step',$data);
            }
            else
            {
                return redirect()->back()->with('error', 'You Are Not Loged In...');
            }
    }

    public function step_table_datatable($id,Request $request){

    $table = ExersiceStep::where('ex_id', $id)->get();
    $count = count($table);
    $star="";
    $i="0";
    if($count > 0){
        foreach ($table as  $value){
                        $id= $value->id;
                        $step= $value->step;
                         

                        $star=$star.'<tr id="'.$i.'" class="delete_step tbl_row">';
                        $star=$star.'
                            <input type="hidden" name="step_id[]" id="id" value="'.$id.'"/>
                              <td><textarea name="step[]" id="'.$i.'" class="form-control" placeholder="Enter Step Description">'.$step.'</textarea>
                                </td>

                              <td>
                               <a  style="padding:5px; border-radius: 4px; color: white; margin-top:5px;"   class="btn btn-danger btn-sm delete-row" ><i class="fa fa-edit " ><span> DELETE</span></i></a>

                                </td>
                       </tr>';
                $i++;
        }
    }else{
        $i=1;
        $star=$star.'<tr id="'.$i.'" class="tbl_row">
                        <input type="hidden" name="step_id[]" value="0"/>
                        <td><textarea name="step[]" id="'.$i.'" class="form-control" placeholder="Enter Step Description"></textarea>
                        </td>
                    
                        <td>
                            <button class="delete btn btn-danger" type="button" value="Delete" style="margin-right: 5px;  color:white; padding:5px; border-radius: 4px; margin-top:5px;" class="btn btn-danger btn-sm" ><i class="fa fa-trash "><span> DELETE</span></i></button>
                         </td>
                   </tr>';
    }
    $input='<input type="hidden" id="total_no" value="'.$i.'"/>';

    $arr=array("input_raw"=>$input, "table"=>$star);
    return $arr;
    }

    public function edit_step(request $request){

    $step_id = array();         
    $step_id = $request->step_id;
    $ex_id=$request->ex_id;
    $data = ExersiceStep::where('ex_id',$ex_id)->get();
   

    foreach ($data as  $value){
                    $ex_data= ExersiceStep::where('ex_id',$value->ex_id)->delete();
                }

    foreach ($step_id as $value) {
      
            $step = $request->get("step");
            $count = count($step);

            for($i=0; $i<$count; $i++){

                $ex_step = new ExersiceStep();
                $ex_step->ex_id = $request->get("ex_id");
                $ex_step->step = $request->get("step")[$i];
                $ex_step->save();
            }
       
        
                Session::flash('message',"Profile Added Successfully"); 
                Session::flash('alert-class', 'alert-success');
                return redirect()->back()->with('error', 'Successfull Updated');
    }
  }

  
}


// if($step_id != 0){

//     $step_id = array();      
//     $step_id = $request->step_id;
//     $step=$request->get("step");
//     $ex_id=$request->ex_id;
//     $count = count($step);
   
//     for($i=0; $i<$count; $i++){

//         $ios = array(
//             'id'=> $step_id[$i],
//             'ex_id'=> $ex_id,
//             'step' => $step[$i]
//         );
//         $updated = ExersiceStep::where('id', $step_id[$i])
//                     ->update($ios);
//     }
// }
// if($step_id  == 0){
//     $step = $request->get("step");
//        $count = count($step);

//         for($i=0; $i<$count; $i++){

//             $ex_step = new ExersiceStep();
//             $ex_step->ex_id = $request->get("ex_id");
//             $ex_step->step = $request->get("step")[$i];
//             $ex_step->save();
//         }
// }


//         Session::flash('message',"Profile Added Successfully"); 
//         Session::flash('alert-class', 'alert-success');
//         return redirect()->back();


//     }
// }
