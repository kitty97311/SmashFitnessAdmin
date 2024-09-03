<?php
namespace App\Http\Controllers;
use App\Models\Smash;
use App\Models\SubSmash;
use App\Models\Category;
use App\Models\Week;
use App\Models\DayExercise;
use App\Models\Exercise;

use Illuminate\Http\Request;
use Session;
use DB;
use DataTables;
class SubSmashController extends Controller
{
    public function show_sub_smash(){
        $session=Session::get('admin');

        if($session)
            {
                $data['category']= Category::where('is_deleted', '0')->get();
                $data['smash']= Smash::where('is_deleted', '0')->get();
                return view('admin.Sub_Smash.default', $data);
            }
        else
            {
                return redirect()->back()->with('error', 'You Are Not Logged In...');
            }
    }

    public function sub_smash_datatable(){
        $sub_smash = SubSmash::where('is_deleted', '0')->get();
        
        $session= Session::get('admin');
        $data = $session->email;

        return DataTables::of($sub_smash)
            ->editColumn('id', function ($sub_smash) {
                return $sub_smash->id;
            })
            ->editColumn('smash_name', function ($sub_smash) {
                if ($sub_smash->smash_id > 0) {
                    $smash_name= DB::table("smash")->where('id', $sub_smash->smash_id)->First();
                    $name = $smash_name->name;
                    return $name;
                } else {
                    return '';
                }
            })
            ->editColumn('sub_smash_name', function ($sub_smash) {
                return $sub_smash->name;
            })
            ->editColumn('level', function ($sub_smash) {
                $category_name= DB::table("ex_category")->where('id', $sub_smash->level_id)->First();
                $name = $category_name->cat_name;
                return $name;
            })
            ->editColumn('period', function ($sub_smash) {
                return $sub_smash->period;
            })
            ->editColumn('sub_smash_image', function ($sub_smash) {
                return asset('storage/app/public/images/sub_smash')."/". $sub_smash->img;
            })
            ->editColumn('action', function ($sub_smash) {
                $edit = url('edit_sub_smash',array('id'=>$sub_smash->id));        
                $delete = route('delete_sub_smash', ['id'=>$sub_smash->id]);
                return '
                    <button onclick="edit_sub_smash('.$sub_smash->id.')"  rel="tooltip" style="margin-right: 5px; background-color:#17a2b8;  cursor: pointer; margin-top:5px; color:white; padding:5px; border-radius: 4px;" data-original-title="edit" data-toggle="modal" data-target="#edit" class="btn btn-sm" ><i class="fa fa-edit " ><span> UPDATE</span></i></button>
                    <button onclick="delete_sub_smash('.$sub_smash->id.')" rel="tooltip" style="margin-right: 5px; cursor: pointer; color:white; padding:5px; border-radius: 4px; margin-top:5px;data-original-title="Remove" data-toggle="modal" data-target="#delete_sub_smash" class="btn btn-danger btn-sm" ><i class="fa fa-trash "><span> DELETE</span></i></button>';
            })
            ->make(true);
    }

    public function add_sub_smash(request $request){
        if($request->hasFile('sub_smash_image'))
        {
            $file = $request->file('sub_smash_image');
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $picture = "subsmash_".time() . '.' . $extension;
            $destinationPath = Storage_path("app/public/images/sub_smash");
            $request->file('sub_smash_image')->move($destinationPath, $picture);
            $image= $picture;
        }else{
            $image=null;
        }

        $user = new SubSmash();
        $user->name = $request->get("sub_smash_name");
        $user->level_id = $request->get("level");
        $user->period = $request->get("period");
        $user->img = $image;
        $user->save();
        $user->id;

        Session::flash('message',"Sub Smash Added Successfully"); 
        Session::flash('alert-class', 'alert-success');
        return redirect()->back()->with('error', 'Successful Added');
    }

    public function edit_sub_smash($id, Request $request){
        $data = SubSmash::where('id', $id)->first();
        return $data;
    }

    public function edited_sub_smash(request $request){
        $id = $request->id;
        $data = SubSmash::where('id', $id)->first();

        $main_id=$request->id;
        $smash=$request->smash;
        $sub_smash_name=$request->sub_smash_name;
        $period=$request->period;
        $level=$request->level;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $picture = "subsmash_".time() . '.' . $extension;
            $destinationPath = Storage_path("app/public/images/sub_smash");
            $request->file('image')->move( $destinationPath, $picture);
            $image = $picture;
        } else {
            $data = SubSmash::where('id', $main_id)->first();
            $image = $data->img;
        }


        $sub_smash = array(
            'name'=> $sub_smash_name,
            'period' => $period,
            'level_id' => $level,
            'smash_id' => $smash,
            'img' => $image
        );

        $updated = SubSmash::where('id', $main_id)->update($sub_smash);
        return redirect('sub_smash')->with('error', 'Success Updated');
    }

    public function delete_sub_smash(request $request){
      
        $main_id=$request->id;
        $data = SubSmash::where('id', $main_id)->first();
        return $data;   
    }

    public function deleted_sub_smash(request $request){
      
        $main_id=$request->id;

        $id=$request->get("id");

        $data=SubSmash::find($request->get("id"));

        $file = public_path('storage/app/public/images/sub_smash/'.$data->img);

        if (!file_exists($file)) {
        } else {
            unlink($file);
        }

        $data->delete();
       
        return redirect('sub_smash')->with('error', 'Successful Deleted'); 
    }
}