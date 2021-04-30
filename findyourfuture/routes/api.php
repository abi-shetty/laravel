<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\CollegesController;
use App\Http\Controllers\JobtypeController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\Job_ApplyController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CollegeratingController;
use App\Http\Controllers\College_CourseController;
use App\Http\Controllers\JobseekerController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TableFacultyController;
use App\Http\Controllers\Request_CourseController;
use App\Http\Controllers\Col_ImgController;
use App\Http\Controllers\Course_ApplyController;
use App\Http\Controllers\loginconroller;
use App\Http\Controllers\CompanyController;



use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//user
Route::post('UserAdd',[UserController::class,'add']);
Route::delete('Userdelete/{user_id}',[UserController::class,'delete']);
Route::post('Usershow/',[UserController::class,'show']);
Route::post('Userupdate/{user_id}',[UserController::class,'update']);


//Jobseeker
Route::post('JobseekerAdd',[JobseekerController::class,'create']);
Route::delete('Jobseekerdelete/{jseeker_id}',[JobseekerController::class,'delete']);
Route::post('Jobseekershow/',[JobseekerController::class,'show']);
Route::post('Jobseekerupdate/{jseeker_id}',[JobseekerController::class,'update']);


//student
Route::post('StudentAdd',[StudentController::class,'create']);
Route::delete('Studentdelete/{stud_id}',[StudentController::class,'delete']);
Route::post('Studentshow/',[StudentController::class,'show']);
Route::post('Studentupdate/{stud_id}',[StudentController::class,'update']);


//Table_faculty
Route::post('Table_facultyAdd',[TableFacultyController::class,'create']);
Route::delete('Table_facultydelete/{f_id}',[TableFacultyController::class,'delete']);
Route::post('Table_facultyshow/',[TableFacultyController::class,'show']);
Route::post('Table_facultyupdate/{f_id}',[TableFacultyController::class,'update']);


//college
Route::post('collegeadd',[CollegeController::class,'collegeadd']);
Route::delete('Collegesdelete/{col_id}',[CollegsController::class,'deleteclg']);
Route::post('Collegesshow/',[CollegeController::class,'showclg']);
Route::post('collegesupdate/{col_id}',[CollegeController::class,'updateclg']);


//college_rating
Route::post('collegeratingadd',[CollegeController::class,'collegeratingadd']);
Route::delete('Collegeratingdelete/{r_id}',[CollegeController::class,'delete']);
Route::post('Collegeratingshow/',[CollegeController::class,'show']);
Route::post('Collegeratingupdate/{r_id}',[CollegeController::class,'update']);


//college_course
Route::post('college_courseadd',[CollegeController::class,'college_courseadd']);
Route::delete('college_coursedelete/{cr_id}',[CollegeController::class,'deleteclgcourse']);
Route::post('college_courseshow/',[CollegeController::class,'showclgcourse']);
Route::post('college_courseupdate/{cr_id}',[CollegeController::class,'updateclgcourse']);


//request_course
Route::post('request_courseadd',[Request_CourseController::class,'request_courseadd']);
Route::delete('Request_Coursedelete/{rc_id}',[Request_CourseController::class,'delete']);
Route::post('Request_Courseshow/',[Request_CourseController::class,'show']);
Route::post('request_courseupdate/{rc_id}',[Request_CourseController::class,'update']);


//col_img
Route::post('col_imgadd',[CollegeController::class,'col_imgadd']);
Route::delete('Col_Imgdelete/{ccid}',[CollegeController::class,'deleteimg']);
Route::post('Col_Imgshow/',[CollegeController::class,'showimg']);
Route::post('Col_Imgupdate/{ccid}',[CollegeController::class,'updateimg']);


//course_apply
Route::post('course_applyadd',[Course_ApplyController::class,'course_applyadd']);
Route::delete('Course_Applydelete/{capply_id}',[Course_ApplyController::class,'delete']);
Route::post('Course_Applyshow/',[Course_ApplyController::class,'show']);
Route::post('course_applyupdate/{capply_id}',[Course_ApplyController::class,'update']);


//job
Route::post('jobadd',[CompanyController::class,'jobadd']);
Route::post('Jobshow/',[CompanyController::class,'Jobshow']);
Route::post('jobupdate/{job_id}',[CompanyController::class,'jobupdate']);
Route::delete('Jobdelete/{job_id}',[CompanyController::class,'Jobdelete']);


//job_apply
Route::post('job_applyadd',[CompanyController::class,'job_applyadd']);
Route::post('job_applyshow/',[CompanyController::class,'job_applyshow']);
Route::post('job_applyupdate/{apply_id}',[CompanyController::class,'job_applyupdate']);
Route::delete('Job-Applydelete/{apply_id}',[CompanyController::class,'Job_Applydelete']);


//companies
Route::post('add',[CompanyController::class,'add']);
//Route::get('list',[CompaniesController::class,'list']);
Route::post('Companiesshow/',[CompanyController::class,'show']);
Route::post('companiesupdate/{com_id}',[CompanyController::class,'companiesupdate']);
Route::delete('Companiesdelete/{com_id}',[CompanyController::class,'delete']);


//ADMIN
Route::post('JobTypeAdd',[AdminController::class,'jobcreate']);
Route::delete('JobTypedelete/{jt_id}',[AdminController::class,'jobdelete']);
Route::post('JobTypeshow/',[AdminController::class,'jobshow']);
Route::post('JobTypedisplay/{jt_id}',[AdminController::class,'jobdisplay']);
Route::post('JobTypeupdate/{jt_id}',[AdminController::class,'jobupdate']);


Route::post('CourseAdd',[AdminController::class,'course_create']);
Route::delete('coursedelete/{course_id}',[AdminController::class,'course_delete']);
Route::post('courseshow/',[AdminController::class,'course_show']);
Route::post('coursedisplay/{course_id}',[AdminController::class,'course_display']);
Route::post('courseupdate/{course_id}',[AdminController::class,'course_update']);

Route::post('adminlogin/',[loginconroller::class,'adminlogin']);
Route::post('userlogin',[loginconroller::class,'userlogin']);
Route::post('addadmin',[loginconroller::class,'addadmin']);


Route::post('jobadd',[JobController::class,'jobadd']);
Route::post('clgadd',[AdminController::class,'clgadd']);
