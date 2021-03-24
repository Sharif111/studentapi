<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{

	 public function createStudent(Request $request) {

	 	$student = new Student;
	    $student->name = $request->name;
	    $student->email = $request->email;
	    $student->gender = $request->gender;
	    $student->address = $request->address;
	    $student->phone = $request->phone;
	    $student->save();

	    return response()->json([
	        "message" => "student record created"
	    ], 201);
  }
      



      public function getAllStudents() {

	  	$students = Student::get()->toJson(JSON_PRETTY_PRINT);
	    return response($students, 200);

      
  }





       public function updateStudent(Request $request, $id) {

	       	 if (Student::where('id', $id)->exists()) {

	        $student = Student::find($id);
	        $student->name = is_null($request->name) ? $student->name : $request->name;
	        $student->email = is_null($request->email) ? $student->email : $request->email;
	        $student->gender = is_null($request->gender) ? $student->gender : $request->gender;
	        $student->address = is_null($request->address) ? $student->address : $request->address;
	        $student->phone = is_null($request->phone) ? $student->phone : $request->phone;
	        $student->save();

	        return response()->json([
            "message" => "Student updated successfully"
            ], 200);
	        } else {
	        return response()->json([
	            "message" => "Student not found"
	        ], 404);
        
          }
      
   }



}
