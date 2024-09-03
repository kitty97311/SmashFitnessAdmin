<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApiController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::any("get_category",[ApiController::class,"get_category"])->name("get_category");
Route::any("get_smash",[ApiController::class,"get_smash"])->name("get_smash");
Route::any("get_sub_smash",[ApiController::class,"get_sub_smash"])->name("get_sub_smash");
Route::any("get_workout",[ApiController::class,"get_workout"])->name("get_workout");
Route::any("get_workout_set",[ApiController::class,"get_workout_set"])->name("get_workout_set");
Route::any("get_allexcercise",[ApiController::class,"get_allexcercise"])->name("get_allexcercise");
Route::any("get_exercise",[ApiController::class,"get_exercise"])->name("get_exercise");
Route::any("get_exercise_step_list",[ApiController::class,"get_exercise_step_list"])->name("get_exercise_step_list");
Route::any("get_subsmashexcercise",[ApiController::class,"get_subsmashexcercise"])->name("get_subsmashexcercise");
Route::any("user_register",[ApiController::class,"user_register"])->name("user_register");
Route::any("user_login",[ApiController::class,"user_login"])->name("user_login");
Route::any("get_set_by_category",[ApiController::class,"get_set_by_category"])->name("get_set_by_category");
Route::any("getexercisebycategory",[ApiController::class,"getexercisebycategory"])->name("getexercisebycategory");
Route::any("tokan_data",[ApiController::class,"tokan_data"])->name("tokan_data");
Route::any("get_home",[ApiController::class,"get_home"])->name("get_home");
Route::any("get_home_special",[ApiController::class,"get_home_special"])->name("get_home_special");
Route::any("get_smashplus",[ApiController::class,"get_smashplus"])->name("get_smashplus");
Route::any("get_sub_smashplus",[ApiController::class,"get_sub_smashplus"])->name("get_sub_smashplus");
Route::any("post_images",[ApiController::class,"post_images"])->name("post_images");
Route::any("post_videos",[ApiController::class,"post_videos"])->name("post_videos");
Route::any("get_userinfo",[ApiController::class,"get_userinfo"])->name("get_userinfo");
Route::any("update_password",[ApiController::class,"update_password"])->name("update_password");
Route::any("get_feed",[ApiController::class,"get_feed"])->name("get_feed");
Route::any("get_supplement",[ApiController::class,"get_supplement"])->name("get_supplement");

Route::get("about",'api\ApiController@about');
Route::get("admin_privacy",'api\ApiController@admin_privacy');