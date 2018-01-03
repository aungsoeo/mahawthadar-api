<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Contact;
use App\Mail\Email;
use App\Mail\SendEmail;
use Mail;


class ContactController extends Controller
{

    public function postContact(Request $request)
    {   

    	$input = $request->all();
    	$rules = array(
		        'name' => 'required',                       
		        'email'=> 'required|email|unique:contact_form',    
		        'comment' => 'required'      
		    );

		
    	$validator = Validator::make($input, $rules);
    	
    	if ($validator->fails()) 
    	{
	        $messages = $validator->messages();
	        return $messages;

	    } else 
	    {
	        $user= Contact::create($request->all());
             return response()->json($user, 201);
	    }

    }
}
