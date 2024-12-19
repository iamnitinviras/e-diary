<?php

use Illuminate\Support\Facades\Auth;
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
Auth::routes(['register' => false]);
Route::middleware(['preventBackHistory','installed'])->group(function () {

Route::get('/', [\App\Http\Controllers\FrontController::class, 'index'])->name('/');
Route::get('/register',function (){
    return redirect('/');
});
Route::get('/category/{slug}', [\App\Http\Controllers\FrontController::class, 'category'])->name('blog.category');
Route::get('/blog/{slug}', [\App\Http\Controllers\FrontController::class, 'details'])->name('blog.details');
Route::post('/blog/{blog}/comment', [\App\Http\Controllers\FrontController::class, 'comment'])->name('blog.comment');
Route::get('/search', [\App\Http\Controllers\FrontController::class, 'search'])->name('blog.search');
Route::get('/all', [\App\Http\Controllers\FrontController::class, 'allBlogs'])->name('blog.all');
Route::get('/terms-and-condition', [\App\Http\Controllers\FrontController::class, 'termsAndCondition'])->name('terms-and-condition');
Route::get('/privacy-policy', [\App\Http\Controllers\FrontController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/contact-us', [\App\Http\Controllers\FrontController::class, 'contact_us'])->name('frontend.contact_us');
Route::post('/contact-us', [\App\Http\Controllers\FrontController::class, 'contactUs'])->name('contactUs');
Route::get('default/theme', [App\Http\Controllers\FrontController::class, 'defaultTheme'])->name('default.theme');


    Route::put('default/{language}/languages', [App\Http\Controllers\Admin\LanguageController::class, 'defaultLanguage'])->name('admin.default.language');
    Route::put('default/theme', [App\Http\Controllers\Admin\LanguageController::class, 'defaultTheme'])->name('default.theme');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth']);
    Route::get('/verify-email', [App\Http\Controllers\HomeController::class, 'verifyEmail'])->name('verifyEmail')->middleware(['auth']);
    Route::post('/editor/image-upload', [App\Http\Controllers\HomeController::class, 'editorImageUpload']);
    Route::group(['middleware' => ["auth"], 'as' => "admin."], function () {
        Route::delete('comments/{comment}', [App\Http\Controllers\Admin\BlogController::class, 'commentsDestroy'])->name('comment.destroy');
        Route::get('comments', [App\Http\Controllers\Admin\BlogController::class, 'comments'])->name('blogs.comments');
        Route::post('comments/{comment}', [App\Http\Controllers\Admin\BlogController::class, 'commentsApprove'])->name('blogs.comments.update');
        Route::resource('blogs', App\Http\Controllers\Admin\BlogController::class);
        Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
        Route::resource('cms-page', App\Http\Controllers\Admin\CmsPageController::class)->middleware('role:Super-Admin');
        Route::resource('contact-request', App\Http\Controllers\Admin\ContactUsController::class)->middleware('role:Super-Admin');

        //Manage Language
        Route::resource('languages', App\Http\Controllers\Admin\LanguageController::class, ['except' => ['show'], 'middleware' => 'role:Super-Admin']);

        Route::get('get-rightbar-content', [App\Http\Controllers\HomeController::class, 'getRightBarContent'])->name('getRightBarContent');

        //  Profile
        Route::controller(App\Http\Controllers\Admin\ProfileController::class)->group(function () {
            // profile
            Route::get('profile', 'show')->name('profile');
            Route::get('profile/edit', 'edit')->name('profile.edit');
            Route::post('profile/delete', 'delete')->name('profile.account.delete')->middleware('role:vendor|staff');
            Route::put('profile/update', 'update')->name('profile.update');

            // password
            Route::get('profile/change-password', 'passwordEdit')->name('password.edit');
            Route::put('profile/password/update', 'passwordUpdate')->name('password.update');
        });

        //Super Admin Role Permission
        Route::group(['middleware' => ['role:Super-Admin']], function () {

            Route::get('frontend', [App\Http\Controllers\Admin\EnvSettingController::class, 'frontend'])->name('frontend.admin')->middleware('role:Super-Admin');
            Route::put('frontend-images', [App\Http\Controllers\Admin\EnvSettingController::class, 'frontendImages'])->name('frontendImages')->middleware('role:Super-Admin');

            Route::controller(App\Http\Controllers\Admin\EnvSettingController::class)->group(function () {
                Route::get('environment/setting', 'show')->name('environment.setting');
                Route::put('environment/setting', 'update')->name('environment.setting.update');

                Route::get('environment/setting/recaptcha', 'showRecaptcha')->name('environment.recaptcha');
                Route::put('environment/setting/recaptcha', 'updateRecaptcha')->name('environment.recaptcha.update');

                //Display Setting
                Route::get('environment/setting/display', 'displaySetting')->name('environment.setting.display');
                Route::put('environment/setting/display/save', 'displaySave')->name('environment.setting.display.update');

                //Email Setting
                Route::get('environment/setting/email', 'emailSetting')->name('environment.setting.email');
                Route::put('environment/setting/email/save', 'emailSave')->name('environment.setting.email.update');
                Route::put('environment/setting/email/test', 'emailTest')->name('environment.setting.email.test');

                //SEO Setting
                Route::get('environment/setting/seo', 'seoSetting')->name('environment.setting.seo');
                Route::put('environment/setting/seo/save', 'seoSave')->name('environment.setting.seo.update');

                //Analytics code
                Route::get('environment/setting/analytics', 'analyticsSetting')->name('environment.setting.analytics');
                Route::put('environment/setting/analytics/save', 'analyticsSave')->name('environment.setting.analytics.update');
            });
        });
    });
});
