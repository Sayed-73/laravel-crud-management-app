<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\StudentController;


//  Route::get('/',[StudentController::class,'index']);

// Route::post('/', [StudentController::class, 'store'])->name('student.store');


// use App\Http\Controllers\RegistrationController;
// use App\Models\Registration;

// Route::get('/registration', [RegistrationController::class, 'index']);
// Route::post('/registration', [RegistrationController::class, 'store'])->name('registration.store');
// // Route::get('/', function () {
// //     return view('student');
// // });
// Route::get('/student/view',[StudentController::class,'view']);



use App\Http\Controllers\UserController;
use App\Http\Controllers\UploadController;
use App\Models\User;
use App\Http\Controllers\testcontroller;
use App\Models\user_create;
use App\Http\Controllers\MyprojectController;

Route::get('/test', [testcontroller::class, 'get']);

Route::post('/test', [testcontroller::class, 'post']);
Route::view('/form ', 'test');

Route::get('/user', [UserController::class, 'index']);
Route::post('/user', [UserController::class, 'store'])->name('user.store');
Route::post('/user/create', [UserController::class, 'storeuser'])->name('user.storeuser');
Route::get('/user/view', [UserController::class, 'view']);

// Route::post('/upload', [UploadController::class, 'upload'])->name('file.upload');


Route::get('/user/edit/{id}', [UserController::class, 'edit']);
Route::put('/user-update/{id}', [UserController::class, 'update'])->name('user.update');

Route::get('/user/delete/{id}', [UserController::class, 'delete']);

Route::get('/user/status/{id}', [UserController::class, 'status']);


Route::view('/upload', 'upload');
Route::post('/upload', [UserController::class, 'upload'])->name('file.upload');


Route::post('/user{id}', [UserController::class, 'storeuser'])->name('user.create.store');


// Route::post('/create-recuter', [UserController::class, 'storeuser'])->name('recruiter.store');
// Route::view('/create-recuter', 'create-recuter-form');


// Route::middleware('auth')->group(function () {
Route::controller(UserController::class)->group(function () {
    Route::view('/create-recruiter', 'create-recruiter-form');

    Route::post('/create-recruiter', [UserController::class, 'storeuser'])->name('recruiter.store');

    Route::post('/document/upload', [UserController::class, 'uploadDocument'])->name('doc.upload');

    Route::get('/document/preview/{id}', [UserController::class, 'preview'])->name('doc.preview');

    Route::delete('/document/delete/{id}', [UserController::class, 'delete'])->name('doc.delete');
});


Route::controller(MyprojectController::class)->group(function () {
    Route::get('/myproject', 'myproject')->name('myproject');
    Route::post('/add-information', 'addinformation')->name('add.information');
    Route::post('/update-information', 'updateinformation')->name('update.information');
    Route::post('/delete-information/{id}', 'deleteinformation')->name('delete.information');
    Route::get('/search-information', 'searchinformation')->name('search.information');
    Route::post('/upload-document', 'uploaddocument')->name('upload.document');
    Route::post('/update-status/{id}', 'updatestatus')->name('update.status');
});
// Route::get('/myproject',[MyprojectController::class,'myproject'])->name('myproject');
// Route::post('/add-information',[MyprojectController::class,'addinformation'])->name('add.information');
// Route::post('/update-information',[MyprojectController::class,'updateinformation'])->name('update.information');
// Route::post('/delete-information/{id}',[MyprojectController::class,'deleteinformation'])->name('delete.information');
// Route::get('/search-information',[MyprojectController::class,'searchinformation'])->name('search.information');
// Route::post('/upload-document',[MyprojectController::class,'uploaddocument'])->name('upload.document');


Route::get('/learning', function () {
    return view('learn');
});