<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Country;
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
    return view('front.solutions')->with($data);
  }
  public function catDetail(Request $request)
  {
    $slug = $request->segment(1);
    $categoryDetail = ProductCategory::where('category_slug', $slug)->firstOrFail();
    $otherCategories = ProductCategory::where('id', '!=', $categoryDetail->id)->get();
    $phonecodes = Country::phonecodes()->get();
    // printArray($phonecodes->toArray());
    // die;
    $page_url = url()->current();

    $wrdseo = ['url' => 'category-details'];
    $dseo = DynamicPageSeo::where($wrdseo)->first();

    $title = $categoryDetail->category_name;
    $site = 'mobilitysolution.in';

    $tagArray = ['title' => $title, 'currentmonth' => date('M'), 'currentyear' => date('Y'), 'site' => $site];

    $meta_title = $categoryDetail->meta_title == '' ? $dseo->meta_title : $categoryDetail->meta_title;
    $meta_title = replaceTag($meta_title, $tagArray);

    $meta_keyword = $categoryDetail->meta_keyword == '' ? $dseo->meta_keyword : $categoryDetail->meta_keyword;
    $meta_keyword = replaceTag($meta_keyword, $tagArray);

    $page_content = $categoryDetail->page_content == '' ? $dseo->page_content : $categoryDetail->page_content;
    $page_content = replaceTag($page_content, $tagArray);

    $meta_description = $categoryDetail->meta_description == '' ? $dseo->meta_description : $categoryDetail->meta_description;
    $meta_description = replaceTag($meta_description, $tagArray);

    $og_image_path = $categoryDetail->thumbnail_path == '' ? $dseo->og_image_path : $categoryDetail->thumbnail_path;

    $question = generateMathQuestion();
    session(['captcha_answer' => $question['answer']]);

    $data = compact('categoryDetail', 'page_url', 'dseo', 'site', 'meta_title', 'meta_keyword', 'page_content', 'meta_description', 'og_image_path', 'otherCategories', 'phonecodes', 'question');
    return view('front.product-category')->with($data);
  }
  public function subDetail($sub_category_slug)
  {
    $slug = $sub_category_slug;
    $pageDetail = ProductSubCategory::where('sub_category_slug', $slug)->firstOrFail();
    $otherSubCategories = ProductSubCategory::where('id', '!=', $pageDetail->id)->where('category_id', $pageDetail->category_id)->get();
    $phonecodes = Country::phonecodes()->get();

    $page_url = url()->current();

    $wrdseo = ['url' => 'sub-category-details'];
    $dseo = DynamicPageSeo::where($wrdseo)->first();

    $category = $pageDetail->category->category_name;
    $title = $pageDetail->sub_category_name;
    $site = 'mobilitysolution.in';

    $tagArray = ['title' => $title, 'category' => $category, 'currentmonth' => date('M'), 'currentyear' => date('Y'), 'site' => $site];

    $meta_title = $pageDetail->meta_title == '' ? $dseo->meta_title : $pageDetail->meta_title;
    $meta_title = replaceTag($meta_title, $tagArray);

    $meta_keyword = $pageDetail->meta_keyword == '' ? $dseo->meta_keyword : $pageDetail->meta_keyword;
    $meta_keyword = replaceTag($meta_keyword, $tagArray);

    $page_content = $pageDetail->page_content == '' ? $dseo->page_content : $pageDetail->page_content;
    $page_content = replaceTag($page_content, $tagArray);

    $meta_description = $pageDetail->meta_description == '' ? $dseo->meta_description : $pageDetail->meta_description;
    $meta_description = replaceTag($meta_description, $tagArray);

    $og_image_path = $pageDetail->thumbnail_path == '' ? $dseo->og_image_path : $pageDetail->thumbnail_path;

    $question = generateMathQuestion();
    session(['captcha_answer' => $question['answer']]);

    $data = compact('pageDetail', 'page_url', 'dseo', 'site', 'meta_title', 'meta_keyword', 'page_content', 'meta_description', 'og_image_path', 'otherSubCategories', 'phonecodes', 'question');
    return view('front.product-sub-category')->with($data);
  }
  public function prodDetail($sub_category_slug, $product_slug)
  {
    $slug = $product_slug;
    $pageDetail = Product::where('product_slug', $slug)->firstOrFail();
    $relatedProducts = Product::where('category_id', $pageDetail->category->id)->where('id', '!=', $pageDetail->id)->get();
    $phonecodes = Country::phonecodes()->get();

    $page_url = url()->current();

    $wrdseo = ['url' => 'product-details'];
    $dseo = DynamicPageSeo::where($wrdseo)->first();

    $category = $pageDetail->category->category_name;
    $sub_category = $pageDetail->subCategory->sub_category_name;
    $title = $pageDetail->product_name;
    $site = 'mobilitysolution.in';

    $tagArray = ['title' => $title, 'category' => $category, 'currentmonth' => date('M'), 'currentyear' => date('Y'), 'site' => $site];

    $meta_title = $pageDetail->meta_title == '' ? $dseo->meta_title : $pageDetail->meta_title;
    $meta_title = replaceTag($meta_title, $tagArray);

    $meta_keyword = $pageDetail->meta_keyword == '' ? $dseo->meta_keyword : $pageDetail->meta_keyword;
    $meta_keyword = replaceTag($meta_keyword, $tagArray);

    $page_content = $pageDetail->page_content == '' ? $dseo->page_content : $pageDetail->page_content;
    $page_content = replaceTag($page_content, $tagArray);

    $meta_description = $pageDetail->meta_description == '' ? $dseo->meta_description : $pageDetail->meta_description;
    $meta_description = replaceTag($meta_description, $tagArray);

    $og_image_path = $pageDetail->thumbnail_path == '' ? $dseo->og_image_path : $pageDetail->thumbnail_path;

    $question = generateMathQuestion();
    session(['captcha_answer' => $question['answer']]);

    $data = compact('pageDetail', 'page_url', 'dseo', 'site', 'meta_title', 'meta_keyword', 'page_content', 'meta_description', 'og_image_path', 'relatedProducts', 'question', 'phonecodes');
    return view('front.product-details')->with($data);
  }
}
