<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Session;
use Image;

class BrandController extends Controller
{
   public function brands(){
      Session::put('page','brands');
    	$brands = Brand::get()->toArray();
    	return view('admin.brands.brands')->with(compact('brands'));

    }

    // updateBrandStatus
    public function updateBrandStatus(Request $request){
     if($request->ajax()){
      $data = $request->all();
      if($data['status']=="Active"){
        $status = 0;
      }else{
        $status = 1;
      }
      Brand::where('id',$data['brand_id'])->update(['status'=>$status]);
      return response()->json(['status'=>$status,'brand_id'=>$data['brand_id']]);
     }
       
    }

    public function deleteBrand($id){
    	//Delete brand
    	Brand::where('id',$id)->delete();
    	$message = "Brand has been deleted successfully!";
    	return redirect()->back()->with('success_message', $message);
    }

    public function addEditBrand(Request $request,$id=null){
       Session::put('page','brands');
       if($id==""){
       	$title = "Add Brand";
       	$brand = new Brand;
       	$message ="Brand added successfully!";
       }else{
       	$title = "Edit Brand";
       	$brand = Brand::find($id);
       	$message ="Brand updated successfully!";
       }

       if($request->isMethod('post')){
       	 $data = $request->all();
       	 //echo "<pre>"; print_r($data); die;

         
         //update brand image
    		if($request->hasFile('brand_image')){
               $image_tmp = $request->file('brand_image');
               if($image_tmp->isValid()){
               	// Get image extension
               	$extension = $image_tmp->getClientOriginalExtension();
               	//Generate new image name
               	$imageName = rand(111,99999).'.'.$extension;
               	$imagePath = 'front/images/brand_images/'.$imageName;
               	// Upload the image
               	Image::make($image_tmp)->save($imagePath);

                $brand->brand_image = $imageName;
               	}
              }
         


         $brand->name = $data['brand_name'];
         $brand->status = 1;
         $brand->save();

         return redirect('admin/brands')->with('success_message',$message);
       }

       return view('admin.brands.add_edit_brand')->with(compact('title','brand'));
    }
}
