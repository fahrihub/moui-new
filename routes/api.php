<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SubsectionController;
use App\Http\Controllers\SectionUserController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('userauth', [UserController::class, 'getUser']);

Route::resource('employee', EmployeeController::class);

Route::resource('section', SectionController::class);

Route::resource('section.subsection', SubsectionController::class);

Route::get('schedule/export/', [ScheduleController::class, 'export']);

Route::resource('schedule', ScheduleController::class);

Route::resource('section.subsection.user', UserController::class);

Route::resource('section.user', SectionUserController::class);
