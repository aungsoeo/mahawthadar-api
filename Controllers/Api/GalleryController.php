<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Post;
use App\Model\Category;
class GalleryController extends Controller
{
    //
    public function index(Request $r)
    {
        $posts= Post::where('main_category_id',11)->get();
        $subcategory = Category::where('parent_id', 11)->get();

        if($r->get('sub')){
        	$posts = $posts->where('sub_category_id',$r->get('sub'));
        }
        return $posts;
    }
}
