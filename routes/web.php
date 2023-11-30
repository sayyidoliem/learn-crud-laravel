<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [StudentController::class, 'index']);
Route::post('/input', [StudentController::class, 'save']);
Route::get('/update/{id}', [StudentController::class, 'updateStudent']);
Route::get('/delete/{id}', [StudentController::class, 'delete']);
Route::put('/updateAction/{id}', [StudentController::class, 'update']);
Route::get('/login', [AuthController::class, 'login']) -> middleware('alreadyLogin');
Route::get('/reg', [AuthController::class, 'register']) -> middleware('alreadyLogin');
Route::get('login-student', [AuthController::class, 'logins']);
Route::post('register-student', [AuthController::class, 'registerStudent']);
Route::get('/', [AuthController::class, 'index'])->middleware('authCheck');
Route::get('logout', [AuthController::class, 'logout']);
