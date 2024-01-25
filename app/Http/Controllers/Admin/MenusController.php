<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Section;
use App\Models\Category;
use App\Models\DishsAttribute;
use App\Models\DishsImage;
use Auth;
use Session;
use Image;

class MenusController extends Controller
{
    public function menus(){
     	Session::put('page','menus');
      $adminType = Auth::guard('admin')->user()->type;
      $vendor_id = Auth::guard('admin')->user()->vendor_id;
      if($adminType=="vendor"){
        $vendorStatus = Auth::guard('admin')->user()->status;
        if($vendorStatus==0){
          return redirect("admin/update-vendor-details/personal")->with('error_message','Your account is not approved yet. Please make sure you fill in all your Personal and Bank details');
        }
      }
      $dishes = Dish::with(['section'=>function($query){
        $query->select('id','name');
      },'category'=>function($query){
        $query->select('id','category_name');}]);
      //show only vendor or admin dishs
      if($adminType=="vendor"){
        $dishes = $dishes->where('vendor_id',$vendor_id);
      }
      $dishes = $dishes->get()->toArray();
    //  dd($dishs);
      return view ('admin.menus.menus')->with(compact('dishes'));

     }

    public function updateDishStatus(Request $request){
     if($request->ajax()){
      $data = $request->all();
      if($data['status']=="Active"){
        $status = 0;
      }else{
        $status = 1;
      }
      Dish::where('id',$data['dish_id'])->update(['status'=>$status]);
      return response()->json(['status'=>$status,'dish_id'=>$data['dish_id']]);
     }
       
    }

    public function deleteDish($id){
    	//Delete dish
    	Dish::where('id',$id)->delete();
    	$message = "dish has been deleted successfully!";
    	return redirect()->back()->with('success_message', $message);
    }


    public function addEditDish(Request $request,$id=null){
      if($id==""){
        $title = "Add a dish";
        $dish = new dish;
        $dataArray = "";
        $message ="dish added successfully!";
       }else{
        $title = "Edit this dish";
        $dish = Dish::find($id);
        $dataArray = $dish->days;
        $message ="dish updated successfully!";
        
       }

       if($request->isMethod('post')){
        $data = $request->all();
        
        $request->validate([
          'days' => 'required|array|min:1',
        ]);
       // echo "<pre>"; print_r($data); die;

      // upload dish image after resize
      // small: 250x250
      // medium: 500x500
      // large: 1000x100

       if($request->hasFile('dish_image')){
        $image_tmp = $request->file('dish_image');
        if($image_tmp->isValid()){
          // Get image extension
                $extension = $image_tmp->getClientOriginalExtension();
                //Generate new image name
                $imageName = rand(111,99999).'.'.$extension;
                $largeImagePath = 'front/images/dish_images/large/'.$imageName;
                $mediumImagePath = 'front/images/dish_images/medium/'.$imageName;
                $smallImagePath = 'front/images/dish_images/small/'.$imageName;
                // Upload the large, medium, small images after resize
                Image::make($image_tmp)->resize(1000,1000)->save($largeImagePath);
                Image::make($image_tmp)->resize(500,500)->save($mediumImagePath);
                Image::make($image_tmp)->resize(250,250)->save($smallImagePath);
                // insert image name is dishes table
                $dish->dish_image = $imageName;
        }
       } 


        //save dish details in dishes table
      //  $categoryDetails = Category::find($data['category_id']);
      //  $dish->section_id = $categoryDetails['section_id'];
      //  $dish->category_id = $data['category_id'];
      
       
       $adminType = Auth::guard('admin')->user()->type;
       $vendor_id = Auth::guard('admin')->user()->vendor_id;
       $admin_id = Auth::guard('admin')->user()->id;

       $dish->admin_type = $adminType;
       $dish->admin_id = $admin_id;
       if($adminType=="vendor"){
           $dish->vendor_id = $vendor_id;
       }else{
           $dish->vendor_id = 0;
       }
       
       

       $dish->dish_name = $data['dish_name'];
       $dish->days = $data['days'];
       $dish->dish_price = $data['dish_price'];
       $dish->dish_time = $data['dish_time'];
       $dish->cut_off = $data['cut_off'];
       $dish->cancel_time = $data['cancel_time'];
       $dish->description = $data['description'];
      
       if(!empty($data['is_featured'])){
        $dish->is_featured = $data['is_featured'];
       }else{
         $dish->is_featured = "No";
       }

       $dish->status = 1;
       $dish->save();
       
        return redirect('admin/menus')->with('success_message',$message);

      }

       
        
        //Get Section with categories and subcategories
      //  $categories = Section::with('categories')->get()->toArray();
       //dd($categories);

      

       return view('admin.menus.add_edit_dish')->with(compact('title','dish','dataArray'));

    }

    public function addAttributes(Request $request, $id){
      $dish = Dish::select('id','dish_name','dish_price')->with('attributes')->find($id);
     // $dish = json_decode(json_decode($dish),true);

      if($request->isMethod('post')){
        $data = $request->all();
        //echo "<pre>"; print_r($data); die;

        foreach ($data['sku'] as $key => $value) {
          if(!empty($value)){

            //sku duplicate check
            $skuCount = DishsAttribute::where('sku',$value)->count();
            if($skuCount>0){
              return redirect()->back()->with('error_message','SKU already exists! Please add another SKU!');
            }

            $attribute = new DishsAttribute;
            $attribute->dish_id = $id;
            $attribute->sku = $value;
            $attribute->size = $data['size'][$key];
            $attribute->price = $data['price'][$key];
            $attribute->status = 1;
            $attribute->save();

          }
        }
        return redirect()->back()->with('success_message','dish Attributes has been added successfully!');
      }

      return view('admin.attributes.add_edit_attributes')->with(compact('dish'));
    }

    public function editAttributes(Request $request){
      if($request->isMethod('post')){
         $data = $request->all();
         foreach ($data['attributeId'] as $key => $attribute) {
           if(!empty($attribute)){
            DishsAttribute::where(['id'=>$data['attributeId'][$key]])->update(['price'=>$data['price'][$key],'stock'=>$data['stock'][$key]]);
           }
         }

         return redirect()->back()->with('success_message','dish Attributes has been updated successfully!');
      }
    }

    public function addImages(Request $request, $id){
      $dish = Dish::select('id','dish_name','dish_price')->with('images')->find($id);

         if($request->isMethod('post')){
          $data = $request->all();
           if($request->hasFile('images')){
            $images = $request->file('images');
           //  echo "<pre>"; print_r($images); die;
             foreach ($images as $key => $image) {
              // Generate temp image
                $image_tmp = Image::make($image);
                //Get image name
                $image_name = $image->getClientOriginalName();
                // Get image extension
                $extension = $image->getClientOriginalExtension();
                //Generate new image name
                $imageName = $image_name.rand(111,99999).'.'.$extension;
                $largeImagePath = 'front/images/dish_images/large/'.$imageName;
                $mediumImagePath = 'front/images/dish_images/medium/'.$imageName;
                $smallImagePath = 'front/images/dish_images/small/'.$imageName;
                // Upload the large, medium, small images after resize
                Image::make($image_tmp)->resize(1000,1000)->save($largeImagePath);
                Image::make($image_tmp)->resize(500,500)->save($mediumImagePath);
                Image::make($image_tmp)->resize(250,250)->save($smallImagePath);
                // insert image name is dishs table
                $image = new dishsImage;
                $image->image = $imageName;
                $image->dish_id = $id;
                $image->status = 1;
                $image->save();
            }
          }
           return redirect()->back()->with('success_message','dish Images has been Added successfully!'); 
         }


      return view('admin.images.add_images')->with(compact('dish'));

    }

     public function deleteImage($id){
      //Delete dish
      DishsImage::where('id',$id)->delete();
      $message = "Image has been deleted successfully!";
      return redirect()->back()->with('success_message', $message);
    }

     public function deleteAttribute($id){
      //Delete dish
      DishsAttribute::where('id',$id)->delete();
      $message = "Attribute has been deleted successfully!";
      return redirect()->back()->with('success_message', $message);
    }
}
