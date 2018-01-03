<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Post;
use App\Model\Category;

class NewsController extends Controller
{
    //
    public function index(Request $r)
    {	
    	$posts= Post::where('main_category_id',2)->orderBy('created_at', 'desc')->get();
        $subcategory = Category::where('parent_id', 2)->get();
        if($r->get('sub')){
            $posts = $posts->where('sub_category_id',$r->get('sub'));
        }
        return $posts;
    }

    public function show($id)
    {
    	$post = Post::findOrFail($id);
    	return $post;
    }
}
