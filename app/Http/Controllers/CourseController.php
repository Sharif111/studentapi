<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Student;
use App\Student_Course;


class CourseController extends Controller
{
	 public function createCourse(Request $request) {

	 	$course = new Course;
	    $course->course = $request->course;
	    $course->save();

	    return response()->json([
	        "message" => "Course created successfully"
	    ], 201);
  }
      



      public function getAllCourses() {

	  	$courses = Course::get()->toJson(JSON_PRETTY_PRINT);
	    return response($courses, 200);

      
   }





       public function deleteCourse ($id){

	        if(Course::where('id', $id)->exists()) {
	        $course = Course::find($id);
	        $course->delete();

	        return response()->json([
	          "message" => "Records deleted successfully"
	        ], 202);
	      } else {
	        return response()->json([
	          "message" => "Record not found"
	        ], 404);
	      }
    }


 
				        
	

}
