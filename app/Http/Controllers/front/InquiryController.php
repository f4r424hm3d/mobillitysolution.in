<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Lead;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Rules\MathCaptchaValidationRule;

class InquiryController extends Controller
{
  public function index(Request $request)
  {
    $categories = ProductCategory::all();
    $subCategories = ProductSubCategory::all();
    $products = Product::all();
    $countries = Country::all();
    $phonecodes = Country::orderBy('phonecode', 'asc')->get();
    $question = generateMathQuestion();
    session(['captcha_answer' => $question['answer']]);
    $data = compact('categories', 'subCategories', 'products', 'countries', 'phonecodes', 'question');
    return view('front.enquiry')->with($data);
  }
  public function store(Request $request)
  {
    // printArray($request->toArray());
    // die;
    $request->validate(
      [
        'captcha_answer' => ['required', 'numeric', new MathCaptchaValidationRule()],
        'name' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/'],
        'country_code' => 'required|numeric',
        'mobile' => 'required|numeric',
        'email' => 'required|email',
        'product_category' => ['required', 'numeric', 'exists:product_categories,id'],
        'product_sub_category' => ['required', 'numeric', 'exists:product_sub_categories,id'],
        'product' => ['required', 'numeric', 'exists:products,id'],
      ]
    );

    $field = new Lead();
    $field->name = $request['name'];
    $field->country_code = $request['country_code'];
    $field->mobile = $request['mobile'];
    $field->email = $request['email'];
    $field->source = $request['source'];
    $field->source_path = $request['source_path'];
    $field->category_id = $request['product_category'];
    $field->sub_category_id = $request['product_sub_category'];
    $field->product_id = $request['product'];
    $field->save();
    session()->flash('smsg', 'Your inquiry has been submitted succesfully. We will contact you soon.');

    $pc = ProductCategory::find($request['product_category']);
    $psc = ProductSubCategory::find($request['product_sub_category']);
    $p = Product::find($request['product']);

    $emaildata = [
      'name' => $request['name'],
      'email' => $request['email'],
      'country_code' => $request['country_code'],
      'mobile' => $request['mobile'],
      'source' => $request['source'],
      'source_path' => $request['source_path'],
      'category' => $pc->category_name,
      'sub_category' => $psc->sub_category_name,
      'product' => $p->product_name,
    ];
    $dd = ['to' => $request['email'], 'to_name' => $request['name'], 'subject' => 'Product Enquiry'];

    Mail::send(
      'mails.product-inquiry-reply',
      $emaildata,
      function ($message) use ($dd) {
        $message->to($dd['to'], $dd['to_name']);
        $message->subject($dd['subject']);
        $message->priority(1);
      }
    );

    $dd2 = ['to' => TO_EMAIL, 'cc' => CC_EMAIL, 'to_name' => TO_NAME, 'cc_name' => CC_NAME, 'subject' => 'New Product Enquiry'];

    Mail::send(
      'mails.product-enquiry-mail-to-team',
      $emaildata,
      function ($message) use ($dd2) {
        $message->to($dd2['to'], $dd2['to_name']);
        $message->cc($dd2['cc'], $dd2['cc_name']);
        $message->subject($dd2['subject']);
        $message->priority(1);
      }
    );

    // $api_url = "https://www.tutelagestudy.com/crm/Api/submitInquiryFromTutelageWeb";
    // $form_data = $emaildata;
    // //echo json_encode($form_data, true);
    // $client = curl_init($api_url);
    // curl_setopt($client, CURLOPT_POST, true);
    // curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
    // curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
    // $response = curl_exec($client);
    // curl_close($client);

    return redirect('thank-you');
  }
}
