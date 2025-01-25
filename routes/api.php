<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserAuthenticate;
use App\Http\Controllers\UserRestResourceController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/demo', function () {
    return [
        "name" => "shubham",
        "city" => "shirdi"
    ];
});

Route::group(['middleware' => "auth:sanctum"], function () {
    Route::get('/students', [StudentController::class, 'list']);
    Route::post('/add', [StudentController::class, 'AddStudents']);
    Route::put('/update', [StudentController::class, 'UpdateStudents']);
    Route::delete('delete', [StudentController::class, 'DeleteStudents']);
    Route::get('/GetSingleRecord', [StudentController::class, 'GetSingleRecord']);
});

Route::post('login', [UserAuthenticate::class, 'Login']);
Route::post('signup', [UserAuthenticate::class, 'SignUp']);
Route::get('login', [UserAuthenticate::class, 'Login'])->name('login');


// Resource controller 

Route::get('view', [UserRestResourceController::class, 'index']);
Route::post('insert', [UserRestResourceController::class, 'store']);
Route::put('update/{id}', [UserRestResourceController::class, 'update']);
Route::delete('destroy/{id}', [UserRestResourceController::class, 'destroy']);
