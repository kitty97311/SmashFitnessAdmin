<?php
namespace App\Http\Controllers;
use App\Models\Supplement;

use Illuminate\Http\Request;
use Session;
use DB;
use DataTables;
class SupplementController extends Controller
{
    public function show_supplement(){
        $session=Session::get('admin');

        if($session)
            {
                return view('admin.Supplement.default');
            }
        else
            {
                return redirect()->back()->with('error', 'You Are Not Logged In...');
            }
    }

    public function supplement_datatable(){
        $supplement = Supplement::get();

        return DataTables::of($supplement)
            ->editColumn('id', function ($supplement) {
                return $supplement->id;
            })
            ->editColumn('supplement_name', function ($supplement) {
                return $supplement->name;
            })
            ->editColumn('supplement_description', function ($supplement) {
                return $supplement->description;
            })
            ->editColumn('supplement_image1', function ($supplement) {
                return asset('storage/app/public/images/supplement')."/". $supplement->image1;
            })
            ->editColumn('supplement_image2', function ($supplement) {
                if ($supplement->image2 == null) return null;
                return asset('storage/app/public/images/supplement')."/". $supplement->image2;
            })
            ->editColumn('supplement_image3', function ($supplement) {
                if ($supplement->image3 == null) return null;
                return asset('storage/app/public/images/supplement')."/". $supplement->image3;
            })
            ->editColumn('supplement_price', function ($supplement) {
                return $supplement->price;
            })
            ->editColumn('supplement_rating', function ($supplement) {
                return $supplement->rating;
            })
            ->editColumn('action', function ($supplement) {
                $edit = url('edit_supplement',array('id'=>$supplement->id));        
                $delete = route('delete_supplement', ['id'=>$supplement->id]);
                return '
                    <button onclick="edit_supplement('.$supplement->id.')"  rel="tooltip" style="margin-right: 5px; background-color:#17a2b8;  cursor: pointer; margin-top:5px; color:white; padding:5px; border-radius: 4px;" data-original-title="edit" data-toggle="modal" data-target="#edit" class="btn btn-sm" ><i class="fa fa-edit " ><span> UPDATE</span></i></button>
                    <button onclick="delete_supplement('.$supplement->id.')" rel="tooltip" style="margin-right: 5px; cursor: pointer; color:white; padding:5px; border-radius: 4px; margin-top:5px;data-original-title="Remove" data-toggle="modal" data-target="#delete_supplement" class="btn btn-danger btn-sm" ><i class="fa fa-trash "><span> DELETE</span></i></button>';
            })
            ->make(true);
    }

    public function add_supplement(request $request){
        if($request->hasFile('supplement_image1'))
        {
            $file = $request->file('supplement_image1');
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $picture = "supplement_1_".time() . '.' . $extension;
            $destinationPath = Storage_path("app/public/images/supplement");
            $request->file('supplement_image1')->move($destinationPath, $picture);
            $image1= $picture;
        }else{
            $image1=null;
        }

        if($request->hasFile('supplement_image2'))
        {
            $file = $request->file('supplement_image2');
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $picture = "supplement_2_".time() . '.' . $extension;
            $destinationPath = Storage_path("app/public/images/supplement");
            $request->file('supplement_image2')->move($destinationPath, $picture);
            $image2= $picture;
        }else{
            $image2=null;
        }

        if($request->hasFile('supplement_image3'))
        {
            $file = $request->file('supplement_image3');
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $picture = "supplement_3_".time() . '.' . $extension;
            $destinationPath = Storage_path("app/public/images/supplement");
            $request->file('supplement_image3')->move($destinationPath, $picture);
            $image3= $picture;
        }else{
            $image3=null;
        }

        $supplement = new Supplement();
        $supplement->name = $request->get("supplement_name");
        if ($request->get("supplement_description") != null) $supplement->description = $request->get("supplement_description");
        $supplement->image1 = $image1;
        $supplement->image2 = $image2;
        $supplement->image3 = $image3;
        if ($request->get("supplement_price") != null) $supplement->price = $request->get("supplement_price");
        if ($request->get("supplement_rating") != null) $supplement->rating = $request->get("supplement_rating");
        $supplement->save();
        $supplement->id;

        Session::flash('message',"Supplement Added Successfully"); 
        Session::flash('alert-class', 'alert-success');
        return redirect()->back()->with('error', 'Successful Added');
    }

    public function edit_supplement($id, Request $request){
        $data = Supplement::where('id', $id)->first();
        return $data;
    }

    public function edited_supplement(request $request){
        $id = $request->id;
        $data = Supplement::where('id', $id)->first();

        $main_id=$request->id;
        $name=$request->supplement_name;
        $description=$request->supplement_description;
        $price=$request->supplement_price;
        $rating=$request->supplement_rating;
        if($request->hasFile('supplement_image1'))
        {
            $file = $request->file('supplement_image1');
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $picture = "supplement_1_".time() . '.' . $extension;
            $destinationPath = Storage_path("app/public/images/supplement");
            $request->file('supplement_image1')->move( $destinationPath, $picture);
            $image1 = $picture;
        } else {
            $data = Supplement::where('id', $main_id)->first();
            $image1 = $data->image1;
        }
        if($request->hasFile('supplement_image2'))
        {
            $file = $request->file('supplement_image2');
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $picture = "supplement_2_".time() . '.' . $extension;
            $destinationPath = Storage_path("app/public/images/supplement");
            $request->file('supplement_image2')->move( $destinationPath, $picture);
            $image2 = $picture;
        } else {
            $data = Supplement::where('id', $main_id)->first();
            $image2 = $data->image2;
        }
        if($request->hasFile('supplement_image3'))
        {
            $file = $request->file('supplement_image3');
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $picture = "supplement_3_".time() . '.' . $extension;
            $destinationPath = Storage_path("app/public/images/supplement");
            $request->file('supplement_image3')->move( $destinationPath, $picture);
            $image3 = $picture;
        } else {
            $data = Supplement::where('id', $main_id)->first();
            $image3 = $data->image3;
        }


        $supplement = array(
            'name'=> $name,
            'description'=> $description,
            'price'=> $price,
            'rating'=> $rating,
            'image1' => $image1,
            'image2' => $image2,
            'image3' => $image3
        );

        $updated = Supplement::where('id', $main_id)->update($supplement);
        return redirect('supplement')->with('error', 'Success Updated');
    }

    public function delete_supplement(request $request){
      
        $main_id=$request->id;
        $data = Supplement::where('id', $main_id)->first();
        return $data;   
    }

    public function deleted_supplement(request $request){
      
        $main_id=$request->id;

        $id=$request->get("id");

        $data=Supplement::find($request->get("id"));

        $file1 = public_path('storage/app/public/images/supplement/'.$data->image1);
        if (!file_exists($file1)) {
        } else {
            unlink($file1);
        }
        $file2 = public_path('storage/app/public/images/supplement/'.$data->image2);
        if (!file_exists($file2)) {
        } else {
            unlink($file2);
        }
        $file3 = public_path('storage/app/public/images/supplement/'.$data->image3);
        if (!file_exists($file3)) {
        } else {
            unlink($file3);
        }

        $data->delete();
       
        return redirect('supplement')->with('error', 'Successful Deleted'); 
    }
}