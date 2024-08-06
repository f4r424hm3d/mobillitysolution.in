<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width" />
</head>

<body
  style="width:100%;height:100%;background:#efefef;-webkit-font-smoothing:antialiased;-webkit-text-size-adjust:none;color:#3E3E3E;font-family:Helvetica, Arial, sans-serif;line-height:1.65;margin:0;padding:0;">
  <table border="0" cellpadding="0" cellspacing="0"
    style="width:100%;background:#efefef;-webkit-font-smoothing:antialiased;-webkit-text-size-adjust:none;color:#3E3E3E;font-family:Helvetica, Arial, sans-serif;line-height:1.65;margin:0;padding:0;">
    <tr>
      <td valign="top" style="display:block;clear:both;margin:0 auto;max-width:580px;">
        <table border="0" cellpadding="0" cellspacing="0" style="width:100%;border-collapse:collapse;">
          <tr>
            <td valign="top" align="center" class="masthead" style="padding:20px 0;background:#03618c;color:white;">
              <h1 style="font-size:32px;margin:0 auto;max-width:90%;line-height:1.25;">
                <a href="{{ url('/') }}" target="_blank" rel="noopener noreferrer"
                  style="text-decoration:none;color:#ffffff;">{{ config('app.name') }}</a>
                <p style="margin-bottom:0;line-height:12px;font-weight:normal;margin-top:15px;font-size:18px;"></p>
              </h1>
            </td>
          </tr>
          <tr>
            <td valign="top" class="content" style="background:white;padding:20px 35px 10px 35px;">
              <h3>Dear {{ $name }},</h3>
              <p style="text-align: justify">
                Thank you for reaching out to us with your inquiry! We’re excited to assist you with your visa
                application process.
              </p>
              <p>
              <h4>Here are the details you provided:</h4>
              <ul>
                <li>Name: {{ $name }} </li>
                <li>Contact: {{ $country_code }} {{ $mobile }} </li>
                <li>Email: {{ $email }} </li>
                <li>Product: {{ $product }} </li>
              </ul>
              </p>
              <p>
                Our team will review your information and get back to you shortly with the next steps. If you have any
                additional questions or need further assistance in the meantime, feel free to reply to this email or
                contact us directly at <span style="color: #fcb709;font-weight:bold">info@mobilitysolution.in</span>.
              </p>
              <p>We look forward to helping you with your visa application and making your journey a success.</p>
              <hr>
              Best regards, <br>
              {{ config('app.name') }} <br>
              <span style="color: #fcb709;font-weight:bold">info@mobilitysolution.in</span> <br>
              <a href="{{ url('/') }}">Website</a>
            </td>
          </tr>
          <tr>
            <td valign="top" align="center" class="masthead" style="padding:20px 0;background:#03618c;color:white;">
              <h4 style="font-size:12px;margin:0 auto;max-width:90%;line-height:1.25;">
                B-16 ground floor Gurugram, Mayfield Garden,<br>Sector 50, Gurugram
              </h4>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>

</html>
