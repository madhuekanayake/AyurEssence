<?php

use App\Http\Controllers\AdminArea\AdminController;
use App\Http\Controllers\AdminArea\EducationalContentController;
use App\Http\Controllers\AdminArea\FormController;
use App\Http\Controllers\AdminArea\SampleController;
use App\Http\Controllers\AdminArea\TodoController;
use App\Http\Controllers\AdminArea\EmployeeController;
use App\Http\Controllers\AdminArea\GalleryController;
use App\Http\Controllers\AdminArea\LocationController;
use App\Http\Controllers\AdminArea\ProductManagementController;
use App\Http\Controllers\AdminArea\ServiceController;
use App\Http\Controllers\AdminArea\SettingController;
use App\Http\Controllers\AdminArea\StudentController;
use App\Http\Controllers\AdminArea\TreatmentController;
use App\Http\Controllers\PublicArea\AboutUsController;
use App\Http\Controllers\PublicArea\BlogController;
use App\Http\Controllers\PublicArea\ContactUsController;
use App\Http\Controllers\PublicArea\DoctorsController;
use App\Http\Controllers\PublicArea\HomeController;

// use App\Http\Controllers\PublicArea\ServiceController;

use App\Models\Sample;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [HomeController::class, 'index']);
Route::get('/blog', [BlogController::class, 'index']);
// Route::get('/service', [ServiceController::class, 'index']);
Route::get('/aboutUs', [AboutUsController::class, 'index']);
Route::get('/contactUs', [ContactUsController::class, 'index']);
Route::get('/doctors', [DoctorsController::class, 'index']);

Route::get('/dashboard', [AdminController::class, 'index']);
Route::get('/form', [FormController::class, 'index']);
Route::get('/sample', [SampleController::class, 'index']);
Route::post('/add', [SampleController::class, 'add']);

Route::get('/todo', [TodoController::class, "index"]);
Route::post('/store', [TodoController::class, "store"]);

Route::get('/emp', [EmployeeController::class, "index"]);
Route::post('/add', [EmployeeController::class, 'store']);
Route::post('/delete', [EmployeeController::class, 'delete']);
Route::post('/update', [EmployeeController::class, 'update']);

// Route::get('/getAllStudents', [StudentController::class, "GetAllStudents"]);
//     Route::post('/addStudents', [StudentController::class, 'AddStudents']);
// Route::post('/deleteStudents', [StudentController::class, 'DeleteStudents']);
// Route::post('/updateStudents', [StudentController::class, 'UpdateStudents']);


Route::prefix('Student')->group(function () {

    Route::get('/all', [StudentController::class, "All"])->name('Student.all');
    Route::post('/add', [StudentController::class, 'Add'])->name('Student.add');
    Route::post('/delete', [StudentController::class, 'Delete'])->name('Student.delete');
    Route::post('/update', [StudentController::class, 'Update'])->name('Student.update');
});

Route::prefix('Gallery')->group(function () {

    Route::get('/all', [GalleryController::class, "All"])->name('Gallery.all');
    Route::post('/add', [GalleryController::class, 'Add'])->name('Gallery.add');
    Route::post('/delete', [GalleryController::class, 'Delete'])->name('Gallery.delete');
    Route::post('/update', [GalleryController::class, 'Update'])->name('Gallery.update');
});

Route::prefix('Service')->group(function () {

    Route::get('/all', [ServiceController::class, "All"])->name('Service.all');
    Route::post('/add', [ServiceController::class, 'Add'])->name('Service.add');
    Route::post('/delete', [ServiceController::class, 'Delete'])->name('Service.delete');
    Route::post('/update', [ServiceController::class, 'Update'])->name('Service.update');
});

Route::prefix('Setting')->group(function () {

    Route::get('/all', [SettingController::class, "All"])->name('Setting.all');
    Route::post('/add', [SettingController::class, 'Add'])->name('Setting.add');
    Route::post('/delete', [SettingController::class, 'Delete'])->name('Setting.delete');
    Route::post('/update', [SettingController::class, 'Update'])->name('Setting.update');
    Route::get('/status/{id}', [SettingController::class, 'Status'])->name('Setting.status');


    Route::get('/userRoleAll', [SettingController::class, 'UserRoleAll'])->name('Setting.userRoleAll');
    Route::post('/userRoleAdd', [SettingController::class, 'UserRoleAdd'])->name('Setting.userRoleAdd');
    Route::post('/userRoleUpdate', [SettingController::class, 'UserRoleUpdate'])->name('Setting.userRoleUpdate');
    Route::post('/userRoleDelete', [SettingController::class, 'UserRoleDelete'])->name('Setting.userRoleDelete');
    Route::get('/userRoleStatus/{id}', [SettingController::class, 'UserRoleStatus'])->name('Setting.userRoleStatus');
});

Route::prefix('Location')->group(function () {

    Route::get('/herbalGardenAll', [LocationController::class, "HerbalGardenAll"])->name('Location.herbalGardenAll');
    Route::post('/herbalGardenAdd', [LocationController::class, 'HerbalGardenAdd'])->name('Location.herbalGardenAdd');
    Route::post('/herbalGardenDelete', [LocationController::class, 'HerbalGardenDelete'])->name('Location.herbalGardenDelete');
    Route::post('/herbalGardenUpdate', [LocationController::class, 'HerbalGardenUpdate'])->name('Location.herbalGardenUpdate');

    Route::post('/GardenImageAdd', [LocationController::class, 'GardenImageAdd'])->name('Location.gardenImageAdd');

    Route::get('/viewGardenImageAll/{gardenId}', [LocationController::class, "ViewGardenImageAll"])->name('Location.viewGardenImageAll');
    Route::post('/viewGardenImageDelete', [LocationController::class, 'ViewGardenImageDelete'])->name('Location.viewGardenImageDelete');

    Route::get('/ayurvedicHospitalAll', [LocationController::class, "AyurvedicHospitalAll"])->name('Location.ayurvedicHospitalAll');
    Route::post('/ayurvedicHospitalAdd', [LocationController::class, 'AyurvedicHospitalAdd'])->name('Location.ayurvedicHospitalAdd');
    Route::post('/ayurvedicHospitalDelete', [LocationController::class, 'AyurvedicHospitalDelete'])->name('Location.ayurvedicHospitalDelete');
    Route::post('/ayurvedicHospitalUpdate', [LocationController::class, 'AyurvedicHospitalUpdate'])->name('Location.ayurvedicHospitalUpdate');

    Route::post('/ayurvedicHospitalImageAdd', [LocationController::class, 'AyurvedicHospitalImageAdd'])->name('Location.ayurvedicHospitalImageAdd');


    Route::get('/viewAyurvedicHospitalImageAll/{ayurvedicHospitalId}', [LocationController::class, "ViewAyurvedicHospitalImageAll"])->name('Location.viewAyurvedicHospitalImageAll');
    Route::post('/viewAyurvedicHospitalImageDelete', [LocationController::class, 'ViewAyurvedicHospitalImageDelete'])->name('Location.viewAyurvedicHospitalImageDelete');


    Route::get('/localPharmacyAll', [LocationController::class, "LocalPharmacyAll"])->name('Location.localPharmacyAll');
    Route::post('/localPharmacyAdd', [LocationController::class, 'LocalPharmacyAdd'])->name('Location.localPharmacyAdd');
    Route::post('/localPharmacyDelete', [LocationController::class, 'LocalPharmacyDelete'])->name('Location.localPharmacyDelete');
    Route::post('/localPharmacyUpdate', [LocationController::class, 'LocalPharmacyUpdate'])->name('Location.localPharmacyUpdate');
});

Route::prefix('EducationalContent')->group(function () {

    Route::get('/ayurvedaGuideAll', [EducationalContentController::class, "AyurvedaGuideAll"])->name('EducationalContent.ayurvedaGuideAll');
    Route::post('/ayurvedaGuideAdd', [EducationalContentController::class, 'AyurvedaGuideAdd'])->name('EducationalContent.ayurvedaGuideAdd');
    Route::post('/ayurvedaGuideDelete', [EducationalContentController::class, 'AyurvedaGuideDelete'])->name('EducationalContent.ayurvedaGuideDelete');
    Route::post('/ayurvedaGuideUpdate', [EducationalContentController::class, 'AyurvedaGuideUpdate'])->name('EducationalContent.ayurvedaGuideUpdate');

    Route::get('/blogAll', [EducationalContentController::class, "BlogAll"])->name('EducationalContent.blogAll');
    Route::post('/blogAdd', [EducationalContentController::class, 'BlogAdd'])->name('EducationalContent.blogAdd');
    Route::post('/blogDelete', [EducationalContentController::class, 'BlogDelete'])->name('EducationalContent.blogDelete');
    Route::post('/blogUpdate', [EducationalContentController::class, 'BlogUpdate'])->name('EducationalContent.blogUpdate');

    Route::post('/blogImageAdd', [EducationalContentController::class, 'BlogImageAdd'])->name('EducationalContent.blogImageAdd');

    Route::get('/viewBlogImageAll/{blogId}', [EducationalContentController::class, "ViewBlogImageAll"])->name('EducationalContent.viewBlogImageAll');
    Route::post('/viewBlogImageDelete', [EducationalContentController::class, 'ViewBlogImageDelete'])->name('EducationalContent.viewBlogImageDelete');

    Route::get('/isPrimary/{id}', [EducationalContentController::class, 'IsPrimary'])->name('EducationalContent.isPrimary');

    Route::get('/meetingAndEventAll', [EducationalContentController::class, "MeetingAndEventAll"])->name('EducationalContent.meetingAndEventAll');
    Route::post('/meetingAndEventAdd', [EducationalContentController::class, 'MeetingAndEventAdd'])->name('EducationalContent.meetingAndEventAdd');
    Route::post('/meetingAndEventDelete', [EducationalContentController::class, 'MeetingAndEventDelete'])->name('EducationalContent.meetingAndEventDelete');
    Route::post('/meetingAndEventUpdate', [EducationalContentController::class, 'MeetingAndEventUpdate'])->name('EducationalContent.meetingAndEventUpdate');

});

Route::prefix('ProductManagement')->group(function () {

    Route::get('/productCategoryAll', [ProductManagementController::class, "ProductCategoryAll"])->name('ProductManagement.productCategoryAll');
    Route::post('/productCategoryAdd', [ProductManagementController::class, 'ProductCategoryAdd'])->name('ProductManagement.productCategoryAdd');
    Route::post('/productCategoryDelete', [ProductManagementController::class, 'ProductCategoryDelete'])->name('ProductManagement.productCategoryDelete');
    Route::post('/productCategoryUpdate', [ProductManagementController::class, 'ProductCategoryUpdate'])->name('ProductManagement.productCategoryUpdate');


    Route::get('/productAll', [ProductManagementController::class, "ProductAll"])->name('ProductManagement.productAll');
    Route::post('/productAdd', [ProductManagementController::class, 'ProductAdd'])->name('ProductManagement.productAdd');
    Route::post('/productDelete', [ProductManagementController::class, 'ProductDelete'])->name('ProductManagement.productDelete');
    Route::post('/productUpdate', [ProductManagementController::class, 'ProductUpdate'])->name('ProductManagement.productUpdate');

    Route::post('/productImageAdd', [ProductManagementController::class, 'ProductImageAdd'])->name('ProductManagement.productImageAdd');

    Route::get('/viewProductImageAll/{productId}', [ProductManagementController::class, "ViewProductImageAll"])->name('ProductManagement.viewProductImageAll');
    Route::post('/viewProductImageDelete', [ProductManagementController::class, 'ViewProductImageDelete'])->name('ProductManagement.viewProductImageDelete');

    Route::get('/isPrimary/{id}', [ProductManagementController::class, 'IsPrimary'])->name('ProductManagement.isPrimary');

});

Route::prefix('Treatment')->group(function () {

    Route::get('/all', [TreatmentController::class, "All"])->name('Treatment.all');
    Route::post('/add', [TreatmentController::class, 'Add'])->name('Treatment.add');
    Route::post('/delete', [TreatmentController::class, 'Delete'])->name('Treatment.delete');
    Route::post('/update', [TreatmentController::class, 'Update'])->name('Treatment.update');


    Route::post('/treatmentImageAdd', [TreatmentController::class, 'TreatmentImageAdd'])->name('Treatment.treatmentImageAdd');

    Route::get('/viewTreatmentImageAll/{treatmentId}', [TreatmentController::class, "ViewTreatmentImageAll"])->name('Treatment.viewTreatmentImageAll');
    Route::post('/viewTreatmentImageDelete', [TreatmentController::class, 'ViewTreatmentImageDelete'])->name('Treatment.viewTreatmentImageDelete');
});
