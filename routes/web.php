<?php

use App\Http\Controllers\AdminArea\AdminController;
use App\Http\Controllers\AdminArea\FormController;
use App\Http\Controllers\AdminArea\SampleController;
use App\Http\Controllers\AdminArea\TodoController;
use App\Http\Controllers\AdminArea\EmployeeController;
use App\Http\Controllers\AdminArea\GalleryController;
use App\Http\Controllers\AdminArea\LocationController;
use App\Http\Controllers\AdminArea\ServiceController;
use App\Http\Controllers\AdminArea\SettingController;
use App\Http\Controllers\AdminArea\StudentController;
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

        Route::post('/AyurvedicHospitalImageAdd', [LocationController::class, 'AyurvedicHospitalImageAdd'])->name('Location.ayurvedicHospitalImageAdd');


        Route::get('/viewAyurvedicHospitalImageAll/{ayurvedicHospitalId}', [LocationController::class, "ViewAyurvedicHospitalImageAll"])->name('Location.viewAyurvedicHospitalImageAll');
        Route::post('/viewAyurvedicHospitalImageDelete', [LocationController::class, 'ViewAyurvedicHospitalImageDelete'])->name('Location.viewAyurvedicHospitalImageDelete');



        });






