<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Student;
use Validator;


class BookingController extends Controller
{ 
    public function postbook(Request $request)
    {
    	$input = $request->all();
    	$rules = array(
		        'name' => 'required',
		        'father_name'=>'required',                          
		        'passed_school'=> 'required',
		        'roll_no' => 'required',
		        // 'email'=>'required|email|unique:student_registration_form',
		        'gender'=>'required',
		        'address'=>'required'        
		    );
  
    	$validator = Validator::make($input, $rules);

    	
    	if ($validator->fails()) 
    	{
	        $messages = $validator->messages();
	        return $messages;

	    } else 
	    {	

	        $user = Student::create($request->all());       
	        return $user;
             

	    }
    }
}

           