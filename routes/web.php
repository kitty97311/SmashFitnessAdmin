<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthencationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DayWorkController;
use App\Http\Controllers\ExersiceSetController;
use App\Http\Controllers\SendNotificationController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SmashController;
use App\Http\Controllers\SubSmashController;
use App\Http\Controllers\SmashPlusController;
use App\Http\Controllers\SubSmashPlusController;
use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\WorkoutSetController;
use App\Http\Controllers\SupplementController;

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

Route::get('clear-cache', function () {
    Artisan::call('config:cache');
    Artisan::call('optimize:clear');
   return back();
});

Route::get("/",[AuthencationController::class,"show_login"])->name("login");
Route::any("/PostLogin",[AuthencationController::class,"PostLogin"])->name("PostLogin");
Route::get("logout",[AuthencationController::class,"logout"])->name("logout");

Route::get("Privacy-Policy",[AuthencationController::class,"privacy_front_app"]);
Route::get("accountdeletion",[AuthencationController::class,"accountdeletion"])->name("accountdeletion");

// Route::get("resetpassword/{code}",[AuthencationController::class,"resetpassword"])->name("reset-password");
// Route::any("resetnewpwd",[AuthencationController::class,"resetnewpwd"])->name("reset-new-password");

	Route::group(['middleware' => ['admincheck']], function () {
	Route::get("dashboard",[AuthencationController::class,"dashboard"])->name("dashboard");

	Route::get("category",[CategoryController::class,"show_category"])->name("category");
	Route::get("category_datatable",[CategoryController::class,"category_datatable"])->name("category_datatable");
	Route::any("add_category",[CategoryController::class,"add_category"])->name("add_category");
	Route::any("edit_category/{id}",[CategoryController::class,"edit_category"])->name("edit_category");
	Route::any("edited_category",[CategoryController::class,"edited_category"])->name("edited_category");
	Route::any("delete_category/{id}",[CategoryController::class,"delete_category"])->name("delete_category");
	Route::any("deleted_category",[CategoryController::class,"deleted_category"])->name("deleted_category");

	Route::get("smash",[SmashController::class,"show_smash"])->name("smash");
	Route::get("smash_datatable",[SmashController::class,"smash_datatable"])->name("smash_datatable");
	Route::any("add_smash",[SmashController::class,"add_smash"])->name("add_smash");
	Route::any("edit_smash/{id}",[SmashController::class,"edit_smash"])->name("edit_smash");
	Route::any("edited_smash",[SmashController::class,"edited_smash"])->name("edited_smash");
	Route::any("delete_smash/{id}",[SmashController::class,"delete_smash"])->name("delete_smash");
	Route::any("deleted_smash",[SmashController::class,"deleted_smash"])->name("deleted_smash");
	
	Route::get("sub_smash",[SubSmashController::class,"show_sub_smash"])->name("sub_smash");
	Route::get("sub_smash_datatable",[SubSmashController::class,"sub_smash_datatable"])->name("sub_smash_datatable");
	Route::any("add_sub_smash",[SubSmashController::class,"add_sub_smash"])->name("add_sub_smash");
	Route::any("edit_sub_smash/{id}",[SubSmashController::class,"edit_sub_smash"])->name("edit_sub_smash");
	Route::any("edited_sub_smash",[SubSmashController::class,"edited_sub_smash"])->name("edited_sub_smash");
	Route::any("delete_sub_smash/{id}",[SubSmashController::class,"delete_sub_smash"])->name("delete_sub_smash");
	Route::any("deleted_sub_smash",[SubSmashController::class,"deleted_sub_smash"])->name("deleted_sub_smash");

	Route::get("smashplus",[SmashPlusController::class,"show_smash"])->name("smashplus");
	Route::get("smashplus_datatable",[SmashPlusController::class,"smash_datatable"])->name("smashplus_datatable");
	Route::any("add_smashplus",[SmashPlusController::class,"add_smash"])->name("add_smashplus");
	Route::any("edit_smashplus/{id}",[SmashPlusController::class,"edit_smash"])->name("edit_smashplus");
	Route::any("edited_smashplus",[SmashPlusController::class,"edited_smash"])->name("edited_smashplus");
	Route::any("delete_smashplus/{id}",[SmashPlusController::class,"delete_smash"])->name("delete_smashplus");
	Route::any("deleted_smashplus",[SmashPlusController::class,"deleted_smash"])->name("deleted_smashplus");
	
	Route::get("sub_smashplus",[SubSmashPlusController::class,"show_sub_smash"])->name("sub_smashplus");
	Route::get("sub_smashplus_datatable",[SubSmashPlusController::class,"sub_smash_datatable"])->name("sub_smashplus_datatable");
	Route::any("add_sub_smashplus",[SubSmashPlusController::class,"add_sub_smash"])->name("add_sub_smashplus");
	Route::any("edit_sub_smashplus/{id}",[SubSmashPlusController::class,"edit_sub_smash"])->name("edit_sub_smashplus");
	Route::any("edited_sub_smashplus",[SubSmashPlusController::class,"edited_sub_smash"])->name("edited_sub_smashplus");
	Route::any("delete_sub_smashplus/{id}",[SubSmashPlusController::class,"delete_sub_smash"])->name("delete_sub_smashplus");
	Route::any("deleted_sub_smashplus",[SubSmashPlusController::class,"deleted_sub_smash"])->name("deleted_sub_smashplus");

	Route::get("workout",[WorkoutController::class,"show_workout"])->name("workout");
	Route::get("workout_datatable",[WorkoutController::class,"workout_datatable"])->name("workout_datatable");
	Route::any("add_workout",[WorkoutController::class,"add_workout"])->name("add_workout");
	Route::any("edit_workout/{id}",[WorkoutController::class,"edit_workout"])->name("edit_workout");
	Route::any("edited_workout",[WorkoutController::class,"edited_workout"])->name("edited_workout");
	Route::any("delete_workout/{id}",[WorkoutController::class,"delete_workout"])->name("delete_workout");
	Route::any("deleted_workout",[WorkoutController::class,"deleted_workout"])->name("deleted_workout");

	Route::get("workout_set",[WorkoutSetController::class,"show_workout_set"])->name("workout_set");
	Route::get("workout_set_datatable",[WorkoutSetController::class,"workout_set_datatable"])->name("workout_set_datatable");
	Route::any("add_workout_set",[WorkoutSetController::class,"add_workout_set"])->name("add_workout_set");
	Route::any("edit_workout_set/{id}",[WorkoutSetController::class,"edit_workout_set"])->name("edit_workout_set");
	Route::any("edited_workout_set",[WorkoutSetController::class,"edited_workout_set"])->name("edited_workout_set");
	Route::any("delete_workout_set/{id}",[WorkoutSetController::class,"delete_workout_set"])->name("delete_workout_set");
	Route::any("deleted_workout_set",[WorkoutSetController::class,"deleted_workout_set"])->name("deleted_workout_set");

	Route::get("supplement",[SupplementController::class,"show_supplement"])->name("supplement");
	Route::get("supplement_datatable",[SupplementController::class,"supplement_datatable"])->name("supplement_datatable");
	Route::any("add_supplement",[SupplementController::class,"add_supplement"])->name("add_supplement");
	Route::any("edit_supplement/{id}",[SupplementController::class,"edit_supplement"])->name("edit_supplement");
	Route::any("edited_supplement",[SupplementController::class,"edited_supplement"])->name("edited_supplement");
	Route::any("delete_supplement/{id}",[SupplementController::class,"delete_supplement"])->name("delete_supplement");
	Route::any("deleted_supplement",[SupplementController::class,"deleted_supplement"])->name("deleted_supplement");

	Route::any("day_exercise_datatable/{id}",[CategoryController::class,"day_exercise_datatable"])->name("day_exercise_datatable");

	Route::any("regular/{id}",[CategoryController::class,"regular"])->name("regular");
	Route::any("edit_exday/{id}",[CategoryController::class,"edit_exday"])->name("edit_exday");
	Route::any("edited_day",[CategoryController::class,"edited_day"])->name("edited_day");
	
	Route::any("edit_ex/{id}",[CategoryController::class,"edit_ex"])->name("edit_ex");
	Route::any("edited_ex",[CategoryController::class,"edited_ex"])->name("edited_ex");

	Route::get("exercise",[ExerciseController::class,"exercise"])->name("exercise");
	Route::get("exercise_datatable",[ExerciseController::class,"exercise_datatable"])->name("exercise_datatable");
	Route::any("add_exercise",[ExerciseController::class,"add_exercise"])->name("add_exercise");
	Route::any("edit_exercise/{id}",[ExerciseController::class,"edit_exercise"])->name("edit_exercise");
	Route::any("edited_exercise",[ExerciseController::class,"edited_exercise"])->name("edited_exercise");
	Route::any("delete_exercise/{id}",[ExerciseController::class,"delete_exercise"])->name("delete_exercise");
	Route::any("deleted_exercise",[ExerciseController::class,"deleted_exercise"])->name("deleted_exercise");
	
	Route::any("step_table/{id}",[ExerciseController::class,"step_table"])->name("step_table");
	Route::any("step_table_datatable/{id}",[ExerciseController::class,"step_table_datatable"])->name("step_table_datatable");
	Route::any("edit_step",[ExerciseController::class,"edit_step"])->name("edit_step");
	Route::any("delete_step/{id}",[ExerciseController::class,"delete_step"])->name("delete_step");
	Route::any("deleted_step",[ExerciseController::class,"deleted_step"])->name("deleted_step");

	Route::any("sub_category",[SubCategoryController::class,"sub_category"])->name("sub_category");
	Route::get("sub_cat_datatable",[SubCategoryController::class,"sub_cat_datatable"])->name("sub_cat_datatable");
	Route::any("add_sub_category",[SubCategoryController::class,"add_sub_category"])->name("add_sub_category");
	Route::any("edit_sub_category/{id}",[SubCategoryController::class,"edit_sub_category"])->name("edit_sub_category");
	Route::any("edited_sub_category",[SubCategoryController::class,"edited_sub_category"])->name("edited_sub_category");
	Route::any("delete_sub_category/{id}",[SubCategoryController::class,"delete_sub_category"])->name("delete_sub_category");
	Route::any("deleted_sub_category",[SubCategoryController::class,"deleted_sub_category"])->name("deleted_sub_category");

	Route::any("day_work",[DayWorkController::class,"day_work"])->name("day_work");
	Route::get("day_datatable",[DayWorkController::class,"day_datatable"])->name("day_datatable");
	Route::any("add_day",[DayWorkController::class,"add_day"])->name("add_day");
	Route::any("edit_days/{id}",[DayWorkController::class,"edit_days"])->name("edit_days");
	Route::any("edited_work",[DayWorkController::class,"edited_work"])->name("edited_work");
	Route::any("delete_work/{id}",[DayWorkController::class,"delete_work"])->name("delete_work");
	Route::any("deleted_work",[DayWorkController::class,"deleted_work"])->name("deleted_work");

	Route::any("add_ex/{id}",[DayWorkController::class,"add_ex"])->name("add_ex");
	Route::any("show_week/{id}",[DayWorkController::class,"show_week"])->name("show_week");

	Route::any("ex_set",[ExersiceSetController::class,"ex_set"])->name("ex_set");
	Route::get("ex_set_datatable",[ExersiceSetController::class,"ex_set_datatable"])->name("ex_set_datatable");
	Route::any("add_ex_set",[ExersiceSetController::class,"add_ex_set"])->name("add_ex_set");
	Route::any("edit_ex_set/{id}",[ExersiceSetController::class,"edit_ex_set"])->name("edit_ex_set");
	Route::any("edited_ex_set",[ExersiceSetController::class,"edited_ex_set"])->name("edited_ex_set");
	Route::any("delete_ex_set/{id}",[ExersiceSetController::class,"delete_ex_set"])->name("delete_ex_set");
	Route::any("deleted_ex_set",[ExersiceSetController::class,"deleted_ex_set"])->name("deleted_ex_set");

	Route::any("user",[UserController::class,"user"])->name("user");
	Route::get("user_datatable",[UserController::class,"user_datatable"])->name("user_datatable");
	Route::any("delete_user/{id}",[UserController::class,"delete_user"])->name("delete_user");
	Route::any("deleted_user",[UserController::class,"deleted_user"])->name("deleted_user");

	Route::get("send_not",[SendNotificationController::class,"send_not"])->name("send_not");
	Route::any("send_datatable",[SendNotificationController::class,"send_datatable"])->name("send_datatable");
	Route::any("add_not",[SendNotificationController::class,"add_not"])->name("add_not");

	Route::get("android_notification",[NotificationController::class,"android_notification"])->name("android_notification");
	Route::any("edit_android",[NotificationController::class,"edit_android"])->name("edit_android");

	Route::get("IOS_notification",[NotificationController::class,"IOS_notification"])->name("IOS_notification");
	Route::any("edit_ios",[NotificationController::class,"edit_ios"])->name("edit_ios");

	Route::any("about",[AboutController::class,"about"])->name("about");
	Route::any("about_edit",[AboutController::class,"about_edit"])->name("about_edit");
	Route::any("about_add",[AboutController::class,"about_add"])->name("about_add");

	Route::any("terms",[TermsController::class,"terms"])->name("terms");
	Route::any("editor_edit",[TermsController::class,"editor_edit"])->name("editor_edit");
	Route::any("editor_add",[TermsController::class,"editor_add"])->name("editor_add");

	Route::any("setting",[SettingController::class,"setting"])->name("setting");
	Route::any("pay_set",[SettingController::class,"pay_set"])->name("pay_set");
	Route::any("add/{id}",[SettingController::class,"add"])->name("add");
	Route::any("add3/{id}",[SettingController::class,"add3"])->name("add3");
	Route::any("add2/{id}",[SettingController::class,"add2"])->name("add2");
	Route::any("add1/{id}",[SettingController::class,"add1"])->name("add1");

	Route::get("Profile",[ProfileController::class,"Profile"])->name("Profile");
	Route::any("edit_Profile",[ProfileController::class,"edit_Profile"])->name("edit_Profile");
	
	
	    Route::get("about",[AuthencationController::class,"about"])->name("about");
        Route::get("Terms_condition",[AuthencationController::class,"admin_privacy"])->name("Terms_condition");
        Route::get("app_privacy",[AuthencationController::class,"app_privacy"])->name("app_privacy");
        Route::get("data_deletion",[AuthencationController::class,"data_deletion"])->name("data_deletion");
        
        Route::post("edit_about",[AuthencationController::class,"edit_about"])->name("edit_about");
        Route::post("edit_terms",[AuthencationController::class,"edit_terms"])->name("edit_terms");
        Route::post("edit_app_privacy",[AuthencationController::class,"edit_app_privacy"])->name("edit_app_privacy");
        Route::post("edit_data_deletion",[AuthencationController::class,"edit_data_deletion"])->name("edit_data_deletion");
	});









