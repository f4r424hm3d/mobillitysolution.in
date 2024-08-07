<?php

use App\Http\Controllers\admin\AdminDashboard;
use App\Http\Controllers\admin\AdminLogin;
use App\Http\Controllers\admin\AuthorC;
use App\Http\Controllers\admin\BlogC;
use App\Http\Controllers\admin\BlogCategoryC;
use App\Http\Controllers\admin\DefaultOgImageC;
use App\Http\Controllers\admin\DynamicPageSeoC;
use App\Http\Controllers\admin\EmployeeC;
use App\Http\Controllers\admin\EmployeeStatusC;
use App\Http\Controllers\admin\HomePageBannerC;
use App\Http\Controllers\admin\JobApplicationC;
use App\Http\Controllers\admin\JobVacancyC as JV;
use App\Http\Controllers\admin\LeadC;
use App\Http\Controllers\admin\ProductC;
use App\Http\Controllers\admin\ProductCategoryC;
use App\Http\Controllers\admin\ProductContentC;
use App\Http\Controllers\admin\ProductSubCategoryC;
use App\Http\Controllers\admin\StaticPageSeoC;
use App\Http\Controllers\admin\UserC;
use App\Http\Controllers\admin\ProductCategoryFaqC;
use App\Http\Controllers\admin\ProductFaqC;
use App\Http\Controllers\admin\ProductGalleryC;
use App\Http\Controllers\admin\ProductSubCategoryFaqC;
use App\Http\Controllers\admin\TeamC;
use App\Http\Controllers\admin\UploadFilesC;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\front\AboutFc;
use App\Http\Controllers\front\AjaxFc;
use App\Http\Controllers\front\BlogFc;
use App\Http\Controllers\front\CareerFc;
use App\Http\Controllers\front\ContactFc;
use App\Http\Controllers\front\HomeFc;
use App\Http\Controllers\front\InquiryController;
use App\Http\Controllers\front\SolutionFc;
use App\Http\Controllers\front\TeamFc;
use App\Http\Controllers\front\ThankYou;
use App\Models\Blog;
use App\Models\JobVacancy;
use App\Models\Product;
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
Route::get('/about-us', [AboutFc::class, 'index']);
Route::get('/what-make-us-different', [AboutFc::class, 'whatMakeUsDifferent']);
//Route::get('team', [HomeFc::class, 'team']);
Route::get('/privacy-policy', [HomeFc::class, 'privacyPolicy']);
Route::get('/contact-us', [ContactFc::class, 'index']);
Route::post('/contact', [ContactFc::class, 'submitInquiry']);
Route::get('/enquiry', [InquiryController::class, 'index']);
Route::post('/enquiry', [InquiryController::class, 'store']);
Route::get('/career', [CareerFc::class, 'index']);
Route::post('/career/apply', [CareerFc::class, 'apply']);

Route::get('team', [TeamFc::class, 'team']);
Route::get('team/{slug}', [TeamFc::class, 'userDetail']);

Route::get('/thank-you', [ThankYou::class, 'index']);



Route::get('/articles', [BlogFc::class, 'index']);
Route::get('/articles/{slug}', [BlogFc::class, 'blogByCategory']);
$blogs = Blog::all();
foreach ($blogs as $row) {
  Route::get('/' . $row->slug, [BlogFc::class, 'blogdetail']);
}


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
    Route::prefix('/category-faqs/')->group(function () {
      Route::get('/get-data', [ProductCategoryFaqC::class, 'getData']);
      Route::get('/delete/{id}', [ProductCategoryFaqC::class, 'delete']);
      Route::post('/store-ajax', [ProductCategoryFaqC::class, 'storeAjax']);
      Route::get('/{category_id}/', [ProductCategoryFaqC::class, 'index']);
      Route::get('{category_id}/update/{id}', [ProductCategoryFaqC::class, 'index']);
      Route::post('{category_id}/update/{id}', [ProductCategoryFaqC::class, 'update']);
    });
    Route::prefix('/product-sub-categories')->group(function () {
      Route::get('', [ProductSubCategoryC::class, 'index']);
      Route::get('get-data', [ProductSubCategoryC::class, 'getData']);
      Route::get('/delete/{id}', [ProductSubCategoryC::class, 'delete']);
      Route::get('/update/{id}', [ProductSubCategoryC::class, 'index']);
      Route::post('/update/{id}', [ProductSubCategoryC::class, 'update']);
      Route::post('/store-ajax', [ProductSubCategoryC::class, 'storeAjax']);
    });
    Route::prefix('/sub-category-faqs/')->group(function () {
      Route::get('/get-data', [ProductSubCategoryFaqC::class, 'getData']);
      Route::get('/delete/{id}', [ProductSubCategoryFaqC::class, 'delete']);
      Route::post('/store-ajax', [ProductSubCategoryFaqC::class, 'storeAjax']);
      Route::get('/{sub_category_id}/', [ProductSubCategoryFaqC::class, 'index']);
      Route::get('{sub_category_id}/update/{id}', [ProductSubCategoryFaqC::class, 'index']);
      Route::post('{sub_category_id}/update/{id}', [ProductSubCategoryFaqC::class, 'update']);
    });
    Route::prefix('/products')->group(function () {
      Route::get('', [ProductC::class, 'index']);
      Route::get('/delete/{id}', [ProductC::class, 'delete']);
      Route::get('/update/{id}', [ProductC::class, 'index']);
      Route::post('/update/{id}', [ProductC::class, 'update']);
      Route::post('/store', [ProductC::class, 'store']);
      Route::get('/get-sub-category-by-category', [ProductC::class, 'getSubCategoryByCategory']);
    });
    Route::prefix('/product-content/')->group(function () {
      Route::get('/get-data', [ProductContentC::class, 'getData']);
      Route::get('/delete/{id}', [ProductContentC::class, 'delete']);
      Route::post('/store-ajax', [ProductContentC::class, 'storeAjax']);
      Route::get('/{product_id}/', [ProductContentC::class, 'index']);
      Route::get('{product_id}/update/{id}', [ProductContentC::class, 'index']);
      Route::post('{product_id}/update/{id}', [ProductContentC::class, 'update']);
    });
    Route::prefix('/product-gallery/')->group(function () {
      Route::get('/get-data', [ProductGalleryC::class, 'getData']);
      Route::get('/delete/{id}', [ProductGalleryC::class, 'delete']);
      Route::post('/store-ajax', [ProductGalleryC::class, 'storeAjax']);
      Route::get('/{product_id}/', [ProductGalleryC::class, 'index']);
      Route::get('{product_id}/update/{id}', [ProductGalleryC::class, 'index']);
      Route::post('{product_id}/update/{id}', [ProductGalleryC::class, 'update']);
    });
    Route::prefix('/product-faqs/')->group(function () {
      Route::get('/get-data', [ProductFaqC::class, 'getData']);
      Route::get('/delete/{id}', [ProductFaqC::class, 'delete']);
      Route::post('/store-ajax', [ProductFaqC::class, 'storeAjax']);
      Route::get('/{product_id}/', [ProductFaqC::class, 'index']);
      Route::get('{product_id}/update/{id}', [ProductFaqC::class, 'index']);
      Route::post('{product_id}/update/{id}', [ProductFaqC::class, 'update']);
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
      Route::get('add', [DynamicPageSeoC::class, 'index']);
      Route::get('get-data', [DynamicPageSeoC::class, 'getData']);
      Route::get('/delete/{id}', [DynamicPageSeoC::class, 'delete']);
      Route::get('/update/{id}', [DynamicPageSeoC::class, 'index']);
      Route::post('/update/{id}', [DynamicPageSeoC::class, 'update']);
      Route::post('/store-ajax', [DynamicPageSeoC::class, 'storeAjax']);
    });
    Route::prefix('/default-og-image')->group(function () {
      Route::get('/', [DefaultOgImageC::class, 'index']);
      Route::get('add/', [DefaultOgImageC::class, 'index']);
      Route::post('/store/', [DefaultOgImageC::class, 'store']);
      Route::get('/delete/{id}/', [DefaultOgImageC::class, 'delete']);
      Route::get('/update/{id}/', [DefaultOgImageC::class, 'index']);
      Route::post('/update/{id}/', [DefaultOgImageC::class, 'update']);
    });
    Route::prefix('/upload-files')->group(function () {
      Route::get('/', [UploadFilesC::class, 'index']);
      Route::get('/get-data', [UploadFilesC::class, 'getData']);
      Route::get('/delete/{id}', [UploadFilesC::class, 'delete']);
      Route::post('/store-ajax', [UploadFilesC::class, 'storeAjax']);
      Route::get('/update/{id}', [UploadFilesC::class, 'index']);
      Route::post('/update/{id}', [UploadFilesC::class, 'update']);
    });
    Route::prefix('/team')->group(function () {
      Route::get('/', [TeamC::class, 'index']);
      Route::get('/get-data', [TeamC::class, 'getData']);
      Route::get('/delete/{id}', [TeamC::class, 'delete']);
      Route::post('/store-ajax', [TeamC::class, 'storeAjax']);
      Route::get('/update/{id}', [TeamC::class, 'index']);
      Route::post('/update/{id}', [TeamC::class, 'update']);
    });
    Route::prefix('/job-vacancy')->group(function () {
      Route::get('/', [JV::class, 'index']);
      Route::get('/get-data', [JV::class, 'getData']);
      Route::get('/delete/{id}', [JV::class, 'delete']);
      Route::post('/store-ajax', [JV::class, 'storeAjax']);
      Route::get('/update/{id}', [JV::class, 'index']);
      Route::post('/update/{id}', [JV::class, 'update']);
    });
    Route::prefix('/job-application')->group(function () {
      Route::get('/', [JobApplicationC::class, 'index']);
      Route::get('/get-data', [JobApplicationC::class, 'getData']);
      Route::get('/delete/{id}', [JobApplicationC::class, 'delete']);
      Route::post('/store-ajax', [JobApplicationC::class, 'storeAjax']);
      Route::get('/update/{id}', [JobApplicationC::class, 'index']);
      Route::post('/update/{id}', [JobApplicationC::class, 'update']);
    });
    Route::prefix('/leads')->group(function () {
      Route::get('/', [LeadC::class, 'index']);
      Route::get('/get-data', [LeadC::class, 'getData']);
      Route::get('/delete/{id}', [LeadC::class, 'delete']);
      Route::post('/store-ajax', [LeadC::class, 'storeAjax']);
      Route::get('/update/{id}', [LeadC::class, 'index']);
      Route::post('/update/{id}', [LeadC::class, 'update']);
    });
    Route::prefix('/home-page-banner')->group(function () {
      Route::get('/', [HomePageBannerC::class, 'index']);
      Route::get('/get-data', [HomePageBannerC::class, 'getData']);
      Route::get('/delete/{id}', [HomePageBannerC::class, 'delete']);
      Route::post('/store-ajax', [HomePageBannerC::class, 'storeAjax']);
      Route::get('/update/{id}', [HomePageBannerC::class, 'index']);
      Route::post('/update/{id}', [HomePageBannerC::class, 'update']);
    });
    Route::prefix('/users')->group(function () {
      Route::get('', [UserC::class, 'index']);
      Route::post('/store', [UserC::class, 'store']);
      Route::get('/delete/{id}', [UserC::class, 'delete']);
      Route::get('/update/{id}', [UserC::class, 'index']);
      Route::post('/update/{id}', [UserC::class, 'update']);
    });
    Route::prefix('/employees')->group(function () {
      Route::get('', [EmployeeC::class, 'index']);
      Route::post('/store', [EmployeeC::class, 'store']);
      Route::get('/get-data', [EmployeeC::class, 'getData']);
      Route::get('/delete/{id}', [EmployeeC::class, 'delete']);
      Route::get('/update/{id}', [EmployeeC::class, 'index']);
      Route::post('/update/{id}', [EmployeeC::class, 'update']);
    });
    Route::prefix('/employee-statuses')->group(function () {
      Route::get('', [EmployeeStatusC::class, 'index']);
      Route::post('/store', [EmployeeStatusC::class, 'store']);
      Route::get('/get-data', [EmployeeStatusC::class, 'getData']);
      Route::get('/delete/{id}', [EmployeeStatusC::class, 'delete']);
      Route::get('/update/{id}', [EmployeeStatusC::class, 'index']);
      Route::post('/update/{id}', [EmployeeStatusC::class, 'update']);
    });
  });
});

// web.php
Route::get('/get/subcategories', [AjaxFc::class, 'getSubCategories']);
Route::get('/get/products', [AjaxFc::class, 'getProducts']);


Route::prefix('common')->group(function () {
  Route::get('/change-status', [CommonController::class, 'changeStatus']);
  Route::get('/update-field', [CommonController::class, 'updateFieldById']);
  Route::get('/update-bulk-field', [CommonController::class, 'updateBulkField']);

  Route::get('/get-sub-category-by-category', [CommonController::class, 'getSubCategoryByCategory']);
});

Route::get('/solutions', [SolutionFc::class, 'index']);

$cat = ProductCategory::all();
foreach ($cat as $row) {
  Route::get($row->category_slug, [SolutionFc::class, 'catDetail']);
  Route::get($row->category_slug . '/{sub_category_slug}', [SolutionFc::class, 'subDetail']);
  Route::get($row->category_slug . '/{sub_category_slug}/{product_slug}', [SolutionFc::class, 'prodDetail']);
}
