<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Post;

class HistoryController extends Controller
{
    //show all post in history
    public function index()
    {	
    	$data['posts']= Post::where('main_category_id',1)->orderBy('created_at', 'desc')->get();
        $data['founders']= Post::where('main_category_id',1)->where('sub_category_id',3)->get();
        return $data;
    }

    // show post in history by id
    public function show($id)
    {
    	$post = Post::findOrFail($id);
    	return $post;
    }
}
