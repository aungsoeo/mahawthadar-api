<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Model\Post;

class DonationController extends Controller
{
    //
    public function index()
    {   
        $posts= Post::where('main_category_id',9)->orderBy('created_at', 'desc')->get();
        return $posts;
    }

    public function postdonate(Request $request)
    {	
    	$input = $request->all();

    	$rules = array(
		        'donator_name' => 'required',
		        'donation_title'=>'required',                       
		        'email'=> 'required|email',    
		        'detail' => 'required',
		        'date' => 'required'        
		    );

		
    	$validator = Validator::make($input, $rules);
    	
    	if ($validator->fails()) 
    	{
	        $messages = $validator->messages();
	        return $messages;

	    } else 
	    {
	       
	        $email= $request->get('email');
            $donator_name = $request->get('donator_name');
            $donation_title=$request->get('donation_title');
            $address    = $request->get('address');
            $phone = $request->get('phone_no');
            $detail = $request->get('detail');
            $photo = $request->get('photo');
            $date = $request->get('date');

            $structure= "upload/posts/";
            $photo="";
            if($request->file('photo')!=NULL){

              $file = $request->file('photo');
              
              if($file->getClientOriginalExtension()=="jpg" || $file->getClientOriginalExtension()=="jpeg" || $file->getClientOriginalExtension()=="JPG" || $file->getClientOriginalExtension()=="png" || $file->getClientOriginalExtension()=="PNG" || $file->getClientOriginalExtension()=="gif" || $file->getClientOriginalExtension()=="GIF"){
                
                $photo = $file->getClientOriginalName();
                $file->move($structure, $photo);
              }
            }

            $arr=[
                'title' => $request->get('donation_title'),
                'feature_photo' => $photo,
                'main_category_id' =>9,
                'sub_category_id'=>10,
                'short_description'=>'',
                'detail_photo'=>'',
                'detail_description' => $request->get('detail'),
                'custom_field1' => $request->get('donator_name'),
                'custom_field2' => $request->get('email'),
                'custom_field3' => $request->get('address'),
                'custom_field4' => $request->get('phone_no'),
                'custom_field5' => $request->get('date'),
            ];

            // dd($arr);
            $date = explode('/', $arr['custom_field5']);
            $arr['custom_field5'] = $date[2].'-'.$date[1].'-'.$date[0];

            $res=Post::create($arr);

	    }
        return $res;
	}    

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return $post;
    }

    public function calender()
    {
        $post = Post::getDatesForCalender();
        return $post;
    }

}
