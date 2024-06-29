<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DepAdminController;
use App\Http\Controllers\VersionController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProgramOutcomeController;
use App\Http\Controllers\CourseProfileController;
use App\Http\Controllers\PDFController;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('/login');
});



Route::post('/login-check',[AdminController::class, 'AdminLogin']);
Route::get('/logout',[AdminController::class, 'AdminLogout']);

Route::middleware(['checkLogin'])->group(function (){

    Route::middleware(['checkRoot'])->group(function (){
        Route::get('/root/home',[AdminController::class, 'HomeRoute']);

        //Department CRUD
        Route::get('/root/create-department',[DepartmentController::class, 'DepCreate']);
        Route::post('/root/save-department',[DepartmentController::class, 'DepSave']);
        Route::get('/root/view-department',[DepartmentController::class, 'DepView']);
        Route::get('/root/edit-department/{id}',[DepartmentController::class, 'DepEdit']);
        Route::post('/root/update-department/{id}',[DepartmentController::class, 'DepUpdate']);
        Route::get('/root/delete-department/{id}',[DepartmentController::class, 'DepDelete']);


        //Department Admin CRUD
        Route::get('/root/create-dep-admin',[AdminController::class, 'AdminCreate']);
        Route::post('/root/save-dep-admin',[AdminController::class, 'AdminSave']);
        Route::get('/root/view-dep-admin',[AdminController::class, 'AdminView']);
        Route::get('/root/edit-dep-admin/{id}',[AdminController::class, 'AdminEdit']);
        Route::post('/root/update-dep-admin/{id}',[AdminController::class, 'AdminUpdate']);
        Route::get('/root/delete-dep-admin/{id}',[AdminController::class, 'AdminDelete']);



    });

    Route::middleware(['checkDep'])->group(function (){
        
        //Department Admin Home
        Route::get('/dep-admin/home',[DepAdminController::class, 'HomeRouteDep']);

        //Version CRUD
        Route::get('/dep-admin/create-version',[VersionController::class, 'VersionCreate']);
        Route::post('/dep-admin/save-version',[VersionController::class, 'VersionSave']);
        Route::get('/dep-admin/view-version',[VersionController::class, 'VersionView']);
        Route::get('/dep-admin/edit-version/{id}',[VersionController::class, 'VersionEdit']);
        Route::post('/dep-admin/update-version/{id}',[VersionController::class, 'VersionUpdate']);
        Route::get('/dep-admin/delete-version/{id}',[VersionController::class, 'VersionDelete']);

        //Course CRUD
        Route::get('/dep-admin/create-course',[CourseController::class, 'CourseCreate']);
        Route::post('/dep-admin/save-course',[CourseController::class, 'CourseSave']);
        Route::get('/dep-admin/view-course',[CourseController::class, 'CourseView']);
        Route::get('/dep-admin/edit-course/{id}',[CourseController::class, 'CourseEdit']);
        Route::post('/dep-admin/update-course/{id}',[CourseController::class, 'CourseUpdate']);
        Route::get('/dep-admin/delete-course/{id}',[CourseController::class, 'CourseDelete']);

        //PO CRUD
        Route::get('/dep-admin/create-po',[ProgramOutcomeController::class, 'POCreate']);
        Route::post('/dep-admin/save-po',[ProgramOutcomeController::class, 'POSave']);
        Route::get('/dep-admin/view-po',[ProgramOutcomeController::class, 'POView']);
        Route::get('/dep-admin/edit-po/{id}',[ProgramOutcomeController::class, 'POEdit']);
        Route::post('/dep-admin/update-po/{id}',[ProgramOutcomeController::class, 'POUpdate']);
        Route::get('/dep-admin/delete-po/{id}',[ProgramOutcomeController::class, 'PODelete']);

        //CP CRUD
        Route::get('/dep-admin/create-cp',[CourseProfileController::class, 'CPCreate']);
        Route::get('/dep-admin/create-cp-select/{id}',[CourseProfileController::class, 'CPCreateSelect']);
        Route::post('/dep-admin/save-cp-select/{id}',[CourseProfileController::class, 'CPSave']);
        Route::get('/dep-admin/view-cp',[CourseProfileController::class, 'CPView']);
        Route::get('/dep-admin/edit-cp/{id}',[CourseProfileController::class, 'CPEdit']);
        Route::get('/dep-admin/delete-cp/{id}',[CourseProfileController::class, 'CPDelete']);

        //Edit/Update Course Objective
        Route::get('/dep-admin/edit-cp-obj/{id}',[CourseProfileController::class, 'CPEditObjective']);
        Route::post('/dep-admin/update-cp-obj/{id}',[CourseProfileController::class, 'CPUpdateObjective']);

        //Edit/Update Course Outcome
        Route::get('/dep-admin/edit-cp-out/{id}',[CourseProfileController::class, 'CPEditOutcome']);
        Route::post('/dep-admin/update-cp-out/{id}',[CourseProfileController::class, 'CPUpdateOutcome']);

        //Edit/Update Course Rational
        Route::get('/dep-admin/edit-cp-rtn/{id}',[CourseProfileController::class, 'CPEditRational']);
        Route::post('/dep-admin/update-cp-rtn/{id}',[CourseProfileController::class, 'CPUpdateRational']);

        //PDF
        Route::get('/dep-admin/generate-pdf/{id}',[PDFController::class,'GeneratePDF']);
        Route::get('/dep-admin/download-pdf/{id}',[PdfController::class,'DownloadPDF']);

    }); 
});







