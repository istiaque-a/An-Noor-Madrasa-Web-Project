<?php

use Illuminate\Support\Facades\Route;

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

$controller_path = 'App\Http\Controllers';

// Main Page Route
// Route::get('/', $controller_path . '\dashboard\Analytics@index')->name('dashboard-analytics');
// Auth::routes();
// layout
Route::get('/layouts/without-menu', $controller_path . '\layouts\WithoutMenu@index')->name('layouts-without-menu');
Route::get('/layouts/without-navbar', $controller_path . '\layouts\WithoutNavbar@index')->name('layouts-without-navbar');
Route::get('/layouts/fluid', $controller_path . '\layouts\Fluid@index')->name('layouts-fluid');
Route::get('/layouts/container', $controller_path . '\layouts\Container@index')->name('layouts-container');
Route::get('/layouts/blank', $controller_path . '\layouts\Blank@index')->name('layouts-blank');

// pages
Route::get('/pages/account-settings-account', $controller_path . '\pages\AccountSettingsAccount@index')->name('pages-account-settings-account');
Route::get('/pages/account-settings-notifications', $controller_path . '\pages\AccountSettingsNotifications@index')->name('pages-account-settings-notifications');
Route::get('/pages/account-settings-connections', $controller_path . '\pages\AccountSettingsConnections@index')->name('pages-account-settings-connections');
Route::get('/pages/misc-error', $controller_path . '\pages\MiscError@index')->name('pages-misc-error');
Route::get('/pages/misc-under-maintenance', $controller_path . '\pages\MiscUnderMaintenance@index')->name('pages-misc-under-maintenance');

// authentication
Route::get('/auth/login-basic', $controller_path . '\authentications\LoginBasic@index')->name('auth-login-basic');
Route::get('/auth/register-basic', $controller_path . '\authentications\RegisterBasic@index')->name('auth-register-basic');
Route::get('/auth/forgot-password-basic', $controller_path . '\authentications\ForgotPasswordBasic@index')->name('auth-reset-password-basic');

// cards
Route::get('/cards/basic', $controller_path . '\cards\CardBasic@index')->name('cards-basic');

// User Interface
Route::get('/ui/accordion', $controller_path . '\user_interface\Accordion@index')->name('ui-accordion');
Route::get('/ui/alerts', $controller_path . '\user_interface\Alerts@index')->name('ui-alerts');
Route::get('/ui/badges', $controller_path . '\user_interface\Badges@index')->name('ui-badges');
Route::get('/ui/buttons', $controller_path . '\user_interface\Buttons@index')->name('ui-buttons');
Route::get('/ui/carousel', $controller_path . '\user_interface\Carousel@index')->name('ui-carousel');
Route::get('/ui/collapse', $controller_path . '\user_interface\Collapse@index')->name('ui-collapse');
Route::get('/ui/dropdowns', $controller_path . '\user_interface\Dropdowns@index')->name('ui-dropdowns');
Route::get('/ui/footer', $controller_path . '\user_interface\Footer@index')->name('ui-footer');
Route::get('/ui/list-groups', $controller_path . '\user_interface\ListGroups@index')->name('ui-list-groups');
Route::get('/ui/modals', $controller_path . '\user_interface\Modals@index')->name('ui-modals');
Route::get('/ui/navbar', $controller_path . '\user_interface\Navbar@index')->name('ui-navbar');
Route::get('/ui/offcanvas', $controller_path . '\user_interface\Offcanvas@index')->name('ui-offcanvas');
Route::get('/ui/pagination-breadcrumbs', $controller_path . '\user_interface\PaginationBreadcrumbs@index')->name('ui-pagination-breadcrumbs');
Route::get('/ui/progress', $controller_path . '\user_interface\Progress@index')->name('ui-progress');
Route::get('/ui/spinners', $controller_path . '\user_interface\Spinners@index')->name('ui-spinners');
Route::get('/ui/tabs-pills', $controller_path . '\user_interface\TabsPills@index')->name('ui-tabs-pills');
Route::get('/ui/toasts', $controller_path . '\user_interface\Toasts@index')->name('ui-toasts');
Route::get('/ui/tooltips-popovers', $controller_path . '\user_interface\TooltipsPopovers@index')->name('ui-tooltips-popovers');
Route::get('/ui/typography', $controller_path . '\user_interface\Typography@index')->name('ui-typography');

// extended ui
Route::get('/extended/ui-perfect-scrollbar', $controller_path . '\extended_ui\PerfectScrollbar@index')->name('extended-ui-perfect-scrollbar');
Route::get('/extended/ui-text-divider', $controller_path . '\extended_ui\TextDivider@index')->name('extended-ui-text-divider');

// icons
Route::get('/icons/boxicons', $controller_path . '\icons\Boxicons@index')->name('icons-boxicons');

// form elements
Route::get('/forms/basic-inputs', $controller_path . '\form_elements\BasicInput@index')->name('forms-basic-inputs');
Route::get('/forms/input-groups', $controller_path . '\form_elements\InputGroups@index')->name('forms-input-groups');

// form layouts
Route::get('/form/layouts-vertical', $controller_path . '\form_layouts\VerticalForm@index')->name('form-layouts-vertical');
Route::get('/form/layouts-horizontal', $controller_path . '\form_layouts\HorizontalForm@index')->name('form-layouts-horizontal');

// tables
Route::get('/tables/basic', $controller_path . '\tables\Basic@index')->name('tables-basic');


/********************************************/
/****dashboard******/
//Route::get('/', $controller_path . '\tables\Basic@index')->name('dashboard');
Route::get('/candidates/all', $controller_path . '\tables\Basic@show_candidates')->name('show-candidates');
Route::get('/calling/all', $controller_path . '\tables\Basic@calling')->name('calling-all');
Route::get('/visa/all', $controller_path . '\tables\Basic@visa_all')->name('visa-all');
Route::get('/flight/all', $controller_path . '\tables\Basic@flight_all')->name('flight-all');

Route::get('/medical-formalities/all', $controller_path . '\tables\Basic@medicalFormalities')->name('medical-formalities-all');
Route::get('show-medical-formalities/{id}', $controller_path . '\tables\Basic@showMedicalFormalities')->name('show-medical-formalities');
Route::get('show-working/{id}', $controller_path . '\tables\Basic@showWorking')->name('show-working');
Route::get('show-calling/{id}', $controller_path . '\tables\Basic@showCalling')->name('show-calling');
Route::get('show-visa/{id}', $controller_path . '\tables\Basic@showVisa')->name('show-visa');

Route::get('show-flight/{id}', $controller_path . '\tables\Basic@showFlight')->name('show-flight');
Route::get('show-smart-card/{id}', $controller_path . '\tables\Basic@showSmartCard')->name('show-smart-card');
Route::get('show-personal-details/{id}', $controller_path . '\tables\Basic@showPersonalDetails')->name('show-personal-details');

Route::get('/working-category/all', $controller_path . '\tables\Basic@workingCategory')->name('working-category-all');
Route::get('/smart-card/all', $controller_path . '\tables\Basic@smartCard')->name('smart-card-all');
Route::get('/user/add', $controller_path . '\tables\Basic@userAdd')->name('user-add');
Route::get('/user/edit/{id}', $controller_path . '\UserController@edit')->name('user-edit');

Route::post('/user/add-now', $controller_path . '\UserController@store')->name('user-add-now');
Route::post('/user/update-now', $controller_path . '\UserController@update')->name('user-update-now');



Route::get('/agent/add', $controller_path . '\tables\Basic@agentAdd')->name('agent-add');
Route::get('/agent/all', $controller_path . '\tables\Basic@agentAll')->name('agent-all');
Route::get('/agent/edit/{id}', $controller_path . '\UserController@edit_agent')->name('edit-agent');
Route::post('/edit_agent_now', [App\Http\Controllers\UserController::class, 'edit_agent_now'])->name(
	'edit_agent_now');


// Route::post('/doc/upload', $controller_path . '\tables\Basic@docUploadNow')->name('doc-upload-now');
Route::post('/doc/my_upload_now', $controller_path . '\UserController@my_doc_upload_now')->name('my-doc-upload-now');
Route::post('/delete_thedoc_now', $controller_path . '\UserController@delete_thedoc_now')->name('delete_thedoc_now');

Route::post('/delete_passport_photo_now', $controller_path . '\UserController@delete_passport_photo_now')->name('delete_passport_photo_now');


Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/payment/create-schedule', [App\Http\Controllers\PaymentScheduleController::class, 'create'])->name('create-payment-schedule');
Route::post('/payment/create-schedule-now', [App\Http\Controllers\PaymentScheduleController::class, 'store'])->name('create-schedule-now');

Route::get('/payment/make', [App\Http\Controllers\PaymentController::class, 'create'])->name('make-payment');
Route::post('/fetch_candidates_agentwise', [App\Http\Controllers\PaymentController::class, 'fetch_candidates_agentwise'])
->name('fetch_candidates_agentwise');

Route::post('/fetch_districts_accordingly', [App\Http\Controllers\DistrictController::class, 'fetch_districts_accordingly'])->name('fetch_districts_accordingly');
Route::post('/fetch_thanas_accordingly', [App\Http\Controllers\ThanaController::class, 
	'fetch_thanas_accordingly'])->name('fetch_thanas_accordingly');

Route::get('/company-category/create', [App\Http\Controllers\CompanyCategoryController::class, 'create'])->name('create-company-category');

Route::post('/create-company-category-now', [App\Http\Controllers\CompanyCategoryController::class, 'store'])->name('create-company-category-now');

Route::get('/company-create/make', [App\Http\Controllers\CompanyController::class, 'create'])->name('create-company');


Route::post('/create-company-now', [App\Http\Controllers\CompanyController::class, 'store'])->name('create-company-now');

Route::post('/edit-company-now', [App\Http\Controllers\CompanyController::class, 'update'])->name(
	'edit-company-now');





Route::get('/company/all', [App\Http\Controllers\CompanyController::class, 'index'])->name('companies-all');

Route::get('/company/edit/{id}', [App\Http\Controllers\CompanyController::class, 'edit'])->name('company-edit');


Route::get('/user/returned', [App\Http\Controllers\UserController::class, 'return_list'])->name('return-list');

/*********************************************************************************************************/

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/teachersandstaff', [App\Http\Controllers\UserController::class, 'getTeachersAndStaff'])->name('getTeachersAndStaff');


Route::get('/fujala', [App\Http\Controllers\UserController::class, 'getFujala'])->name('getFujala')->middleware('auth');

Route::get('/students', [App\Http\Controllers\UserController::class, 'getStudents'])->name('getStudents')->middleware('auth');


Route::get('/donors', [App\Http\Controllers\UserController::class, 'getDonors'])->name('getDonors')->middleware('auth');

Route::get('/volunteers', [App\Http\Controllers\UserController::class, 'getVolunteers'])->name('getVolunteers')->middleware('auth');






Route::get('/teachersandstaffDataTable', [App\Http\Controllers\UserController::class, 'getTeachersAndStaffDataTable'])
->name('teachersAndStaffDataTable')->middleware('auth');

Route::get('/fujalaDataTable', [App\Http\Controllers\UserController::class, 'getFujalaDataTable'])
->name('fujalaDataTable');

Route::get('/studentsDataTable', [App\Http\Controllers\UserController::class, 'getStudentsDataTable'])
->name('studentsDataTable');


Route::get('/volunteersDataTable', [App\Http\Controllers\UserController::class, 'getVolunteersDataTable'])
->name('volunteersDataTable');


Route::get('/donorsDataTable', [App\Http\Controllers\UserController::class, 'getDonorsDataTable'])
->name('donorsDataTable');



Route::post('/approve_disapprove_now', [App\Http\Controllers\UserController::class, 'approveDisapproveNow'])
->name('approve_disapprove_now');

Route::get('/notice/add', [App\Http\Controllers\NoticeController::class, 'add_notice'])
->name('addNotice');

Route::get('/noticeboard', [App\Http\Controllers\NoticeController::class, 'noticeboard'])
->name('noticeboard');

Route::get('/notice/edit/{id}', [App\Http\Controllers\NoticeController::class, 'notice_edit'])
->name('noticeEdit');



Route::post('edit_notice_now',[App\Http\Controllers\NoticeController::class,'edit_notice_now'])->name('edit_notice_now');


Route::post('add_notice_now',[App\Http\Controllers\NoticeController::class,'add_notice_now'])->name('add_notice_now');

Route::get('/notice/add',[App\Http\Controllers\NoticeController::class,'notice_add'])->name('noticeAdd');

Route::get('/masjlishe-shura/add',[App\Http\Controllers\MajlisheShuraController::class,'create'])->name(
	'masjlisheShuraAdd');

Route::get('/foundation-committee/add',[App\Http\Controllers\FoundationCommitteeController::class,'create'])->name('foundationCommitteeAdd')->middleware('auth');


Route::get('/fujala-high-committee/add',[App\Http\Controllers\FujalaHighCommitteeController::class,'create'])->name('fujala-high-committee-add')->middleware('auth');


Route::post('/add_majlishe_shura_now',[App\Http\Controllers\MajlisheShuraController::class,'store'])->name('add_majlishe_shura_now');

Route::post('/add_foundation-committee_now',[App\Http\Controllers\FoundationCommitteeController::class,'store'])->name('add_foundation_committee_now');

Route::post('/add_fujala-high-committee_now',[App\Http\Controllers\FujalaHighCommitteeController::class,'store'])->name('add_fujala-high-committee_now');



Route::get('/masjlishe-shura/all',[App\Http\Controllers\MajlisheShuraController::class,
	'show_all_majlishe_shura'])->name('masjlishe-shura_all')->middleware('auth');

Route::get('/foundation-committee/all',[App\Http\Controllers\FoundationCommitteeController::class,
	'show_all_foundation_committee'])->name('foundation-committee-all')->middleware('auth');

Route::get('/fujala-high-committee/all',[App\Http\Controllers\FujalaHighCommitteeController::class,
	'show_all_fujala_high_committee'])->name('fujala-high-committee-all')->middleware('auth');


Route::get('/masjlishe-shura/indiv/{id}',[App\Http\Controllers\MajlisheShuraController::class,
	'show'])->name('masjlishe_shura_indiv');


Route::get('/foundation-committee/indiv/{id}',[App\Http\Controllers\FoundationCommitteeController::class,
	'show'])->name('foundation_committee_indiv');

Route::get('/fujala_high_committee/indiv/{id}',[App\Http\Controllers\FujalaHighCommitteeController::class,
	'show'])->name('fujala_high_committee_indiv');

Route::get('/activities/create',[App\Http\Controllers\FoundationActivityController::class,
	'create'])->name('create_activities')->middleware('auth');


Route::get('/activities',[App\Http\Controllers\FoundationActivityController::class,
	'activities_all'])->name('activities_all')->middleware('auth');


Route::get('/activity/details/{id}',[App\Http\Controllers\FoundationActivityController::class,
	'activity_details'])->name('activity_details')->middleware('auth');


Route::get('/privacy',[App\Http\Controllers\HomeController::class,
	'privacy'])->name('privacy');

Route::get('/delete-account',[App\Http\Controllers\HomeController::class,
	'delete_account'])->name('delete_account');


Route::post('/add_activity_now',[App\Http\Controllers\FoundationActivityController::class,'store'])->name(
	'add_activity_now');

Route::post('/update_majlishe_shura_now',[App\Http\Controllers\MajlisheShuraController::class,'update'])->name('update_majlishe_shura_now');

Route::post('/update_foundation_committee_now',[App\Http\Controllers\FoundationCommitteeController::class,'update'])->name('update_foundation_committee_now');

Route::post('/update_fujala_high_committee_now',[App\Http\Controllers\FujalaHighCommitteeController::class,'update'])->name('update_fujala_high_committee_now');

Route::get('/jobs/{approved}',[App\Http\Controllers\JobController::class,
	'show_jobs'])->name('show_jobs')->middleware('auth');

Route::get('/job/details/{id}',[App\Http\Controllers\JobController::class,
	'job_details'])->name('job_details')->middleware('auth');


Route::post('approve_disapprove_job_now',[App\Http\Controllers\JobController::class,
	'approve_disapprove_job_now'])->name('approve_disapprove_job_now')->middleware('auth');

Route::get('/questions/add',[App\Http\Controllers\QuestionController::class,
	'create'])->name('add_question')->middleware('auth');

Route::post('/add_question_now',[App\Http\Controllers\QuestionController::class,
	'store'])->name('add_question_now')->middleware('auth');



Route::get('/questions/all',[App\Http\Controllers\QuestionController::class,
	'all_questions'])->name('all_questions')->middleware('auth');

Route::get('/about/us/input',[App\Http\Controllers\InfoController::class,
	'about_us'])->name('aboutus_input')->middleware('auth');

Route::post('/add_aboutus_now',[App\Http\Controllers\InfoController::class,
	'add_aboutus_now'])->name('add_aboutus_now')->middleware('auth');


Route::get('/mission/input',[App\Http\Controllers\InfoController::class,
	'mission'])->name('mission_input')->middleware('auth');

Route::post('/add_mission_now',[App\Http\Controllers\InfoController::class,
	'add_mission_now'])->name('add_mission_now')->middleware('auth');




Route::get('/vision/input',[App\Http\Controllers\InfoController::class,
	'vision'])->name('vision_input')->middleware('auth');

Route::post('/add_vision_now',[App\Http\Controllers\InfoController::class,
	'add_vision_now'])->name('add_vision_now')->middleware('auth');


Route::get('/contactus/input',[App\Http\Controllers\InfoController::class,
	'contactus'])->name('contactus')->middleware('auth');

Route::post('/contactus_input_now',[App\Http\Controllers\InfoController::class,
	'contactus_input_now'])->name('contactus_input_now')->middleware('auth');

Route::get('/results/input',[App\Http\Controllers\ResultController::class,
	'create'])->name('result_create')->middleware('auth');

Route::post('/add_exam_result_now',[App\Http\Controllers\ResultController::class,
	'store'])->name('add_exam_result_now')->middleware('auth');

Route::get('/results/all',[App\Http\Controllers\ResultController::class,
	'show_all_results'])->name('show_all_results')->middleware('auth');


Route::get('/result/details/{id}',[App\Http\Controllers\ResultController::class,
	'result_details'])->name('result_details')->middleware('auth');



Route::get('/feedback',[App\Http\Controllers\FeedbackController::class,
	'feedback'])->name('feedback_all')->middleware('auth');
