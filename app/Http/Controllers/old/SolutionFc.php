<?php

namespace App\Http\Controllers\old;

use App\Http\Controllers\Controller;
use App\Models\DynamicPageSeo;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use Illuminate\Http\Request;

class SolutionFc extends Controller
{
  public function index(Request $request)
  {
    $productCategories = ProductCategory::all();
    $data = compact('productCategories');
    return view('old.solutions')->with($data);
  }
  public function catDetail(Request $request)
  {
    $slug = $request->segment(1);
    $row = ProductCategory::where('category_slug', $slug)->firstOrFail();

    $page_url = url()->current();

    $wrdseo = ['url' => 'category-details'];
    $dseo = DynamicPageSeo::where($wrdseo)->first();

    $title = $row->category_name;
    $site = 'mobilitysolution.in';

    $tagArray = ['title' => $title, 'currentmonth' => date('M'), 'currentyear' => date('Y'), 'site' => $site];

    $meta_title = $row->meta_title == '' ? $dseo->meta_title : $row->meta_title;
    $meta_title = replaceTag($meta_title, $tagArray);

    $meta_keyword = $row->meta_keyword == '' ? $dseo->meta_keyword : $row->meta_keyword;
    $meta_keyword = replaceTag($meta_keyword, $tagArray);

    $page_content = $row->page_content == '' ? $dseo->page_content : $row->page_content;
    $page_content = replaceTag($page_content, $tagArray);

    $meta_description = $row->meta_description == '' ? $dseo->meta_description : $row->meta_description;
    $meta_description = replaceTag($meta_description, $tagArray);

    $og_image_path = $row->thumbnail_path == '' ? $dseo->og_image_path : $row->thumbnail_path;

    $data = compact('row', 'page_url', 'dseo', 'site', 'meta_title', 'meta_keyword', 'page_content', 'meta_description', 'og_image_path');
    return view('old.product-category')->with($data);
  }
  public function subDetail(Request $request)
  {
    $slug = $request->segment(1);
    $row = ProductSubCategory::where('sub_category_slug', $slug)->firstOrFail();

    $page_url = url()->current();

    $wrdseo = ['url' => 'sub-category-details'];
    $dseo = DynamicPageSeo::where($wrdseo)->first();

    $category = $row->getCategory->category_name;
    $title = $row->sub_category_name;
    $site = 'mobilitysolution.in';

    $tagArray = ['title' => $title, 'category' => $category, 'currentmonth' => date('M'), 'currentyear' => date('Y'), 'site' => $site];

    $meta_title = $row->meta_title == '' ? $dseo->meta_title : $row->meta_title;
    $meta_title = replaceTag($meta_title, $tagArray);

    $meta_keyword = $row->meta_keyword == '' ? $dseo->meta_keyword : $row->meta_keyword;
    $meta_keyword = replaceTag($meta_keyword, $tagArray);

    $page_content = $row->page_content == '' ? $dseo->page_content : $row->page_content;
    $page_content = replaceTag($page_content, $tagArray);

    $meta_description = $row->meta_description == '' ? $dseo->meta_description : $row->meta_description;
    $meta_description = replaceTag($meta_description, $tagArray);

    $og_image_path = $row->thumbnail_path == '' ? $dseo->og_image_path : $row->thumbnail_path;

    $data = compact('row', 'page_url', 'dseo', 'site', 'meta_title', 'meta_keyword', 'page_content', 'meta_description', 'og_image_path');
    return view('old.product-sub-category')->with($data);
  }
  public function prodDetail(Request $request)
  {
    $slug = $request->segment(1);
    $row = Product::where('product_slug', $slug)->firstOrFail();

    $relatedProducts = Product::where('category_id', $row->getCategory->id)->where('id', '!=', $row->id)->limit(6)->get();

    $page_url = url()->current();

    $wrdseo = ['url' => 'product-details'];
    $dseo = DynamicPageSeo::where($wrdseo)->first();

    $category = $row->getCategory->category_name;
    $sub_category = $row->getSubCategory->sub_category_name;
    $title = $row->product_name;
    $site = 'mobilitysolution.in';

    $tagArray = ['title' => $title, 'category' => $category, 'currentmonth' => date('M'), 'currentyear' => date('Y'), 'site' => $site];

    $meta_title = $row->meta_title == '' ? $dseo->meta_title : $row->meta_title;
    $meta_title = replaceTag($meta_title, $tagArray);

    $meta_keyword = $row->meta_keyword == '' ? $dseo->meta_keyword : $row->meta_keyword;
    $meta_keyword = replaceTag($meta_keyword, $tagArray);

    $page_content = $row->page_content == '' ? $dseo->page_content : $row->page_content;
    $page_content = replaceTag($page_content, $tagArray);

    $meta_description = $row->meta_description == '' ? $dseo->meta_description : $row->meta_description;
    $meta_description = replaceTag($meta_description, $tagArray);

    $og_image_path = $row->thumbnail_path == '' ? $dseo->og_image_path : $row->thumbnail_path;

    $data = compact('row', 'page_url', 'dseo', 'site', 'meta_title', 'meta_keyword', 'page_content', 'meta_description', 'og_image_path', 'relatedProducts');
    return view('old.product-details')->with($data);
  }
}
