<?php
namespace App\Http\Controllers;
use App\Models\Smash;
use App\Models\Week;
use App\Models\DayExercise;
use App\Models\Exercise;

use Illuminate\Http\Request;
use Session;
use DB;
use DataTables;
class SmashController extends Controller
{
    public function show_smash(){
        $session=Session::get('admin');

        if($session)
            {
                 return view('admin.Smash.default');
            }
            else
            {
                return redirect()->back()->with('error', 'You Are Not Logged In...');
            }
    }

    public function smash_datatable(){
        $smash = Smash::where('is_deleted', '0')->get();
        
        $session= Session::get('admin');
        $data = $session->email;

        return DataTables::of($smash)
            ->editColumn('id', function ($smash) {
                return $smash->id;
            })
            ->editColumn('smash_name', function ($smash) {
                return $smash->name;
            })
            ->editColumn('action', function ($smash) {
                $edit = url('edit_smash',array('id'=>$smash->id));        
                $delete = route('delete_smash', ['id'=>$smash->id]);
                return '
                    <button onclick="edit_smash('.$smash->id.')"  rel="tooltip" style="margin-right: 5px; background-color:#17a2b8;  cursor: pointer; margin-top:5px; color:white; padding:5px; border-radius: 4px;" data-original-title="edit" data-toggle="modal" data-target="#edit" class="btn btn-sm" ><i class="fa fa-edit " ><span> UPDATE</span></i></button>
                    <button onclick="delete_smash('.$smash->id.')" rel="tooltip" style="margin-right: 5px; cursor: pointer; color:white; padding:5px; border-radius: 4px; margin-top:5px;data-original-title="Remove" data-toggle="modal" data-target="#delete_smash" class="btn btn-danger btn-sm" ><i class="fa fa-trash "><span> DELETE</span></i></button>';
            })
            ->make(true);
    }

    public function add_smash(request $request){
        $user = new Smash();
        $user->name = $request->get("smash_name");
        $user->save();
        $user->id;

        Session::flash('message',"Smash Added Successfully"); 
        Session::flash('alert-class', 'alert-success');
        return redirect()->back()->with('error', 'Successfull Added');
    }

    public function edit_smash($id, Request $request){
        $data = Smash::where('id', $id)->first();
        return $data;
    }

    public function edited_smash(request $request){
        $id = $request->id;
        $data = Smash::where('id', $id)->first();

        $main_id=$request->id;
        $smash_name=$request->smash_name;

        $smash = array(
            'name'=> $smash_name
        );

        $updated = Smash::where('id', $main_id)->update($smash);
        return redirect('smash')->with('error', 'Success Updated');
    }

    public function delete_smash(request $request){
      
        $main_id=$request->id;
        $data = Smash::where('id', $main_id)->first();
        return $data;   
    }

    public function deleted_smash(request $request){
      
        $main_id=$request->id;

        $id=$request->get("id");

        $data=Smash::find($request->get("id"));
        
        $data->delete();
       
        return redirect('smash')->with('error', 'Successfull Deleted'); 
    }
}