<?php

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

/*
|--------------------------------------------------------------------------
| Index routes
|--------------------------------------------------------------------------
*/
Route::view('/', 'index');

Route::view('/about', 'about');

Route::view('/contact', 'contact');

/*
|--------------------------------------------------------------------------
| Auth routes
|--------------------------------------------------------------------------
*/

Auth::routes();

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/login/evaluator', 'Auth\LoginController@showEvaluatorLoginForm');
Route::get('/login/student', 'Auth\LoginController@showStudentLoginForm');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::get('/register/evaluator', 'Auth\RegisterController@showEvaluatorRegisterForm');
Route::get('/register/student', 'Auth\RegisterController@showStudentRegisterForm');

Route::post('/login/admin', 'Auth\LoginController@adminLogin')->middleware("throttle:5,1");
Route::post('/login/evaluator', 'Auth\LoginController@evaluatorLogin')->middleware("throttle:5,1");
Route::post('/login/student', 'Auth\LoginController@studentLogin')->middleware("throttle:5,1");
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
Route::post('/register/evaluator', 'Auth\RegisterController@createEvaluator');
Route::post('/register/student', 'Auth\RegisterController@createStudent');

/*
|--------------------------------------------------------------------------
| Resources routes
|--------------------------------------------------------------------------
*/

Route::group([
    'middleware' => ['auth:admin'],
], function () {
    Route::resource('/standardquestion', 'StandardQuestionnairesItemController');
    Route::resource('/standardquestionnaire', 'StandardQuestionnairesController');
    Route::resource('/evaluator', 'EvaluatorController');
});

Route::group([
    'middleware' => ['auth:admin,evaluator'],
], function () {
    Route::resource('/extraquestion', 'ExtraQuestionnaireItemController');
    Route::resource('/student', 'StudentController');
    Route::resource('/response', 'ResponseController');
});

Route::group([
    'middleware' => ['auth:evaluator,student'],
], function () {
    Route::resource('/evaluation', 'EvaluationController');
});

Route::group([
    'middleware' => ['auth:admin,evaluator,student'],
], function () {
    Route::resource('/evaluation', 'EvaluationController');
    
});

