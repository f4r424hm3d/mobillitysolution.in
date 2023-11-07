<?php

use App\Http\Controllers\admin\AdminDashboard;
use App\Http\Controllers\admin\AdminLogin;
use App\Http\Controllers\admin\AuthorC;
use App\Http\Controllers\admin\BlogC;
use App\Http\Controllers\admin\BlogCategoryC;
use App\Http\Controllers\admin\DynamicPageSeoC;
use App\Http\Controllers\admin\ProductC;
use App\Http\Controllers\admin\ProductCategoryC;
use App\Http\Controllers\admin\ProductSubCategoryC;
use App\Http\Controllers\admin\StaticPageSeoC;
use App\Http\Controllers\admin\UserC;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\front\AboutFc;
use App\Http\Controllers\front\BlogFc;
use App\Http\Controllers\front\CareerFc;
use App\Http\Controllers\front\ContactFc;
use App\Http\Controllers\front\HomeFc;
use App\Http\Controllers\front\InquiryController;
use App\Http\Controllers\front\SolutionFc;
use App\Models\Blog;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use Illuminate\Support\Facades\Artisan;
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

// Route::get('/', function () {
//   return view('startpage');
// });

//Clear Cache facade value:
Route::get('/clear-cache', function () {
  $exitCode = Artisan::call('cache:clear');
  return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function () {
  $exitCode = Artisan::call('optimize');
  return '<h1>Reoptimized class loader</h1>';
});
Route::get('/f/optimize', function () {
  $exitCode = Artisan::call('optimize:clear');
  return true;
});

//Route cache:
Route::get('/route-cache', function () {
  $exitCode = Artisan::call('route:cache');
  return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function () {
  $exitCode = Artisan::call('route:clear');
  return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function () {
  $exitCode = Artisan::call('view:clear');
  return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function () {
  $exitCode = Artisan::call('config:cache');
  return '<h1>Clear Config cleared</h1>';
});

//For MIgrate:
Route::get('/migrate', function () {
  $exitCode = Artisan::call('migrate');
  return '<h1>Migrated</h1>';
});

Route::get('/f/migrate', function () {
  $exitCode = Artisan::call('migrate');
  return true;
});

/* FRONT ROUTE */
Route::get('/', [HomeFc::class, 'index']);
Route::get('/what-make-us-different', [HomeFc::class, 'whatMakeUsDifferent']);
Route::get('/privacy-policy', [HomeFc::class, 'privacyPolicy']);
Route::get('/about-us', [AboutFc::class, 'index']);
Route::get('/contact-us', [ContactFc::class, 'index']);
Route::get('/thank-you', [ContactFc::class, 'thankYou']);
Route::get('/career', [CareerFc::class, 'index']);

Route::get('/solutions', [SolutionFc::class, 'index']);
$cat = ProductCategory::all();
foreach ($cat as $row) {
  Route::get('/' . $row->category_slug, [SolutionFc::class, 'catDetail']);
}
$subcat = ProductSubCategory::all();
foreach ($subcat as $row) {
  Route::get('/' . $row->sub_category_slug, [SolutionFc::class, 'subDetail']);
}

Route::get('/news', [BlogFc::class, 'index']);
Route::get('/news/{slug}', [BlogFc::class, 'blogByCategory']);
$blogs = Blog::all();
foreach ($blogs as $row) {
  Route::get('/' . $row->slug, [BlogFc::class, 'blogdetail']);
}

Route::post('inquiry/contact-us', [InquiryController::class, 'submitContactUs']);
Route::post('inquiry/appointment', [InquiryController::class, 'appointment']);


/* ADMIN ROUTES BEFORE LOGIN */
Route::middleware(['adminLoggedOut'])->group(function () {
  Route::get('/admin/login/', [AdminLogin::class, 'index']);
  Route::post('/admin/login/', [AdminLogin::class, 'login']);
});
/* ADMIN ROUTES AFTER LOGIN */
Route::middleware(['adminLoggedIn'])->group(function () {
  Route::get('/admin/logout/', function () {
    session()->forget('adminLoggedIn');
    return redirect('admin/login');
  });
  Route::prefix('/admin')->group(function () {
    Route::get('/', [AdminDashboard::class, 'index']);
    Route::get('/dashboard', [AdminDashboard::class, 'index']);
    Route::get('/profile', [AdminDashboard::class, 'profile']);
    Route::post('/update-profile', [AdminDashboard::class, 'updateProfile']);

    Route::prefix('/blog-categories')->group(function () {
      Route::get('', [BlogCategoryC::class, 'index']);
      Route::get('get-data', [BlogCategoryC::class, 'getData']);
      Route::get('/delete/{id}', [BlogCategoryC::class, 'delete']);
      Route::get('/update/{id}', [BlogCategoryC::class, 'index']);
      Route::post('/update/{id}', [BlogCategoryC::class, 'update']);
      Route::post('/store-ajax', [BlogCategoryC::class, 'storeAjax']);
    });
    Route::prefix('/blogs')->group(function () {
      Route::get('', [BlogC::class, 'index']);
      Route::get('get-data', [BlogC::class, 'getData']);
      Route::get('/delete/{id}', [BlogC::class, 'delete']);
      Route::get('/update/{id}', [BlogC::class, 'index']);
      Route::post('/update/{id}', [BlogC::class, 'update']);
      Route::post('/store-ajax', [BlogC::class, 'storeAjax']);
    });
    Route::prefix('/product-categories')->group(function () {
      Route::get('', [ProductCategoryC::class, 'index']);
      Route::get('get-data', [ProductCategoryC::class, 'getData']);
      Route::get('/delete/{id}', [ProductCategoryC::class, 'delete']);
      Route::get('/update/{id}', [ProductCategoryC::class, 'index']);
      Route::post('/update/{id}', [ProductCategoryC::class, 'update']);
      Route::post('/store-ajax', [ProductCategoryC::class, 'storeAjax']);
    });
    Route::prefix('/product-sub-categories')->group(function () {
      Route::get('', [ProductSubCategoryC::class, 'index']);
      Route::get('get-data', [ProductSubCategoryC::class, 'getData']);
      Route::get('/delete/{id}', [ProductSubCategoryC::class, 'delete']);
      Route::get('/update/{id}', [ProductSubCategoryC::class, 'index']);
      Route::post('/update/{id}', [ProductSubCategoryC::class, 'update']);
      Route::post('/store-ajax', [ProductSubCategoryC::class, 'storeAjax']);
    });
    Route::prefix('/products')->group(function () {
      Route::get('', [ProductC::class, 'index']);
      Route::get('get-data', [ProductC::class, 'getData']);
      Route::get('/delete/{id}', [ProductC::class, 'delete']);
      Route::get('/update/{id}', [ProductC::class, 'index']);
      Route::post('/update/{id}', [ProductC::class, 'update']);
      Route::post('/store-ajax', [ProductC::class, 'storeAjax']);
    });
    Route::prefix('/authors')->group(function () {
      Route::get('', [AuthorC::class, 'index']);
      Route::get('get-data', [AuthorC::class, 'getData']);
      Route::get('/delete/{id}', [AuthorC::class, 'delete']);
      Route::get('/update/{id}', [AuthorC::class, 'index']);
      Route::post('/update/{id}', [AuthorC::class, 'update']);
      Route::post('/store-ajax', [AuthorC::class, 'storeAjax']);
    });
    Route::prefix('/static-page-seo')->group(function () {
      Route::get('', [StaticPageSeoC::class, 'index']);
      Route::get('get-data', [StaticPageSeoC::class, 'getData']);
      Route::get('/delete/{id}', [StaticPageSeoC::class, 'delete']);
      Route::get('/update/{id}', [StaticPageSeoC::class, 'index']);
      Route::post('/update/{id}', [StaticPageSeoC::class, 'update']);
      Route::post('/store-ajax', [StaticPageSeoC::class, 'storeAjax']);
    });
    Route::prefix('/dynamic-page-seo')->group(function () {
      Route::get('', [DynamicPageSeoC::class, 'index']);
      Route::get('get-data', [DynamicPageSeoC::class, 'getData']);
      Route::get('/delete/{id}', [DynamicPageSeoC::class, 'delete']);
      Route::get('/update/{id}', [DynamicPageSeoC::class, 'index']);
      Route::post('/update/{id}', [DynamicPageSeoC::class, 'update']);
      Route::post('/store-ajax', [DynamicPageSeoC::class, 'storeAjax']);
    });


    Route::prefix('/users')->group(function () {
      Route::get('', [UserC::class, 'index']);
      Route::post('/store', [UserC::class, 'store']);
      Route::get('/delete/{id}', [UserC::class, 'delete']);
      Route::get('/update/{id}', [UserC::class, 'index']);
      Route::post('/update/{id}', [UserC::class, 'update']);
    });
  });
});

Route::prefix('common')->group(function () {
  Route::get('/change-status', [CommonController::class, 'changeStatus']);
  Route::get('/update-field', [CommonController::class, 'updateFieldById']);
  Route::get('/update-bulk-field', [CommonController::class, 'updateBulkField']);

  Route::get('/get-sub-category-by-category', [CommonController::class, 'getSubCategoryByCategory']);
});