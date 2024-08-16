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

Route::post('register', 'App\Http\Controllers\UserController@register');
Route::post('register_with_password', 'App\Http\Controllers\UserController@register_with_password');

Route::post('signin', 'App\Http\Controllers\UserController@signin');

Route::get('getinfo/{usertype}/{id}', 'App\Http\Controllers\UserController@getInfo');
Route::post('/updateUser', [App\Http\Controllers\UserController::class, 'updateUser'])
->name('updateUser');

Route::get('notices', 'App\Http\Controllers\NoticeController@get_notices')->name('get_notices');

Route::get('get/majlishe_shuras', 'App\Http\Controllers\MajlisheShuraController@get_majlishe_shuras_data')->name('get_majlishe_shuras_data');


Route::get('get/foundation_committees', 
    'App\Http\Controllers\FoundationCommitteeController@get_foundation_committees_data')->name(
        'get_foundation_committees_data');


Route::get('get/fujala_high_committees', 
    'App\Http\Controllers\FujalaHighCommitteeController@get_fujala_high_committees_data')->name(
        'fujala_high_committees_data');



Route::get('get/majlishe_shuras_indiv/{id}', 'App\Http\Controllers\MajlisheShuraController@get_majlishe_shuras_data_indiv')->name('get_majlishe_shuras_data_indiv');

Route::get('get/foundation_committees_indiv/{id}', 
    'App\Http\Controllers\FoundationCommitteeController@get_foundation_committees_data_indiv')->name(
    'get_foundation_committees_data_indiv');



Route::get('get/fujala_high_committees_indiv/{id}', 
    'App\Http\Controllers\FujalaHighCommitteeController@get_fujala_high_committees_data_indiv')->name(
    'get_fujala_high_committees_data_indiv');

Route::get('get/teachers_staff/{current_or_ex}', 
    'App\Http\Controllers\TeacherStaffController@get_teachers_staff')->name('get_teachers_staff_current');

Route::get('get/teachers_staff_indiv/{id}', 
    'App\Http\Controllers\TeacherStaffController@get_teachers_staff_indiv')->name('get_teachers_staff_indiv');

Route::get('get/activities/{activity_type}', 
    'App\Http\Controllers\FoundationActivityController@get_activities')->name('get_activities');

Route::get('get/activity_indiv/{id}', 
    'App\Http\Controllers\FoundationActivityController@get_activity_indiv')->name('get_activity_indiv');


Route::get('/job/insert', [App\Http\Controllers\JobController::class, 'store'])
->name('insertJob');

Route::get('/jobs/all', [App\Http\Controllers\JobController::class, 'show_jobs_all'])
->name('show_jobs_all');


Route::get('/job/details/{id}', [App\Http\Controllers\JobController::class, 'job_detail_for_api'])
->name('job_detail_for_api');

Route::get('/aboutus/get', [App\Http\Controllers\InfoController::class, 'aboutus_get_api'])
->name('aboutus_get_api');

Route::get('/mission/get', [App\Http\Controllers\InfoController::class, 'mission_get_api'])
->name('mission_get_api');

Route::get('/vision/get', [App\Http\Controllers\InfoController::class, 'vision_get_api'])
->name('vision_get_api');

Route::get('/contactus/get', [App\Http\Controllers\InfoController::class, 'contactus_get_api'])
->name('contactus_get_api');

Route::post('/question/insert', [App\Http\Controllers\QuestionController::class, 'store'])
->name('insert_question');

Route::get('/questions/all', [App\Http\Controllers\QuestionController::class, 'all_questions'])
->name('all_questions');

Route::get('get/question_indiv/{id}', 
    'App\Http\Controllers\QuestionController@get_question_indiv')->name('get_question_indiv');

Route::post('/answer/insert', [App\Http\Controllers\QuestionController::class, 'insert_answer'])
->name('insert_answer');

Route::post('/search_majlishe_shura', [App\Http\Controllers\MajlisheShuraController::class, 
    'search_majlishe_shura'])
->name('search_majlishe_shura');


Route::post('/search_foundation_committee', [App\Http\Controllers\FoundationCommitteeController::class, 
    'search_foundation_committee'])
->name('search_foundation_committee');


Route::post('/search_fujala_committee', [App\Http\Controllers\FujalaHighCommitteeController::class, 
    'search_fujala_committee'])
->name('search_fujala_committee');



Route::get('get/majlishe_shura_member_indiv/{user_id}', [App\Http\Controllers\MajlisheShuraController::class, 
    'majlishe_shura_member_indiv_info'])
->name('majlishe_shura_member_indiv_info');


Route::get('get/foundation_committee_member_indiv/{user_id}', 
    [App\Http\Controllers\FoundationCommitteeController::class, 'foundation_committee_member_indiv'])
->name('foundation_committee_member_indiv');

Route::get('get/fujala_high_committee_member_indiv/{user_id}', 
    [App\Http\Controllers\FujalaHighCommitteeController::class, 'fujala_high_committee_member_indiv'])
->name('fujala_high_committee_member_indiv');



Route::post('/feedback/insert',[App\Http\Controllers\FeedbackController::class,
    'store'])->name('feedback_insert');

Route::get('/activities/categorywise/{catId}',[App\Http\Controllers\FoundationActivityController::class,
    'activities_categorywise'])->name('activities_categorywise');

Route::get('/activity/details/{catId}',[App\Http\Controllers\FoundationActivityController::class,
    'activity_details_api'])->name('activity_details');

Route::get('/results/all',[App\Http\Controllers\ResultController::class,
    'results_all'])->name('results_all');

Route::get('/get/donor_members_by_type/{donorTypeId}',[App\Http\Controllers\DonorController::class,
    'donors_all_typewise'])->name('donors_all_typewise');

Route::get('/get_registered_categories/{userId}', [App\Http\Controllers\UserController
    ::class,
    'get_registered_categories'])->name('get_registered_categories');

