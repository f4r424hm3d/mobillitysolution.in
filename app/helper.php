<?php

use Carbon\Carbon;

define('TO_EMAIL', 'studytutelage@gmail.com');
define('TO_NAME', 'Tutelage Study');
define('CC_EMAIL', 'amanahlawat1918@gmail.com');
define('CC_NAME', 'Aman Ahlawat');

// define('TO_EMAIL', 'farazahmad280@gmail.com');
// define('TO_NAME', 'Mohd Faraz');
// define('CC_EMAIL', '4hm3df4r42@gmail.com');
// define('CC_NAME', 'Tutelage Study');

if (!function_exists('printArray')) {
  function printArray($data)
  {
    echo "<pre>";
    print_r($data);
    echo "</pre>";
  }
}
if (!function_exists('getFormattedDate')) {
  function getFormattedDate($date, $formate)
  {
    return date($formate, strtotime($date));
  }
}
if (!function_exists('slugify')) {
  function slugify($text)
  {
    // Swap out Non "Letters" with a -
    $text = preg_replace('/[^\\pL\d]+/u', '-', $text);
    // Trim out extra -'s
    $text = trim($text, '-');
    // Convert letters that we have left to the closest ASCII representation
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    // Make text lowercase
    $text = strtolower($text);
    // Strip out anything we haven't been able to convert
    $text = preg_replace('/[^-\w]+/', '', $text);
    return $text;
  }
}
if (!function_exists('dateDiff')) {
  function dateDiff($date1, $date2)
  {
    $date1_ts = strtotime($date1);
    $date2_ts = strtotime($date2);
    return $days_between = ceil(abs($date2_ts - $date1_ts) / 86400);
  }
}
if (!function_exists('aurl')) {
  function aurl($path = null)
  {
    $path = strtolower($path);
    if ($path != '') {
      return url('/admin/' . $path);
    } else {
      return url('/admin/');
    }
  }
}
if (!function_exists('uurl')) {
  function uurl($path = null)
  {
    $path = strtolower($path);
    if ($path != '') {
      return url('/user/' . $path);
    } else {
      return url('/user/');
    }
  }
}
if (!function_exists('j2s')) {
  function j2s($data)
  {
    $sm = json_decode($data);
    return $sm = implode(' , ', $sm);
  }
}
if (!function_exists('replaceTag')) {
  function replaceTag($string, $array)
  {
    foreach ($array as $key => $value) {
      $string = $string == null ? null : str_replace('%' . $key . '%', $value, $string);
    }
    $string = trim(preg_replace('/\s+/', ' ', $string));
    $string = ucwords($string);
    return $string;
  }
}
if (!function_exists('profilePic')) {
  function profilePic($path = null)
  {
    if ($path != '') {
      return asset($path);
    } else {
      return asset('front/icons/icon.jpg');
    }
  }
}
if (!function_exists('checkOddOrEven')) {
  function checkOddOrEven($number)
  {
    if ($number % 2 == 0) {
      $result = "even";
    } else {
      $result = "odd";
    }
    return $result;
  }
}
if (!function_exists('generateMathQuestion')) {
  function generateMathQuestion()
  {
    $num1 = rand(1, 10);
    $num2 = rand(1, 10);
    $operator = ['+', '-', '*'][rand(0, 2)];

    $questionText = "$num1 $operator $num2";
    $answer = eval("return $num1 $operator $num2;");

    return [
      'text' => $questionText,
      'answer' => $answer,
    ];
  }
}
if (!function_exists('getISOFormatTime')) {
  /**
   * Get the ISO 8601 formatted time.
   *
   * @param  string  $time
   * @return string
   */
  function getISOFormatTime($time)
  {
    $time = Carbon::parse($time);
    return $time->format('Y-m-d\TH:i:sP');
  }
}
