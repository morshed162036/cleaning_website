<?php

use App\Http\Controllers\Serve\AboutTabController as ServeAboutTabController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Server\AdminController;
use App\Http\Controllers\Server\BannerController;
use App\Http\Controllers\Server\Service\ServiceController;
use App\Http\Controllers\Server\Service\ServiceDetailController;
use App\Http\Controllers\Server\ReviewController;
use App\Http\Controllers\Server\CounterController;
use App\Http\Controllers\Server\CompanyDetailController;
use App\Http\Controllers\Server\AboutCompanyController;
use App\Http\Controllers\Server\TeamMemberController;
use App\Http\Controllers\Server\GalleryController;
use App\Http\Controllers\Server\AboutTabController;
use App\Http\Controllers\Server\PricingPlaneController;
use App\Http\Controllers\Server\Blog\BlogCategoryController;
use App\Http\Controllers\Server\Blog\BlogPostController;
use App\Http\Controllers\Server\ContactController;
use App\Http\Controllers\Server\OrderController;

use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\AboutPageController;
use App\Http\Controllers\Client\ContactPageController;
use App\Http\Controllers\Client\GalleryPageController;
use App\Http\Controllers\Client\OrderPageController;
use App\Http\Controllers\Client\BlogPageController;
use App\Http\Controllers\Client\ServiceController as Service;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class,'index'])->name('client.home');
// Route::get('/admin', function () {
//     return view('server.login');
// });

Route::prefix('/')->group(function(){
    Route::resource('service-page',Service::class);
    Route::get('about-page',[AboutPageController::class,'index'])->name('client.about-page');
    Route::get('contact-page',[ContactPageController::class,'index'])->name('client.contact-page');
    Route::post('contact-page',[ContactPageController::class,'store'])->name('client.contact-page-store');
    Route::get('gallery-page',[GalleryPageController::class,'index'])->name('client.gallery-page');
    Route::resource('order-page', OrderPageController::class);
    Route::resource('blog-page', BlogPageController::class);
    Route::match(['get','post'],'login',[AdminController::class,'login'])->name('login');
    Route::group(['middleware'=>['user']],function(){
        Route::get('logout',[AdminController::class,'logout'])->name('logout');
        Route::get('dashboard',[AdminController::class,'dashboard'])->name('dashboard');
        Route::resource('banner', BannerController::class);
        Route::post('update-banner-status',[BannerController::class,'updateBannerStatus'])->name('updateBannerStatus');
        Route::resource('service', ServiceController::class);
        Route::resource('service-detail', ServiceDetailController::class);
        Route::resource('review', ReviewController::class);
        Route::resource('counter', CounterController::class);
        Route::resource('company-details', CompanyDetailController::class);
        Route::resource('about-company', AboutCompanyController::class);
        Route::resource('team-member', TeamMemberController::class);
        Route::resource('gallery', GalleryController::class);
        Route::resource('about_tab',AboutTabController::class);
        Route::post('about-tab-status', [AboutTabController::class, 'updateTabstatus'])->name('updateTabstatus');
        Route::resource('package',PricingPlaneController::class);
        Route::post('package-status', [PricingPlaneController::class, 'packagestatus'])->name('packagestatus');
        Route::resource('blog-category', BlogCategoryController::class);
        Route::post('blog-status',[BlogCategoryController::class,'updateBlogCategoryStatus'])->name('updateBlogCategoryStatus');
        Route::resource('blog-post', BlogPostController::class);
        Route::resource('contact', ContactController::class);
        Route::resource('order', OrderController::class);




        // Route::resource('leave-holidays', HolidaysController::class);
        // Route::get('leave-holidays-year', [HolidaysController::class,'year'])->name('leave-holidays.year');
        // Route::resource('leave-type', LeaveController::class);
        // Route::resource('leave-application', LeaveApplicationController::class);
        // Route::resource('leave-application-online', LeaveApplicationOnlineController::class);
        // Route::resource('leave-application-approval', LeaveApplicationApprovalController::class);

        // Route::match(['get','post'],'promotion/{slug}', [PromotionController::class,'create'])->name('promotion.create');
        // Route::match(['get','post'],'promotion-store/{slug}', [PromotionController::class,'store'])->name('promotion.store');
        // Route::match(['get','post'],'promotion-history', [PromotionController::class,'promotion_history'])->name('promotion.history');
        // Route::get('promotion-approval-list',[PromotionController::class,'index'])->name('promotion.index');
        // Route::post('promotion-approval/{slug}/{id}',[PromotionController::class,'update'])->name('promotion-approval.update');

        // Route::match(['get','post'],'increment/{slug}', [IncrementController::class,'create'])->name('increment.create');
        // Route::match(['get','post'],'increment-store/{slug}', [IncrementController::class,'store'])->name('increment.store');
        // Route::match(['get','post'],'increment-history', [IncrementController::class,'increment_history'])->name('increment.history');
        // Route::get('increment-approval-list',[IncrementController::class,'index'])->name('increment.index');
        // Route::post('increment-approval/{slug}/{id}',[IncrementController::class,'update'])->name('increment-approval.update');

        // Route::resource('loan', LoanController::class);
        // Route::post('update-loan-status',[LoanController::class,'updateLoanStatus'])->name('updateLoanStatus');
        // Route::resource('loan-application', LoanApplicationController::class);
        // Route::match(['get','post'],'loan-application-create', [LoanApplicationController::class,'create'])->name('loan-application.create');

        // Route::resource('allowance', AllowanceController::class);
        // Route::post('update-allowance-status',[AllowanceController::class,'updateAllowanceStatus'])->name('updateAllowanceStatus');
        // Route::resource('allowance-list', AllowanceListController::class);
    });
});
