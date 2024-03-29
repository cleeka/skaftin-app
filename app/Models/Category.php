<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function section(){
    	return $this->belongsTo('App\Models\Section','section_id')->select('id','name');
    }

    public function parentcategory(){
    	return $this->belongsTo('App\Models\Category','parent_id')->select('id','category_name');
    }

    public function subcategories(){
    	return $this->hasMany('App\Models\Category','parent_id')->where('status',1);
    }

    public static function categoryDetails($url){
        $categoryDetails = Category::select('id','parent_id','category_name','url')->with(['subcategories'=>function($query){
            $query->select('id','parent_id','category_name','url');
        }])->where('url',$url)->first()->toArray();
       //dd($categoryDetails);
        $catIds = array();
        $catIds[] = $categoryDetails['id'];

       if($categoryDetails['parent_id']==0){
            //only show main category in breadcrumb
        $breadcrumbs = '<li class="breadcrumb-item active">
                  <a href="'.url($categoryDetails['url']).'">'.$categoryDetails['category_name'].'</a></li>';


      }else{
            // show main and subcategory in breadcrumb
         $parentCategory = Category::select('category_name','url')->where('id',$categoryDetails['parent_id'])->first()->toArray();
         $breadcrumbs = '<li class="breadcrumb-item">
                 <a href="'.url($parentCategory['url']).'">'.$parentCategory['category_name'].'
                    </a>
                </li><li class="breadcrumb-item active">
                  <a href="'.url($categoryDetails['url']).'">'.$categoryDetails['category_name'].'
                     </a>
                 </li>';
      }

        foreach ($categoryDetails['subcategories'] as $key => $subcat) {
            $catIds[] = $subcat['id'];
        }
        $resp = array('catIds'=>$catIds,'categoryDetails'=>$categoryDetails,'breadcrumbs'=>$breadcrumbs);
        return $resp;
    }
}
