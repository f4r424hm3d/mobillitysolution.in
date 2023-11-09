<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\DynamicPageSeo;
use App\Models\JobApplication;
use App\Models\JobVacancy;
use Illuminate\Http\Request;
use Mail;

class CareerFc extends Controller
{
  public function index(Request $request)
  {
    $jobs = JobVacancy::whereStatus(1)->get();
    $data = compact('jobs');
    return view('front.career')->with($data);
  }
  public function jobDetail(Request $request)
  {
    $slug = $request->segment(1);
    $row = JobVacancy::where('slug', $slug)->firstOrFail();
    $jobs = JobVacancy::whereStatus(1)->get();
    $page_url = url()->current();

    $wrdseo = ['url' => 'job-details'];
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

    $data = compact('row', 'page_url', 'dseo', 'site', 'meta_title', 'meta_keyword', 'page_content', 'meta_description', 'og_image_path', 'jobs');
    return view('front.job-details')->with($data);
  }
  public function applyJob(Request $request)
  {
    // printArray($request->toArray());
    // die;
    $request->validate(
      [
        'position' => 'required|numeric',
        'name' => 'required',
        'mobile' => 'required|numeric',
        'email' => 'required|email',
        'experience' => 'required',
        'resume' => 'required|max:1024|mimes:pdf',
        'message' => [
          'nullable',
          'string',
          'max:500', // You can adjust the max length as needed
          'regex:/^[a-zA-Z0-9\s!@#$%^&*(),.?:"{}|<>]+$/',
        ],
      ]
    );
    $field = new JobApplication();
    $field->name = $request['name'];
    $field->mobile = $request['mobile'];
    $field->email = $request['email'];
    $field->experience = $request['experience'];
    $field->message = $request['message'];
    $field->position_id = $request['position'];
    if ($request->hasFile('resume')) {
      $fileOriginalName = $request->file('resume')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('resume')->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $request->file('resume')->move('uploads/resume/', $file_name);
      if ($move) {
        $field->resume = $file_name;
        $field->resume_path = 'uploads/resume/' . $file_name;
      }
    }
    $field->save();
    session()->flash('smsg', 'Your Job Application has been submitted succesfully. We will contact you soon.');

    $position = JobVacancy::find($request['position']);

    $emaildata = [
      'name' => $request['name'],
      'email' => $request['email'],
      'mobile' => $request['mobile'],
      'experience' => $request['experience'],
      'inquiry_message' => $request['message'],
      'position' => $position->designation,
    ];
    $dd = ['to' => $request['email'], 'to_name' => $request['name'], 'subject' => 'Job Application | ' . $position->designation];

    Mail::send(
      'mails.inquiry-reply',
      $emaildata,
      function ($message) use ($dd) {
        $message->to($dd['to'], $dd['to_name']);
        $message->subject($dd['subject']);
        $message->priority(1);
      }
    );

    $dd2 = ['to' => TO_EMAIL, 'cc' => CC_EMAIL, 'to_name' => TO_NAME, 'cc_name' => CC_NAME, 'subject' => 'New Job Application | ' . $position->designation, 'resume' => $field->resume_path];

    Mail::send(
      'mails.job-application-mail-to-team',
      $emaildata,
      function ($message) use ($dd2) {
        $message->to($dd2['to'], $dd2['to_name']);
        $message->cc($dd2['cc'], $dd2['cc_name']);
        $message->subject($dd2['subject']);
        $message->priority(1);
        // Attach a file to the email
        $message->attach($dd2['resume'], [
          'mime' => 'application/pdf',
        ]);
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
