<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ProfileController;

Route::get('/team/login',[LoginController::class,'team_login']);
Route::get('/get_routes',[LoginController::class,'get_routes']);
Route::get('/get_supervisor',[SupervisorController::class,'get_supervisor']);
Route::get('/upload_thesis',[TeamController::class,'upload_thesis']);
Route::get('/thesis_remarks',[TeamController::class,'thesis_remarks']);
Route::get('/fetch_result',[TeamController::class,'fetch_result']);

Route::get('/supervisor/login',[LoginController::class,'supervisor_login']);
Route::get('/supervisor',[SupervisorController::class,'dashboard']);
Route::get('/get_thesis',[SupervisorController::class,'get_thesis']);
Route::get('/process_thesis_data',[SupervisorController::class,'process_thesis_data']);

//This Funtion Just Fetch The Thesis Data Using Team ID..
Route::get('/process_thesis',[SupervisorController::class,'process_thesis']);
Route::get('/get_approved_thesis',[SupervisorController::class,'get_approved_thesis']);

Route::get('/process_result/',[SupervisorController::class,'get_team_details']);
Route::get('/assign_marks',[SupervisorController::class,'assign_marks']);

Route::get('/profile',[ProfileController::class,'profile']);

Route::get('/change_password',[LoginController::class,'change_password']);

Route::get('/check_current_password',[LoginController::class,'check_current_password']);
Route::get('/update_password',[LoginController::class,'update_passowrd']);

?>