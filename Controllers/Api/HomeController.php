<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Post;
use App\Model\Category;

class HomeController extends Controller
{

    public function index()
    {
        $data['founders'] = Post::where('main_category_id',1)->where('sub_category_id',3)->orderby('id', 'desc')->get();
        $data['news'] = Post::where('main_category_id',2)->orderby('id', 'desc')->get();
        $data['about'] = Post::where('main_category_id',23)->where('sub_category_id',25)->orderby('id', 'asc')->get();
        $data['slider'] = Post::where('main_category_id',23)->where('sub_category_id',24)->get();

        return $data;
    }

}
