<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\slider;
use App\Models\heroimage;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Logo;

class pageController extends Controller
{
    public function index(){
        $banner = slider::orderBy('id', 'desc')->take(1)->get();
        $hero = heroimage::orderBy('id', 'desc')->take(2)->get();
        $blog = blog::orderBy('id', 'desc')->paginate(8);;
        $blogRecent = blog::orderBy('id', 'asc')->paginate(3);
        $category = Category::orderBy('id', 'desc')->get();
        $logo = Logo::orderBy('id', 'desc')->take(1)->get();
        return view('Layout.Master', compact('banner', 'hero', 'blog', 'blogRecent', 'category','logo'));
    }
}
