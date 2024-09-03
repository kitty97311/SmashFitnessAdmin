<?php

namespace App\Http\Controllers;
use App\Models\SubCategory;
use App\Models\Category;

use Illuminate\Http\Request;
use Session;
use DB;
use DataTables;

class SubCategoryController extends Controller
{
    public function sub_category(){
        $session=Session::get('admin');

        if($session)
            {
                $data['category']= Category::where('is_deleted', '0')->get();
                return view('admin.sub_category.default',$data);
            }
            else
            {
                return redirect()->back()->with('error', 'You Are Not Loged In...');
            }
    }

    public function sub_cat_datatable(){
        $sub_category =SubCategory::get();
        
        $session= Session::get('admin');
        $data = $session->email;
        
        return DataTables::of($sub_category)

        ->editColumn('id', function ($sub_category) {
                return $sub_category->id;
            })
        ->editColumn('cat_id', function ($sub_category) {
            $category_name= DB::table("ex_category")->where('id', $sub_category->cat_id)->First();
                $name = $category_name->cat_name;
                return $name;
               
            })
        ->editColumn('cat_name', function ($sub_category) {

                return $sub_category->cat_name;
            })
        ->editColumn('description', function ($sub_category) {
        	return $sub_category->description;
        	})
        ->editColumn('level', function ($sub_category) {
                return $sub_category->level;
            })
        
        ->editColumn('cat_icon', function ($sub_category) {
                // return $sub_category->image;
                return asset('storage/app/public/images/menu_sub_icon')."/". $sub_category->cat_icon;
            })
        
                
                
        ->editColumn('action', function ($sub_category) {
               $edit=url('edit_category',array('id'=>$sub_category->id));        
               $delete = route('delete_category', ['id'=>$sub_category->id]);
                
                    return '
                    <button onclick="edit_sub_category('.$sub_category->id.')"  rel="tooltip" title="" style="margin-right: 5px; background-color:#17a2b8;  cursor: pointer; color:white; padding:5px; border-radius: 4px;" data-original-title="Remove" data-toggle="modal" data-target="#edit_category" class="btn btn-sm" ><i class="fa fa-edit " ><span> UPDATE</span></i></button></button>

                    <button onclick="delete_sub_category('.$sub_category->id.')" rel="tooltip"  style="margin-right: 5px; cursor: pointer; color:white; padding:5px; border-radius: 4px; data-original-title="Remove" data-toggle="modal" data-target="#delete_category" class="btn btn-danger btn-sm" ><i class="fa fa-trash "><span> DELETE</span></i></button>

                    ';
                            
            })  
            ->make(true);
    }

    public function add_sub_category(request $request){

        if($request->hasFile('cat_icon'))
        {
            $file = $request->file('cat_icon');
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $picture = "category_".time() . '.' . $extension;
            $destinationPath = Storage_path("app/public/images/menu_sub_icon");
            $request->file('cat_icon')->move($destinationPath,$picture);
            $image= $picture;
        }else{
            $image=null;
        }

        $sub_category = new SubCategory();
        $sub_category->cat_id=$request->get("cat_id"); 
        $sub_category->cat_name=$request->get("cat_name"); 
        $sub_category->description=$request->get("description"); 
        $sub_category->level=$request->get("level");
        //get("form name") and $user->category_name(table field name)
        $sub_category->cat_icon =$image;
        $sub_category->save();

        Session::flash('message',"Profile Added Successfully"); 
        Session::flash('alert-class', 'alert-success');
        return redirect()->back()->with('error', 'Successfull Added');
    }

    public function edit_sub_category($id,Request $request){
        $data = SubCategory::where('id', $id)->first();
        return $data;
    }

public function edited_sub_category(request $request){
        $main_id=$request->id;
        $cat_name=$request->cat_name;
        $cat_id=$request->cat_id;
        $description=$request->description;
        $level=$request->level;
        
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $picture = rand().time() . '.' . $extension;
            $destinationPath = Storage_path("app/public/images/menu_sub_icon/");
            $request->file('image')->move( $destinationPath,$picture);
            $image= $picture;
        }else{

            $data = SubCategory::where('id', $main_id)->first();
            $image=($data->cat_icon);
        }

        $exercise = array(
            'cat_id'=> $cat_id,
            'cat_name' => $cat_name,
            'description' => $description,
            'level' => $level,
            'cat_icon' => $image
        );
        
        $updated = SubCategory::where('id', $main_id)
                    ->update($exercise);
        return redirect('sub_category')->with('error', 'Success Updeted');
    }

    public function delete_sub_category(request $request){
      
        $main_id=$request->id;
        $data = SubCategory::where('id', $main_id)->first();
        return $data;   
    }

    public function deleted_sub_category(request $request){
      
        $main_id=$request->id;
        
        $id=$request->get("id");

        $data=SubCategory::find($request->get("id"));
       
        $unlik_file = 'storage/app/public/images/menu_sub_icon/'.$data->cat_icon;
        unlink($unlik_file);
           
        $data->delete();
       
        return redirect('sub_category')->with('error', 'Successfull Deleted');
    }

}
