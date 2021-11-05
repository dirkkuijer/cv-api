<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\SkillsController;
use App\Http\Controllers\WorkController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::resource('courses', CourseController::class);
// Public Routes
Route::get('/courses', [CourseController::class, 'index']);
Route::get('/courses/{id}', [CourseController::class, 'show']);

Route::get('/educations', [EducationController::class, 'index']);
Route::get('/educations/{id}', [EducationController::class, 'show']);

Route::get('/languages', [LanguageController::class, 'index']);
Route::get('/languages/{id}', [LanguageController::class, 'show']);

Route::get('/skills', [SkillsController::class, 'index']);
Route::get('/skills/{id}', [SkillsController::class, 'show']);

Route::get('/works', [WorkController::class, 'index']);
Route::get('/works/{id}', [WorkController::class, 'show']);

// Authorisation
Route::post('/login', [AuthController::class, 'login']);

// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function() {

    // Courses
    Route::post('/courses', [CourseController::class, 'store']);
    Route::put('/courses/{id}', [CourseController::class, 'update']);
    Route::delete('/courses/{id}', [CourseController::class, 'destroy']);

    // Education
    Route::post('/educations', [EducationController::class, 'store']);
    Route::put('/educations/{id}', [EducationController::class, 'update']);
    Route::delete('/educations/{id}', [EducationController::class, 'destroy']);

    // Language
    Route::post('/languages', [LanguageController::class, 'store']);
    Route::put('/languages/{id}', [LanguageController::class, 'update']);
    Route::delete('/languages/{id}', [LanguageController::class, 'destroy']);

    // Skills
    Route::post('/skills', [SkillsController::class, 'store']);
    Route::put('/skills/{id}', [SkillsController::class, 'update']);
    Route::delete('/skills/{id}', [SkillsController::class, 'destroy']);

    // Work
    Route::post('/works', [WorkController::class, 'store']);
    Route::put('/works/{id}', [WorkController::class, 'update']);
    Route::delete('/works/{id}', [WorkController::class, 'destroy']);

    // User access
    Route::post('/logout', [AuthController::class, 'logout']);
    // I am the only one to register persons
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

    return $request->user();
});
