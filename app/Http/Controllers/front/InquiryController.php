<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use Illuminate\Http\Request;
use Mail;

class InquiryController extends Controller
{
  public function submitContactUs(Request $request)
  {
    // printArray($request->toArray());
    // die;
    $request->validate(
      [
        'name' => 'required',
        'mobile' => 'required|numeric',
        'email' => 'required|email',
        'message' => [
          'required',
          'string',
          'max:500', // You can adjust the max length as needed
          'regex:/^[a-zA-Z0-9\s!@#$%^&*(),.?:"{}|<>]+$/',
        ],
      ]
    );
    $field = new Lead();
    $field->name = $request['name'];
    $field->mobile = $request['mobile'];
    $field->email = $request['email'];
    $field->message = $request['message'];
    $field->source = $request['source'];
    $field->source_path = $request['source_path'];
    $field->save();
    session()->flash('smsg', 'Your inquiry has been submitted succesfully. We will contact you soon.');

    $emaildata = [
      'name' => $request['name'],
      'email' => $request['email'],
      'mobile' => $request['mobile'],
      'inquiry_message' => $request['message'],
      'source' => $request['source'],
      'source_path' => $request['source_path'],
    ];
    $dd = ['to' => $request['email'], 'to_name' => $request['name'], 'subject' => 'Inquiry'];

    Mail::send(
      'mails.inquiry-reply',
      $emaildata,
      function ($message) use ($dd) {
        $message->to($dd['to'], $dd['to_name']);
        $message->subject($dd['subject']);
        $message->priority(1);
      }
    );

    $dd2 = ['to' => TO_EMAIL, 'cc' => CC_EMAIL, 'to_name' => TO_NAME, 'cc_name' => CC_NAME, 'subject' => 'New Inquiry'];

    Mail::send(
      'mails.inquiry-mail-to-team',
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
  public function enquiry(Request $request)
  {
    // printArray($request->toArray());
    // die;
    $request->validate(
      [
        'category' => 'required|numeric',
        'sub_category' => 'required|numeric',
        'name' => 'required',
        'mobile' => 'required|numeric',
        'email' => 'required|email',
        'message' => [
          'required',
          'string',
          'max:500', // You can adjust the max length as needed
          'regex:/^[a-zA-Z0-9\s!@#$%^&*(),.?:"{}|<>]+$/',
        ],
      ]
    );
    $field = new Lead();
    $field->name = $request['name'];
    $field->mobile = $request['mobile'];
    $field->email = $request['email'];
    $field->message = $request['message'];
    $field->source = $request['source'];
    $field->source_path = $request['source_path'];
    $field->category_id = $request['category'];
    $field->sub_category_id = $request['sub_category'];
    $field->save();
    session()->flash('smsg', 'Your inquiry has been submitted succesfully. We will contact you soon.');

    $pc = ProductCategory::find($request['category']);
    $psc = ProductSubCategory::find($request['sub_category']);

    $emaildata = [
      'name' => $request['name'],
      'email' => $request['email'],
      'mobile' => $request['mobile'],
      'inquiry_message' => $request['message'],
      'source' => $request['source'],
      'source_path' => $request['source_path'],
      'category' => $pc->category_name,
      'sub_category' => $psc->sub_category_name,
    ];
    $dd = ['to' => $request['email'], 'to_name' => $request['name'], 'subject' => 'Product Enquiry'];

    Mail::send(
      'mails.inquiry-reply',
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

  public function thankyou(Request $request)
  {
    $title = 'Thank You';
    $page_url = url()->current();

    $data = compact('title', 'page_url');
    return view('front.thank-you')->with($data);
  }
}
