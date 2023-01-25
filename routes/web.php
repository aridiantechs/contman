<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;
use App\Http\Controllers\Admin\{
    CategoryController,
    CouponController,
    ContactController,
    UserController,
    DashboardController,
    CompanyController,
    ContractController,
    CarController,
    ProposalController,
    OrderController,
    ReportController,
    BlogController,
    BannerController
};

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
//test notification
// Route::get('test_notification',[App\Http\Controllers\App\DataController::class, 'testNotify']);

Route::get('lang/{locale}', [App\Http\Controllers\LocalizationController::class, 'index'])->name('lang_change');
Route::get('/', function () {
    return redirect()->route('login');
})->name('/');

Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blogs');
Route::get('/category/{slug}', [App\Http\Controllers\BlogController::class, 'byCategory'])->name('byCategory');
Route::get('/blog/{slug}', [App\Http\Controllers\BlogController::class, 'show'])->name('blog.show');

Route::group([
	'prefix' => 'backend',
    'as' => 'backend.',
	'middleware' => ['auth','role:superadmin|employee'],
],function(){

    // View Permissions
    Route::group([
        'middleware' => ['role_or_permission:superadmin|View Data'],
    ],function(){
        
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('category', [CategoryController::class, 'index'])->name('category.index');
        Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
        Route::get('category/{id}', [CategoryController::class, 'show'])->name('category.show');
        Route::get('category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    
        Route::get('user', [UserController::class, 'index'])->name('user.index');
        Route::get('user/create', [UserController::class, 'create'])->name('user.create');
        Route::get('user/{id}', [UserController::class, 'show'])->name('user.show');
        Route::get('user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
        
        Route::get('contract', [ContractController::class, 'index'])->name('contract.index');
        Route::get('contract/create', [ContractController::class, 'create'])->name('contract.create');
        Route::get('contract/{id}', [ContractController::class, 'show'])->name('contract.show');
        Route::get('contract/{id}/edit', [ContractController::class, 'edit'])->name('contract.edit');
    });

    // Add Permissions
    Route::group([
        'middleware' => ['role_or_permission:superadmin|Add Data'],
    ],function(){
        Route::post('category', [CategoryController::class, 'store'])->name('category.store');
        Route::post('user', [UserController::class, 'store'])->name('user.store');
        Route::post('contract', [ContractController::class, 'store'])->name('contract.store');
    });

    // Update Permissions
    Route::group([
        'middleware' => ['role_or_permission:superadmin|Update Data'],
    ],function(){
        Route::put('category/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::put('user/{id}', [UserController::class, 'update'])->name('user.update');
        Route::put('contract/{id}', [ContractController::class, 'update'])->name('contract.update');
    });

    // Delete Permissions
    Route::group([
        'middleware' => ['role_or_permission:superadmin|Delete Data'],
    ],function(){
        
        Route::delete('category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
        Route::delete('user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
        Route::delete('contract/{id}', [ContractController::class, 'destroy'])->name('contract.destroy');
    });
    
    Route::resource('blog', BlogController::class);

    Route::resource('orders', OrderController::class);
    Route::resource('coupon', CouponController::class);
    //deactive coupon
    Route::get('coupon/deactive/{id}', [CouponController::class, 'deactive'])->name('coupon.deactive');

    //route for company
    Route::get('/company',[CompanyController::class, 'index'])->name('company.index');
    Route::get('/company/create',[CompanyController::class, 'create'])->name('company.create');
    Route::post('/company/store',[CompanyController::class, 'store'])->name('company.store');
    Route::delete('/company/{id}',[CompanyController::class, 'destroy'])->name('company.destroy');
    
    Route::get('company/{id}', [CompanyController::class, 'show'])->name('company.show');
    Route::get('company/{id}/edit', [CompanyController::class, 'edit'])->name('company.edit');
    Route::put('company/{id}/edit', [CompanyController::class, 'edit'])->name('company.edit');
    Route::get('/company/{id}/services',[CompanyController::class, 'services'])->name('company.services');
    Route::post('/company/{id}/services',[CompanyController::class, 'services'])->name('company.services');
    Route::get('/company/{id}/employees',[CompanyController::class, 'employees'])->name('company.employees');
    Route::post('/company/{id}/employees',[CompanyController::class, 'employees'])->name('company.employees');
    // update routes for company employee
    Route::get('/company/{id}/employee/{emp_id}',[CompanyController::class, 'updateEmployee'])->name('company.updateEmployee');
    Route::put('/company/{id}/employee/{emp_id}',[CompanyController::class, 'updateEmployee'])->name('company.updateEmployee');
    // update routes for company service
    Route::get('/company/{id}/service/{service_id}',[CompanyController::class, 'updateService'])->name('company.updateService');
    Route::put('/company/{id}/service/{service_id}',[CompanyController::class, 'updateService'])->name('company.updateService');
    //delete route for company employee
    Route::delete('/company/{id}/employees/{emp_id}',[CompanyController::class, 'deleteEmployee'])->name('company.deleteEmployee');
    //delete route for company service
    Route::delete('/company/{id}/services/{service_id}',[CompanyController::class, 'deleteService'])->name('company.deleteService');

    Route::resource('banner', BannerController::class);
    Route::get('/user_status', [App\Http\Controllers\Admin\UserController::class, 'updateStatus'])->name('user.updateStatus');

    // nationality crud routes
    Route::get('/nationality',[NationalityController::class, 'index'])->name('nationality.index');


    // Route::resource('company', CompanyController::class);
    
    Route::get('/{slug}',[App\Http\Controllers\FrontPageController::class, 'backendPages'])->name('backend-pages');
});

Route::get('/chatify_init', function(){
    return view('vendor.Chatify.pages.init');
})->name('chatify_init');
Route::get('chatify_validate_token', function(Request $request){
    $token = PersonalAccessToken::findToken($request->token);

    if (!$token) {
        dd("Error: Token not found");
    }

    $user = $token->tokenable;
    Auth::login($user);
    return response()->json([
        'user' => $user,
        'success' => true,
    ]);
    
})->name('chatify.validate_token');

require __DIR__.'/auth.php';


Route::get('terms_and_condition', function () {
    return view('frontend.pages.terms_and_condition');
 });

 Route::get('about_us', function () {
     return view('frontend.pages.about');
  });
 
 Route::get('privacy_policy', function () {
    return 'not found';
    //  return response()->file(public_path('storage/Privacy_Policy.pdf'));
 })->name('contact-us');
Route::get('/{slug}',[App\Http\Controllers\FrontPageController::class, 'pages'])->name('page');

