<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Events
Route::get('quizset1/app_list_api',[App\Http\Controllers\Api\ApiController::class,'App']);

Route::any('quizset1/category_list_by_app_id',[App\Http\Controllers\Api\ApiController::class,'Category']);

Route::post('quizset1/quiz_list_by_app_id',[App\Http\Controllers\Api\ApiController::class,'QuizCategoryList']);

Route::post('quizset1/quiz_list_by_category_id',[App\Http\Controllers\Api\ApiController::class,'QuizCategoryList']);


//quizset2

Route::get('quizset2/app_list_api',[App\Http\Controllers\Api\ApiController::class,'quizset2App']);

Route::any('quizset2/category_list_by_app_id',[App\Http\Controllers\Api\ApiController::class,'quizset2Category']);

Route::post('quizset2/sub_category_list',[App\Http\Controllers\Api\ApiController::class,'quizset2SubCategory']);

Route::post('quizset2/quizset2_list_by_category_id',[App\Http\Controllers\Api\ApiController::class,'quizset2CategoryList']);

Route::post('quizset2/quizset2_list_by_sub_category_id',[App\Http\Controllers\Api\ApiController::class,'quizset2SubCategoryList']);

Route::post('quizset2/quizset2_detail',[App\Http\Controllers\Api\ApiController::class,'quizset2']);

Route::any('quizset2/quizset2_search',[App\Http\Controllers\Api\ApiController::class,'quizset2paginate']);


//QUiz set4 
Route::get('quizset4/app_list_api',[App\Http\Controllers\Api\ApiController::class,'quizset4App']);

Route::post('quizset4/quizset4_detail',[App\Http\Controllers\Api\ApiController::class,'quizset4']);

Route::any('quizset4/quizset4_search',[App\Http\Controllers\Api\ApiController::class,'quizset4search']);


//quizset3

Route::get('quizset3/app_list_api',[App\Http\Controllers\Api\ApiController::class,'quizset3App']);

Route::any('quizset3/category_list_by_app_id',[App\Http\Controllers\Api\ApiController::class,'quizset3Category']);

Route::post('quizset3/sub_category_list',[App\Http\Controllers\Api\ApiController::class,'quizset3SubCategory']);

Route::post('quizset3/quizset3_list_by_category_id',[App\Http\Controllers\Api\ApiController::class,'quizset3CategoryList']);

Route::post('quizset3/quizset3_list_by_sub_category_id',[App\Http\Controllers\Api\ApiController::class,'quizset3SubCategoryList']);

Route::post('quizset3/quizset3_detail',[App\Http\Controllers\Api\ApiController::class,'quizset3']);

Route::any('quizset3/quizset3_search',[App\Http\Controllers\Api\ApiController::class,'quizset3paginate']);


// Route::get('Prayer/app_list_api',[App\Http\Controllers\Api\ApiController::class,'PrayerApp']);

// Route::any('Prayer/category_list_by_app_id',[App\Http\Controllers\Api\ApiController::class,'PrayerCategory']);

// Route::post('Prayer/prayer_list_by_app_id',[App\Http\Controllers\Api\ApiController::class,'PrayerEventCategoryList']);

// Route::post('Prayer/prayer_list_by_category_id',[App\Http\Controllers\Api\ApiController::class,'PrayerEventCategoryList']);

// //Calendar

// Route::get('Calendar/app_list_api',[App\Http\Controllers\Api\ApiController::class,'CalendarApp']);

// Route::any('Calendar/category_list_by_app_id',[App\Http\Controllers\Api\ApiController::class,'CalendarCategory']);

// Route::post('Calendar/calendar_list_by_app_id',[App\Http\Controllers\Api\ApiController::class,'CalendarEventCategoryList']);

// Route::post('Calendar/calendar_list_by_category_id',[App\Http\Controllers\Api\ApiController::class,'CalendarEventCategoryList']);

// Route::post('Calendar/calendar_list_last_fetched_year',[App\Http\Controllers\Api\ApiController::class,'lastFetchedYear']);


// //video

// Route::get('Video/app_list_api',[App\Http\Controllers\Api\ApiController::class,'VideoApp']);

// Route::any('Video/category_list_by_app_id',[App\Http\Controllers\Api\ApiController::class,'VideoCategory']);

// Route::post('Video/sub_category_list',[App\Http\Controllers\Api\ApiController::class,'VideoSubCategory']);

// Route::post('Video/video_list_by_category_id',[App\Http\Controllers\Api\ApiController::class,'VideoCategoryList']);


// Route::post('Video/video_list_by_sub_category_id',[App\Http\Controllers\Api\ApiController::class,'VideoSubCategoryList']);

// Route::post('Video/video_detail',[App\Http\Controllers\Api\ApiController::class,'Video']);

// Route::any('Video/video_search',[App\Http\Controllers\Api\ApiController::class,'Videopaginate']);

// Route::any('Video/video_watched_count',[App\Http\Controllers\Api\ApiController::class,'video_watched_count']);


// Route::any('Video/report_media_abuse',[App\Http\Controllers\Api\ApiController::class,'report_media_abuse']);

// //Quotes

// Route::get('Quotes/app_list_api',[App\Http\Controllers\Api\ApiController::class,'QuotesApp']);

// Route::any('Quotes/category_list_by_app_id',[App\Http\Controllers\Api\ApiController::class,'QuotesCategory']);

// Route::post('Quotes/sub_category_list',[App\Http\Controllers\Api\ApiController::class,'QuotesSubCategory']);

// Route::post('Quotes/quotes_list_by_category_id',[App\Http\Controllers\Api\ApiController::class,'QuotesCategoryList']);

// Route::post('Quotes/quotes_list_by_sub_category_id',[App\Http\Controllers\Api\ApiController::class,'QuotesSubCategoryList']);

// Route::post('Quotes/quotes_detail',[App\Http\Controllers\Api\ApiController::class,'Quotes']);

// Route::any('Quotes/quotes_search',[App\Http\Controllers\Api\ApiController::class,'Quotespaginate']);



// //Images

// Route::get('Image/app_list_api',[App\Http\Controllers\Api\ApiController::class,'ImageApp']);

// Route::any('Image/category_list_by_app_id',[App\Http\Controllers\Api\ApiController::class,'ImageCategory']);

// Route::post('Image/sub_category_list',[App\Http\Controllers\Api\ApiController::class,'ImageSubCategory']);

// Route::post('Image/images_list_by_category_id',[App\Http\Controllers\Api\ApiController::class,'ImageCategoryList']);

// Route::post('Image/images_list_by_sub_category_id',[App\Http\Controllers\Api\ApiController::class,'ImageSubCategoryList']);

// Route::post('Image/images_detail',[App\Http\Controllers\Api\ApiController::class,'Image']);

// Route::any('Image/images_search',[App\Http\Controllers\Api\ApiController::class,'Imagepaginate']);


// Route::any('Image/image_watched_count',[App\Http\Controllers\Api\ApiController::class,'image_watched_count']);


// Route::any('Image/report_media_abuse',[App\Http\Controllers\Api\ApiController::class,'image_report_media_abuse']);