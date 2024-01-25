<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use Image;
use Session;

class SectionController extends Controller
{
    public function sections(){
      Session::put('page','sections');
    	$sections = Section::get()->toArray();
    	return view('admin.sections.sections')->with(compact('sections'));

    }

    // updateSectionStatus
    public function updateSectionStatus(Request $request){
     if($request->ajax()){
      $data = $request->all();
      if($data['status']=="Active"){
        $status = 0;
      }else{
        $status = 1;
      }
      Section::where('id',$data['section_id'])->update(['status'=>$status]);
      return response()->json(['status'=>$status,'section_id'=>$data['section_id']]);
     }
       
    }

    public function deleteSection($id){
    	//Delete section
    	Section::where('id',$id)->delete();
    	$message = "Section has been deleted successfully!";
    	return redirect()->back()->with('success_message', $message);
    }

    public function addEditSection(Request $request,$id=null){
       Session::put('page','sections');
       if($id==""){
       	$title = "Add Section";
       	$section = new Section;
       	$message ="Section added successfully!";
       }else{
       	$title = "Edit Section";
       	$section = Section::find($id);
       	$message ="Section updated successfully!";
       }

       if($request->isMethod('post')){
       	 $data = $request->all();
       	 //echo "<pre>"; print_r($data); die;

         //update brand image
        // if($request->hasFile('section_image')){
        //        $image_tmp = $request->file('section_image');
        //        if($image_tmp->isValid()){
        //         // Get image extension
        //         $extension = $image_tmp->getClientOriginalExtension();
        //         //Generate new image name
        //         $imageName = rand(111,99999).'.'.$extension;
        //         $imagePath = 'front/images/section_images/'.$imageName;
        //         // Upload the image
        //         Image::make($image_tmp)->save($imagePath);

        //         $section->section_image = $imageName;
        //         }
        //       }

         $section->name = $data['section_name'];
         $section->status = 1;
         $section->save();

         return redirect('admin/sections')->with('success_message',$message);
       }

       return view('admin.sections.add_edit_section')->with(compact('title','section'));
    }
}
