<?php 
// use App\Http\Controllers\Api\AuthController;
// use App\Http\Controllers\Api\CourseController;
// use App\Http\Controllers\Api\EnrollmentController;


// Route::post('/auth/login', [AuthController::class, 'login']);
// Route::post('/auth/register', [AuthController::class, 'register']);
// Route::post('/auth/logout', [AuthController::class, 'logout']);
// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('/courses', [CourseController::class, 'index']);
//     Route::get('/courses/{id}', [CourseController::class, 'show']);
//     Route::post('/courses/{id}/enroll', [EnrollmentController::class, 'enroll']);
//     Route::get('/my-courses', [EnrollmentController::class, 'myCourses']);
// });


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\EnrollmentController;

Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/logout', [AuthController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/courses', [CourseController::class, 'index']);
    Route::get('/courses/{id}', [CourseController::class, 'show']);
    Route::post('/courses', [CourseController::class, 'store']);
    Route::put('/courses/{id}', [CourseController::class, 'update']);
    Route::delete('/courses/{id}', [CourseController::class, 'destroy']);
    Route::get('/courses/{id}/enrollments', [EnrollmentController::class, 'myCourses']);
    Route::post('/courses/{id}/unenroll', [EnrollmentController::class, 'unenroll']);
    Route::post('/courses/{id}/enroll', [EnrollmentController::class, 'enroll']);
    Route::get('/my-courses', [EnrollmentController::class, 'myCourses']);
});
