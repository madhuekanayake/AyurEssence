<?php

use App\Http\Controllers\AdminArea\AdminController;
use App\Http\Controllers\AdminArea\CustomerManagementController;
use App\Http\Controllers\AdminArea\DoctorManagementController;
use App\Http\Controllers\AdminArea\EducationalContentController;
use App\Http\Controllers\AdminArea\FormController;
use App\Http\Controllers\AdminArea\SampleController;
use App\Http\Controllers\AdminArea\TodoController;
use App\Http\Controllers\AdminArea\EmployeeController;
use App\Http\Controllers\AdminArea\GalleryController;
use App\Http\Controllers\AdminArea\LocationController;
use App\Http\Controllers\AdminArea\LoginController;
use App\Http\Controllers\AdminArea\PlantManagementController;
use App\Http\Controllers\AdminArea\ProductManagementController;
use App\Http\Controllers\AdminArea\QuestionsAndAnsersController;
use App\Http\Controllers\AdminArea\QuestionsAndAnswersController;
use App\Http\Controllers\AdminArea\SalePlantsController;
use App\Http\Controllers\AdminArea\ServiceController;
use App\Http\Controllers\AdminArea\SettingController;
use App\Http\Controllers\AdminArea\StudentController;
use App\Http\Controllers\AdminArea\TreatmentController;
use App\Http\Controllers\PublicArea\AboutUsController;
use App\Http\Controllers\PublicArea\BlogController;
use App\Http\Controllers\PublicArea\ContactUsController;
use App\Http\Controllers\PublicArea\CustomerAyurvedicGuideController;
use App\Http\Controllers\PublicArea\CustomerBlogController;
use App\Http\Controllers\PublicArea\CustomerConservationAndAwarenessController;
use App\Http\Controllers\PublicArea\CustomerDoctorController;
use App\Http\Controllers\PublicArea\CustomerGalleryController;
use App\Http\Controllers\PublicArea\CustomerLocationsController;
use App\Http\Controllers\PublicArea\CustomerMeetingsOrEventsController;
use App\Http\Controllers\PublicArea\CustomerPlanttUsController;
use App\Http\Controllers\PublicArea\CustomerProductController;
use App\Http\Controllers\PublicArea\CustomerQandAController;
use App\Http\Controllers\PublicArea\CustomerServiceController;
use App\Http\Controllers\PublicArea\CustomerTreatmentController;
use App\Http\Controllers\PublicArea\DoctorsController;
use App\Http\Controllers\PublicArea\GetHealthController;
use App\Http\Controllers\PublicArea\HomeController;
use App\Http\Controllers\PublicArea\PlanttUsController;
use App\Http\Controllers\PublicArea\WebsiteDataController;
use App\Http\Controllers\ShopPlants\ShopPlantsController;
use App\Http\Controllers\ShopPlants\ShopProductContactController;
use App\Http\Controllers\ShopPlants\ShopProductController;
use App\Http\Controllers\ShopPlants\ShopProductHomeController;
use App\Http\Controllers\ShopPlants\ShopProductPortfolioController;
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

// Route::get('/contactUs', [ContactUsController::class, 'index']);
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

Route::prefix('CustomerBlog')->group(function () {

    Route::get('/all', [CustomerBlogController::class, "All"])->name('CustomerBlog.all');

    Route::get('/blog/{id}', [CustomerBlogController::class, 'show'])->name('CustomerBlog.details');

    Route::get('/homeAll', [CustomerBlogController::class, "HomeAll"])->name('CustomerBlog.homeAll');


});

Route::prefix('CustomerAyurvedicGuide')->group(function () {

    Route::get('/all', [CustomerAyurvedicGuideController::class, "All"])->name('CustomerAyurvedicGuide.all');

});

Route::prefix('CustomerMeetingsOrEvents')->group(function () {

    Route::get('/all', [CustomerMeetingsOrEventsController::class, "All"])->name('CustomerMeetingsOrEvents.all');

    Route::get('/meetingsAndEvents/{id}', [CustomerMeetingsOrEventsController::class, 'show'])->name('CustomerMeetingsOrEvents.details');

});

Route::prefix('ConservationAndAwareness')->group(function () {

    Route::get('/all', [CustomerConservationAndAwarenessController::class, "All"])->name('ConservationAndAwareness.all');

    Route::get('/conservationAndAwareness/{id}', [CustomerConservationAndAwarenessController::class, 'show'])->name('ConservationAndAwareness.details');

});


Route::prefix('CustomerProduct')->group(function () {

    Route::get('/all', [CustomerProductController::class, "All"])->name('CustomerProduct.all');

    Route::get('/product/{id}', [CustomerProductController::class, 'show'])->name('CustomerProduct.details');

});

Route::prefix('CustomerTreatment')->group(function () {

    Route::get('/all', [CustomerTreatmentController::class, "All"])->name('CustomerTreatment.all');

    Route::get('/product/{id}', [CustomerTreatmentController::class, 'show'])->name('CustomerTreatment.details');

});


Route::prefix('CustomerService')->group(function () {

    Route::get('/all', [CustomerServiceController::class, "All"])->name('CustomerService.all');

});

Route::prefix('CustomerQandA')->group(function () {

    Route::get('/all', [CustomerQandAController::class, "All"])->name('CustomerQandA.all');

});

Route::prefix('CustomerGallery')->group(function () {

    Route::get('/all', [CustomerGalleryController::class, "All"])->name('CustomerGallery.all');

});

Route::prefix('WebsiteData')->group(function () {

    Route::get('/footerAll', [WebsiteDataController::class, "FooterAll"])->name('WebsiteData.footerAll');

});

Route::prefix('CustomerDoctor')->group(function () {

    Route::get('/all', [CustomerDoctorController::class, "All"])->name('CustomerDoctor.all');


    Route::get('/doctor/{id}', [CustomerDoctorController::class, 'show'])->name('CustomerDoctor.details');
});

Route::prefix('ContactUs')->group(function () {

    Route::get('/all', [ContactUsController::class, "All"])->name('ContactUs.all');

    Route::post('/add', [ContactUsController::class, 'Add'])->name('ContactUs.add');

    Route::post('/newsLetterAdd', [ContactUsController::class, 'NewsLetterAdd'])->name('ContactUs.newsLetterAdd');

    Route::post('/reply', [CustomerManagementController::class, 'sendReply'])->name('ContactUs.reply');

    Route::post('/contact-us/send-bulk-email', [CustomerManagementController::class, 'sendBulkEmail'])->name('ContactUs.sendBulkEmail');

    Route::post('/getHealthSendReply', [CustomerManagementController::class, 'GetHealthSendReply'])->name('ContactUs.getHealthSendReply');



});

Route::prefix('GetHealth')->group(function () {

    Route::get('/all', [GetHealthController::class, "All"])->name('GetHealth.all');

    Route::post('/add', [GetHealthController::class, 'Add'])->name('GetHealth.add');



});



Route::prefix('CustomerPlant')->group(function () {

    Route::get('/all', [CustomerPlanttUsController::class, "All"])->name('CustomerPlant.all');

    Route::get('/plant/{id}', [CustomerPlanttUsController::class, 'show'])->name('CustomerPlant.details');


});

Route::prefix('CustomerLocations')->group(function () {

    Route::get('/ayurvedicHospitalsAll', [CustomerLocationsController::class, "AyurvedicHospitalsAll"])->name('CustomerLocations.ayurvedicHospitalsAll');
    Route::get('/ayurvedicHospitalsAll/{id}', [CustomerLocationsController::class, 'show'])->name('CustomerLocations.ayurvedicHospitalsDetails');

    Route::get('/herbalGardensAll', [CustomerLocationsController::class, 'HerbalGardensAll'])->name('CustomerLocations.herbalGardensAll');
    Route::get('/herbalGardensAll/{id}', [CustomerLocationsController::class, 'HerbalGardensShow'])->name('CustomerLocations.herbalGardensDetails');

    Route::get('/localPharmaciesAll', [CustomerLocationsController::class, 'LocalPharmaciesAll'])->name('CustomerLocations.localPharmaciesAll');


});







// Route::get('/getAllStudents', [StudentController::class, "GetAllStudents"]);
//     Route::post('/addStudents', [StudentController::class, 'AddStudents']);
// Route::post('/deleteStudents', [StudentController::class, 'DeleteStudents']);
// Route::post('/updateStudents', [StudentController::class, 'UpdateStudents']);

// Route::prefix('AdminLogin')->group(function () {

//     Route::get('/index', [LoginController::class, "Index"])->name('AdminLogin.index');
//     Route::post('/login', [LoginController::class, 'Login'])->name('AdminLogin.login');
//     Route::post('/logout', [LoginController::class, 'Logout'])->name('AdminLogin.logout');

// });

Route::middleware(['admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    // Add other admin routes here...
});


Route::prefix('AdminLogin')->group(function () {
    Route::get('/index', [LoginController::class, 'Index'])->name('AdminLogin.index');
    Route::post('/login', [LoginController::class, 'Login'])->name('AdminLogin.login');
    Route::post('/logout', [LoginController::class, 'Logout'])->name('AdminLogin.logout');
});


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

    Route::post('/serviceImageAdd', [ServiceController::class, 'ServiceImageAdd'])->name('Service.serviceImageAdd');

    Route::get('/viewServiceImageAll/{serviceId}', [ServiceController::class, "ViewServiceImageAll"])->name('Service.viewServiceImageAll');
    Route::post('/viewServiceImageDelete', [ServiceController::class, 'ViewServiceImageDelete'])->name('Service.viewServiceImageDelete');

    Route::get('/isPrimary/{id}', [ServiceController::class, 'IsPrimary'])->name('Service.isPrimary');

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

    Route::get('/conservationAwarenessAll', [EducationalContentController::class, "ConservationAwarenessAll"])->name('EducationalContent.conservationAwarenessAll');
    Route::post('/conservationAwarenessAdd', [EducationalContentController::class, 'ConservationAwarenessAdd'])->name('EducationalContent.conservationAwarenessAdd');
    Route::post('/conservationAwarenessDelete', [EducationalContentController::class, 'ConservationAwarenessDelete'])->name('EducationalContent.conservationAwarenessDelete');
    Route::post('/conservationAwarenessUpdate', [EducationalContentController::class, 'ConservationAwarenessUpdate'])->name('EducationalContent.conservationAwarenessUpdate');

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


    Route::get('/isPrimary/{id}', [TreatmentController::class, 'IsPrimary'])->name('Treatment.isPrimary');
});


Route::prefix('DoctorManagement')->group(function () {

    Route::get('/specializationAll', [DoctorManagementController::class, "SpecializationAll"])->name('DoctorManagement.specializationAll');
    Route::post('/specializationAdd', [DoctorManagementController::class, 'SpecializationAdd'])->name('DoctorManagement.specializationAdd');
    Route::post('/specializationDelete', [DoctorManagementController::class, 'SpecializationDelete'])->name('DoctorManagement.specializationDelete');
    Route::post('/specializationUpdate', [DoctorManagementController::class, 'SpecializationUpdate'])->name('DoctorManagement.specializationUpdate');

    Route::get('/doctorAll', [DoctorManagementController::class, "DoctorAll"])->name('DoctorManagement.doctorAll');
    Route::post('/doctorAdd', [DoctorManagementController::class, 'DoctorAdd'])->name('DoctorManagement.doctorAdd');
    Route::post('/doctorDelete', [DoctorManagementController::class, 'DoctorDelete'])->name('DoctorManagement.doctorDelete');
    Route::post('/doctorUpdate', [DoctorManagementController::class, 'DoctorUpdate'])->name('DoctorManagement.doctorUpdate');

});

Route::prefix('PlantManagement')->group(function () {

    Route::get('/plantCategoryAll', [PlantManagementController::class, "PlantCategoryAll"])->name('PlantManagement.plantCategoryAll');
    Route::post('/plantCategoryAdd', [PlantManagementController::class, 'PlantCategoryAdd'])->name('PlantManagement.plantCategoryAdd');
    Route::post('/plantCategoryDelete', [PlantManagementController::class, 'PlantCategoryDelete'])->name('PlantManagement.plantCategoryDelete');
    Route::post('/plantCategoryUpdate', [PlantManagementController::class, 'PlantCategoryUpdate'])->name('PlantManagement.plantCategoryUpdate');

    Route::get('/plantAll', [PlantManagementController::class, "PlantAll"])->name('PlantManagement.plantAll');
    Route::post('/plantAdd', [PlantManagementController::class, 'PlantAdd'])->name('PlantManagement.plantAdd');
    Route::post('/plantDelete', [PlantManagementController::class, 'PlantDelete'])->name('PlantManagement.plantDelete');
    Route::post('/plantUpdate', [PlantManagementController::class, 'PlantUpdate'])->name('PlantManagement.plantUpdate');

    Route::post('/plantImageAdd', [PlantManagementController::class, 'PlantImageAdd'])->name('PlantManagement.plantImageAdd');

    Route::get('/viewPlantImageAll/{planttId}', [PlantManagementController::class, "ViewPlantImageAll"])->name('PlantManagement.viewPlantImageAll');
    Route::post('/viewPlantImageDelete', [PlantManagementController::class, 'ViewPlantImageDelete'])->name('PlantManagement.viewPlantImageDelete');

    Route::get('/isPrimary/{id}', [PlantManagementController::class, 'IsPrimary'])->name('PlantManagement.isPrimary');

    Route::get('/plantDiseasesAll', [PlantManagementController::class, "PlantDiseasesAll"])->name('PlantManagement.plantDiseasesAll');
    Route::post('/plantDiseasesAdd', [PlantManagementController::class, 'PlantDiseasesAdd'])->name('PlantManagement.plantDiseasesAdd');
    Route::post('/plantDiseasesDelete', [PlantManagementController::class, 'PlantDiseasesDelete'])->name('PlantManagement.plantDiseasesDelete');
    Route::post('/plantDiseasesUpdate', [PlantManagementController::class, 'PlantDiseasesUpdate'])->name('PlantManagement.plantDiseasesUpdate');

    Route::post('/plantDiseasesImageAdd', [PlantManagementController::class, 'PlantDiseasesImageAdd'])->name('PlantManagement.plantDiseasesImageAdd');

    Route::get('/viewPlantDiseasesImageAll/{diseasesId}', [PlantManagementController::class, "ViewPlantDiseasesImageAll"])->name('PlantManagement.ViewPlantDiseasesImageAll');
    Route::post('/viewPlantDiseasesImageDelete', [PlantManagementController::class, 'ViewPlantDiseasesImageDelete'])->name('PlantManagement.viewPlantDiseasesImageDelete');

    Route::get('/plantDiseasesIsPrimary/{id}', [PlantManagementController::class, 'PlantDiseasesIsPrimary'])->name('PlantManagement.plantDiseasesIsPrimary');

});

Route::prefix('CustomerManagement')->group(function () {

    Route::get('/contactUsAll', [CustomerManagementController::class, "ContactUsAll"])->name('CustomerManagement.contactUsAll');
    Route::post('/contactUsDelete', [CustomerManagementController::class, 'ContactUsDelete'])->name('CustomerManagement.contactUsDelete');

    Route::get('/newsLetterAll', [CustomerManagementController::class, "NewsLetterAll"])->name('CustomerManagement.newsLetterAll');
    Route::post('/newsLetterDelete', [CustomerManagementController::class, 'NewsLetterDelete'])->name('CustomerManagement.newsLetterDelete');

    Route::get('/getHealthAll', [CustomerManagementController::class, "GetHealthAll"])->name('CustomerManagement.getHealthAll');
    Route::post('/getHealthDelete', [CustomerManagementController::class, 'GetHealthDelete'])->name('CustomerManagement.getHealthDelete');



});

Route::prefix('QuestionsAndAnswers')->group(function () {

    Route::get('/all', [QuestionsAndAnswersController::class, "All"])->name('QuestionsAndAnswers.all');
    Route::post('/add', [QuestionsAndAnswersController::class, 'Add'])->name('QuestionsAndAnswers.add');
    Route::post('/delete', [QuestionsAndAnswersController::class, 'Delete'])->name('QuestionsAndAnswers.delete');
    Route::post('/update', [QuestionsAndAnswersController::class, 'Update'])->name('QuestionsAndAnswers.update');
});

Route::prefix('SalePlants')->group(function () {

    Route::get('/all', [SalePlantsController::class, "All"])->name('SalePlants.all');
    Route::post('/add', [SalePlantsController::class, 'Add'])->name('SalePlants.add');
    Route::post('/delete', [SalePlantsController::class, 'Delete'])->name('SalePlants.delete');
    Route::post('/update', [SalePlantsController::class, 'Update'])->name('SalePlants.update');

    Route::post('/plantImageAdd', [SalePlantsController::class, 'PlantImageAdd'])->name('SalePlants.plantImageAdd');

    Route::get('/viewPlantImageAll/{salePlantId}', [SalePlantsController::class, "ViewPlantImageAll"])->name('SalePlants.viewPlantImageAll');
    Route::post('/viewPlantImageDelete', [SalePlantsController::class, 'ViewPlantImageDelete'])->name('SalePlants.viewPlantImageDelete');

    Route::get('/isPrimary/{id}', [SalePlantsController::class, 'IsPrimary'])->name('SalePlants.isPrimary');
});




////////////////////////////////////////////////////////////////////////////////////// Shop Plants ///////////////////////////

Route::prefix('ShopPlants')->group(function () {

    Route::get('/index', [ShopPlantsController::class, "Index"])->name('ShopPlants.index');

});


Route::prefix('ShopProduct')->group(function () {

    Route::get('/all', [ShopProductController::class, "All"])->name('ShopProduct.all');

    Route::get('/ShopPlant/{id}', [ShopProductController::class, 'show'])->name('ShopProduct.details');

});


Route::prefix('ShopProductPortfolio')->group(function () {

    Route::get('/all', [ShopProductPortfolioController::class, "All"])->name('ShopProductPortfolio.all');

});


Route::prefix('ShopProductContact')->group(function () {

    Route::get('/all', [ShopProductContactController::class, "All"])->name('ShopProductContact.all');

});
