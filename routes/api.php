<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



//For Student
Route::post('students', 'StudentController@createStudent');
Route::get('students', 'StudentController@getAllStudents');
Route::put('students/{id}', 'StudentController@updateStudent');

//For Course
Route::post('course', 'CourseController@createCourse');
Route::get('course', 'CourseController@getAllCourses');
Route::delete('course/{id}', 'CourseController@deleteCourse');



//jwt
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('register', 'JWTAuthController@register');
    Route::post('login', 'JWTAuthController@login');
    Route::post('logout', 'JWTAuthController@logout');
    Route::post('refresh', 'JWTAuthController@refresh');
    Route::get('profile', 'JWTAuthController@profile');

});





