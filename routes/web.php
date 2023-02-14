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
Route::get('/schedule_run', function () {
    \Artisan::call('schedule:run');
})->name('schedule_run');

/* Route::get('replicate', function (Request $request){
    $intervals = \App\Models\Contract::getReminderContracts();
        foreach ($intervals as $key1 => $contracts) {
            foreach ($contracts as $key2 => $contract) {
                dd($key1);
                $data=[
                    'base_url' => url('/'),
                    'contract'=>$contract,
                    'remaining_time_period'=>$key
                ];

                try {
                    $email = new ContractEndReminder($data);
                    Mail::to($contract->emp->email)->send($email);
                } catch (\Throwable $th) {
                    
                }
            }
        }
}); */

Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blogs');
Route::get('/category/{slug}', [App\Http\Controllers\BlogController::class, 'byCategory'])->name('byCategory');
Route::get('/blog/{slug}', [App\Http\Controllers\BlogController::class, 'show'])->name('blog.show');

Route::group([
	'prefix' => 'backend',
    'as' => 'backend.',
	'middleware' => ['auth','role:superadmin|employee'],
],function(){

    Route::get('/password/update',[DashboardController::class, 'updatePassword'])->name('password.update');
    Route::post('/password/update',[DashboardController::class, 'updatePassword'])->name('password.update');

    // Add Permissions
    Route::group([
        'middleware' => ['role_or_permission:superadmin|Add Data'],
    ],function(){
        Route::get('user/create', [UserController::class, 'create'])->name('user.create');
        Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
        Route::get('contract/create', [ContractController::class, 'create'])->name('contract.create');

        Route::post('category', [CategoryController::class, 'store'])->name('category.store');
        Route::post('user', [UserController::class, 'store'])->name('user.store');
        Route::post('contract', [ContractController::class, 'store'])->name('contract.store');
        Route::get('contract_print', [ContractController::class, 'print'])->name('contract.print');
    });
    
    // View Permissions
    Route::group([
        'middleware' => ['role_or_permission:superadmin|View Data'],
    ],function(){
        
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('category', [CategoryController::class, 'index'])->name('category.index');
        Route::get('category/{id}', [CategoryController::class, 'show'])->name('category.show');
    
        Route::get('user', [UserController::class, 'index'])->name('user.index');
        Route::get('user/{id}', [UserController::class, 'show'])->name('user.show');
        
        Route::get('contract', [ContractController::class, 'index'])->name('contract.index');
        Route::get('contract/{id}', [ContractController::class, 'show'])->name('contract.show');
    });

    // Update Permissions
    Route::group([
        'middleware' => ['role_or_permission:superadmin|Update Data'],
    ],function(){
        
        Route::get('category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
        Route::get('user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::get('contract/{id}/edit', [ContractController::class, 'edit'])->name('contract.edit');
        Route::get('updateStatus/{id}', [ContractController::class, 'updateStatus'])->name('contract.update_status');

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
    
    
    Route::resource('/notification', "App\Http\Controllers\Admin\NotificationController");
    Route::get('/view_notifications', 'App\Http\Controllers\Admin\NotificationController@view')->name("view_notifications");
    Route::get('/mark_notifications', 'App\Http\Controllers\Admin\NotificationController@markNotifications')->name("mark_notifications");

    Route::get('/options',[DashboardController::class, 'options'])->name('options');
    //deactive coupon
    Route::get('coupon/deactive/{id}', [CouponController::class, 'deactive'])->name('coupon.deactive');

    //route for company
    Route::get('/company',[CompanyController::class, 'index'])->name('company.index');
    Route::get('/company/create',[CompanyController::class, 'create'])->name('company.create');
    Route::post('/company/store',[CompanyController::class, 'store'])->name('company.store');
    Route::delete('/company/{id}',[CompanyController::class, 'destroy'])->name('company.destroy');

    Route::get('/user_status', [App\Http\Controllers\Admin\UserController::class, 'updateStatus'])->name('user.updateStatus');

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

