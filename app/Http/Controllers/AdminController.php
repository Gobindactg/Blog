<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\slider;
use App\Models\heroimage;
use App\Models\Category;
use App\Models\Blog;
use App\Models\Logo;
use File;
use Intervention\Image\ImageManagerStatic as Image;
use League\CommonMark\Extension\SmartPunct\SmartPunctExtension;

class AdminController extends Controller
{
    public function admin(){
        
        return view('Admin.Pages.index');
    }

    // slider section
    public function addSlider(){
        return view('Admin.Pages.addSlider');
    }

    public function sliderStore(Request $request){
       
		$blog = new slider();
        $blog->title = $request->title;
        $blog->description = $request->description;
        if ($request->hasFile('image')) {
			//   //insert that image
			$image = $request->file('image');
			$img = time() . '.' . $image->getClientOriginalExtension();
			$location = public_path('BlogImage/' . $img);
			Image::make($image)->save($location);
			$blog->image = $img;
            $blog->save();
			
		} 
     
        $blog->user_id = 1;
       
        $blog->save();
        // session()->flash('success', 'Record Has Been Added Successfully');
        return redirect()->route('addSlider');
       
        // return response()->json($blog);
    }
    public function manageSlider(){
        $slider = slider::orderBy('id', 'desc')->get();
        return view('Admin.Pages.manageSlider', compact('slider'));
    }

    public function sliderDelete($id)
    {
        $blog = slider::find($id);
        $blog->delete();
        return back();
    }
    
     // slider section

    public function addHeroImage(){
        return view('Admin.Pages.addHeroImage');
    }



    public function blog(){
        $category = Category::orderBy('id','desc')->get();
        return view('Admin.Pages.addBlog', compact('category'));
    }
      //  Blog Store

      public function blogStore(Request $request){
       
		$blog = new blog();
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->category_id = $request->category;
        if ($request->hasFile('image')) {
			//   //insert that image
			$image = $request->file('image');
			$img = time() . '.' . $image->getClientOriginalExtension();
			$location = public_path('BlogImage/' . $img);
			Image::make($image)->save($location);
			$blog->image = $img;
            $blog->save();
			
		} 
     
        $blog->user_id = 1;
       
        $blog->save();
        // session()->flash('success', 'Record Has Been Added Successfully');
        return redirect()->route('blog');
       
        // return response()->json($blog);
    }
    public function manageBlog(){
        $blogs = Blog::orderBy('id','desc')->get();
        return view('Admin.Pages.manageBlog', compact('blogs'));
    }
    public function deleteBlog($id){
        $blog = Blog::find($id);
        $blog->delete();
        return back();
    }
    public function blogUpdate($id)
    {
        $data = Blog::find($id);
        return response()->json($data);
    }
    public function categoryStore(Request $request){
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return redirect()->route('category');
    }

    public function blogPublished($id){
        $data = Blog::find($id);
        $data->status = 0;
        $data->save();
        return redirect()->route('manageBlog');

    }
    public function blogUnpublished($id){
        $data = Blog::find($id);
        $data->status = 1;
        $data->save();
        return redirect()->route('manageBlog');

    }


    public function logo(){
        return view('Admin.Pages.logo');
    }
    public function manageLogo(){
        $logo = Logo::orderBy('id','desc')->get();
        return view('Admin.Pages.manageLogo', compact('logo'));
    }
    public function logoDelete($id){
        $blog = Logo::find($id);
        $blog->delete();
        return back();
    }
    

    public function logoStore(Request $request){
       
		$logo = new Logo();
        $logo->name = $request->name;
        $logo->status = $request->status;
        if ($request->hasFile('image')) {
			//   //insert that image
			$image = $request->file('image');
			$img = time() . '.' . $image->getClientOriginalExtension();
			$location = public_path('LogoImage/' . $img);
			Image::make($image)->save($location);
			$logo->image = $img;
            $logo->save();
			
		} 
     
        $logo->user_id = 1;
       
        $logo->save();
        // session()->flash('success', 'Record Has Been Added Successfully');
        return redirect()->route('manageLogo');
       
        // return response()->json($logo);
    }


    public function category(){
        return view('Admin.Pages.addCategory');
    }
    public function manageCategory(){
        $category = Category::orderBy('id','desc')->get();
        return view('Admin.Pages.manageCategory', compact('category'));
    }
    public function categoryDelete($id){
        $blog = Category::find($id);
        $blog->delete();
        return back();
    }
   

    public function heroImageStore(Request $request){
       
		$blog = new heroimage();
        $blog->title = $request->title;
        $blog->description = $request->description;
        if ($request->hasFile('image')) {
			//   //insert that image
			$image = $request->file('image');
			$img = time() . '.' . $image->getClientOriginalExtension();
			$location = public_path('HeroImage/' . $img);
			Image::make($image)->save($location);
			$blog->image = $img;
            $blog->save();
			
		} 
     
        $blog->user_id = 1;
       
        $blog->save();
        // session()->flash('success', 'Record Has Been Added Successfully');
        return redirect()->route('addHeroImage');
       
        // return response()->json($blog);
    }

  
}
