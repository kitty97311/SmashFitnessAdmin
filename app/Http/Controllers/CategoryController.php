<?php
namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Week;
use App\Models\DayExercise;
use App\Models\Exercise;

use Illuminate\Http\Request;
use Session;
use DB;
use DataTables;
class CategoryController extends Controller
{
    
    public function show_category(){
        $session=Session::get('admin');

        if($session)
            {
                 return view('admin.Category.default');
            }
            else
            {
                return redirect()->back()->with('error', 'You Are Not Loged In...');
            }
    }

    public function category_datatable(){
        $category =Category::where('is_deleted', '0')->get();
        
        $session= Session::get('admin');
        $data = $session->email;

        return DataTables::of($category)

        ->editColumn('id', function ($category) {
                return $category->id;
            })
        ->editColumn('cat_name', function ($category) {
                return $category->cat_name;
            })
        ->editColumn('description', function ($category) {
                return $category->description;
            })
        
        ->editColumn('level', function ($category) {
                return $category->level;
            })
        ->editColumn('cat_icon', function ($category) {
                // return $category->image;
                return asset('storage/app/public/images/menu_cat_icon')."/". $category->cat_icon;
            })
        
                
                
        ->editColumn('action', function ($category) {
               $edit=url('edit_category',array('id'=>$category->id));        
               $delete = route('delete_category', ['id'=>$category->id]);
               
                    return '
                    <button onclick="edit_category('.$category->id.')"  rel="tooltip" title="" style="margin-right: 5px; background-color:#17a2b8;  cursor: pointer; margin-top:5px; color:white; padding:5px; border-radius: 4px;" data-original-title="edit" data-toggle="modal" data-target="#edit" class="btn btn-sm" ><i class="fa fa-edit " ><span> UPDATE</span></i></button>

                    <button onclick="delete_category('.$category->id.')" rel="tooltip"  style="margin-right: 5px; cursor: pointer; color:white; padding:5px; border-radius: 4px; margin-top:5px;data-original-title="Remove" data-toggle="modal" data-target="#delete_category" class="btn btn-danger btn-sm" ><i class="fa fa-trash "><span> DELETE</span></i></button>';
            })  
            ->make(true);
       
    }

    public function add_category(request $request){
        // echo "<pre>";
        // print_r($_POST);
        // die();
        if($request->hasFile('cat_icon'))
        {
            $file = $request->file('cat_icon');
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $picture = "category_".time() . '.' . $extension;
            $destinationPath = Storage_path("app/public/images/menu_cat_icon");
            $request->file('cat_icon')->move($destinationPath,$picture);
            $image= $picture;
        }else{
            $image=null;
        }
       
        
        $user = new Category();
        $user->cat_name=$request->get("cat_name");
        $user->description=$request->get("description"); 
        $user->level=$request->get("level"); 
        $user->cat_icon=$image;
        $user->save();
        $user->id;


        Session::flash('message',"Profile Added Successfully"); 
        Session::flash('alert-class', 'alert-success');
        return redirect()->back()->with('error', 'Successfull Added');
    }

    public function edit_category($id,Request $request){
        $data = Category::where('id', $id)->first();
        return $data;
    }

    public function edited_category(request $request){
        $id = $request->id;
        $data = Category::where('id', $id)->first();
    
        $main_id=$request->id;
        $cat_name=$request->cat_name;
        $description=$request->description;
        $level=$request->level;
        
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $picture = "category_".time() . '.' . $extension;
            $destinationPath = Storage_path("app/public/images/menu_cat_icon");
            $request->file('image')->move( $destinationPath,$picture);
            $image= $picture;
        }else{

            $data = Category::where('id', $main_id)->first();
            $image=($data->cat_icon);
        }

        $catara = array(
            'cat_name'=> $cat_name,
            'description' => $description,
            'level' => $level,
            'cat_icon' =>$image
        );
        
        $updated = Category::where('id', $main_id)
                    ->update($catara);
        return redirect('category')->with('error', 'Success Updeted');
    }

   

    public function delete_category(request $request){
      
        $main_id=$request->id;
        $data = Category::where('id', $main_id)->first();
        return $data;   
    }

    public function deleted_category(request $request){
      
        $main_id=$request->id;
        
        $id=$request->get("id");

        $data=Category::find($request->get("id"));
       
        $file = public_path('storage/app/public/images/menu_cat_icon/'.$data->cat_icon);

                if(! file_exists($file)){
                  
                }else{  
                    unlink($file);
                }
        
        $data->delete();
       
        return redirect('category')->with('error', 'Successfull Deleted'); 
    }


}