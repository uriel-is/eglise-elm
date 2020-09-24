<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
  <meta name="generator" content="HTML Tidy for Linux (vers 25 March 2009), see www.w3.org">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="format-detection" content="telephone=no">
  <meta name="x-apple-disable-message-reformatting">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>{{InvoiceTitle}}</title>
  <style type="text/css">
    /*<![CDATA[*/
    /* -------------------------------------
          GLOBAL RESETS
      ------------------------------------- */
    img {
      border: none;
      -ms-interpolation-mode: bicubic;
      max-width: 100%;
    }

    body {
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif, tahoma;
      -webkit-font-smoothing: antialiased;
      font-size: 14px;
      line-height: 1.4;
      margin: 0;
      padding: 0;
      -ms-text-size-adjust: 100%;
      -webkit-text-size-adjust: 100%;
    }

    table {
      border-collapse: separate;
      mso-table-lspace: 0pt;
      mso-table-rspace: 0pt;
      width: 100%;
    }

    table td {
      font-family: sans-serif;
      font-size: 14px;
      vertical-align: top;
    }

    /* -------------------------------------
          BODY & CONTAINER
      ------------------------------------- */

    .wn-body {
      background-color: #edf0f3;
      width: 100%;
      max-width: 100%;
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif, tahoma;
    }

    .mec-invoice-table-container {
      max-width: 1002px;
      margin: 0 auto !important;
    }

    .wn-footer {
      clear: both;
      margin-top: 10px;
      width: 100%;
      color: #999999;
      font-size: 12px;
      text-align: center;
      padding-bottom: 20px;
    }

    .wn-footer a {
      color: #868991;
    }

    /* -------------------------------------
          TYPOGRAPHY
      ------------------------------------- */
    h1,
    h2,
    h3,
    h4 {
      color: #1b1e2f;
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif, tahoma;
      font-weight: 400;
      line-height: 1.4;
      margin: 0;
      margin-bottom: 15px;
    }

    h1 {
      font-size: 35px;
      font-weight: 400;
      text-transform: capitalize;
    }

    p,
    ul,
    ol {
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif, tahoma;
      font-size: 14px;
      font-weight: normal;
      margin: 0;
      margin-bottom: 15px;
      line-height: 1.68;
      color: #1b1e2f;
    }

    p li,
    ul li,
    ol li {
      list-style-position: inside;
      margin-left: 5px;
    }

    a {
      color: #3498db;
      text-decoration: underline;
    }

    .mec-invoice-attendee {
      padding-bottom: 20px;
      padding-right: 10px;
      margin-bottom: 25px;
      border-bottom: 1px solid #e7e8e9;
      clear: both;
      overflow: hidden;
    }

    .mec-invoice-attendee img.attendee-profile {
      float: left;
      width: 60px;
      height: 60px;
      border-radius: 60px;
      margin-right: 12px;
    }

    .mec-invoice-attendee img.attendee-qr {
      float: right;
      width: 82px;
      height: 82px;
      border-radius: 0;
      margin-left: 12px;
    }

    .mec-invoice-header,
    .mec-invoice-body {
      border: 1px solid #e7e8e9;
    }




    @media only screen and (max-width: 1025px) {

      .wn-body table tr td.mec-invoice-body-half1,
      .wn-body table tr td.mec-invoice-body-half2 {
        max-width: 100% !important;
        display: block !important;
      }

      .wn-body table tr td.mec-invoice-body-half2 {
        width: 100% !important;
        border-top: 1px solid #e7e8e9;
        border-right: 1px solid #e7e8e9;
      }
    }

    @media only screen and (max-width: 960px) {
      .wn-body table td {
        max-width: 100% !important;
        display: block !important;
      }

      .wn-body table.mec-invoice-items-table-wrap td,
      .wn-body table.mec-invoice-items-table-wrap th,
      .wn-body table td.mec-invoice-organizer-half1 td,
      .wn-body table td.mec-invoice-organizer-half2 td {
        display: table-cell !important;
      }

      .wn-body table td.mec-invoice-organizer-half1 {
        padding: 10px 5px 5px 40px !important;
      }

      .wn-body table td.mec-invoice-organizer-half2 {
        padding: 5px 5px 40px 35px !important;
      }

      .wn-body table td.mec-invoice-organizer-half2 table {
        border: none !important;
      }

      .wn-body table td.mec-invoice-organizer-half2 table td {
        padding-left: 5px !important;
      }

      .wn-body table td.mec-invoice-body-qr-code {
        padding-top: 0px !important;
        text-align: right;
        width: auto !important;
      }

      .wn-body table td.mec-invoice-body-qr-code img {
        display: inline-block !important;
      }

      .mec-invoice-table-container {
        max-width: 700px !important;
      }
    }

    @media only screen and (max-width: 768px) {
      .mec-invoice-table-container {
        max-width: 600px !important;
      }

      .mec-invoice-title a.mec-invoice-print-btn {
        display: none !important;
      }

      .mec-invoice-title a.mec-invoice-pdf-btn {
        padding: 0 15px !important;
        font-size: 12px !important;
      }

      .mec-invoice-total-p {
        font-size: 14px !important;
      }

      .wn-body table td.mec-invoice-organizer-half1,
      .wn-body table td.mec-invoice-organizer-half2 {
        width: 100% !important;
        padding: 10px 40px !important;
      }

      .wn-body table td.mec-invoice-organizer-half2 {
        padding-bottom: 40px !important;
      }
    }

    @media only screen and (max-width: 640px) {
      .mec-invoice-table-container {
        max-width: 440px !important;
      }

      .mec-invoice-title {
        font-size: 15px !important;
      }

      .wn-body table.mec-invoice-items-table-wrap tfoot td {
        width: 100% !important;
        display: block !important;
        padding: 5px !important;
      }
    }

    @media only screen and (min-width: 769px) and (max-width: 960px) {

      .wn-body table td.mec-invoice-organizer-half1,
      .wn-body table td.mec-invoice-organizer-half2 {
        display: table-cell !important;
        width: 50% !important;
        padding: 10px 5px 40px 10px !important;
      }

      .wn-body table td.mec-invoice-organizer-image {
        width: 40px !important;
        height: 40px !important;
        display: table-cell !important;
        padding: 10px !important;
      }

      .wn-body table td.mec-invoice-organizer-image img {
        width: 40px !important;
        height: 40px !important;
      }
    }

    @media only screen and (max-width: 480px) {
      .mec-invoice-table-container {
        max-width: 420px !important;
      }

      .mec-invoice-total-p {
        font-size: 12px !important;
      }
    }



    @media print {
      .mec-invoice-title {
        background: #f0f0f0 !important;
        color: #000 !important;
        box-shadow: none !important;
        text-align: center !important;
        ;
      }

      .mec-invoice-title a,
      .powered-by-mec {
        display: none !important;
      }

      .wn-body table tr td.mec-invoice-body-half1,
      .wn-body table tr td.mec-invoice-body-half2 {
        max-width: 100% !important;
        display: block !important;
        border: none !important;
      }

      .mec-invoice-header,
      .mec-invoice-body {
        box-shadow: none !important;
        border: 1px solid #ddd !important;
        border-radius: 0 !important;
      }

      .mec-invoice-total-p {
        color: #000 !important;
        font-size: 19px !important;
      }

    }




    /*]]>*/
  </style>
</head>
<!--[if gte mso 9]><xml>
<o:OfficeDocumentSettings>
<o:AllowPNG/>
<o:PixelsPerInch>96</o:PixelsPerInch>
</o:OfficeDocumentSettings>
</xml><![endif]-->
<!--[if !mso]><!-->
<!--<![endif]-->

<body class="wn-body" style="-ms-text-size-adjust: 100% !important; -webkit-font-smoothing: antialiased !important; -webkit-text-size-adjust: 100% !important; margin: 0px auto; padding: 0px" bgcolor="#EDF0F3">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="wn-body-t" bgcolor="#EDF0F3" style="background-color: #edf0f3; border-collapse: collapse; mso-table-lspace: 0px; mso-table-rspace: 0px">
    <tbody>
      <tr>
        <td style="padding: 0; vertical-align: top;" align="center" valign="top">
          <!--[if (gte mso 9)|(IE)]>
      <table width="680" align="center" border="0" cellspacing="0" cellpadding="0"><tr><td width="680" align="center" valign="top">
      <![endif]-->

          <table align="center" border="0" cellspacing="0" cellpadding="0" class="mec-invoice-table-container" style="border-collapse: collapse; mso-table-lspace: 0px; mso-table-rspace: 0px; table-layout: fixed;">
            <tbody>
              <tr>
                <td style="padding: 0 10px">
                  <!-- Invoice Title -->

                  <div class="mec-invoice-title" style="margin: 45px 0 30px; background: #008aff; border-radius: 2px; box-shadow: 0 3px 15px -9px #008aff; color: #fff; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 32px; font-weight: 700; text-align: left; padding: 20px 0px 20px 40px; line-height: 40px;">
                    <span class="mec-invoice-nubber">{{InvoiceTitle}}</span> <span class="mec-invoice-buttons"><a class="mec-invoice-pdf-btn" style="text-decoration: none; color: #fff; font-size: 15px; padding: 0 35px; border-left: 1px solid #269cff; font-weight: 600; float: right;" href="{{InvoiceLink}}{{attendeeParam}}"><img style=" vertical-align: sub; margin-right: 6px;" src="https://img.icons8.com/android/18/ffffff/circled-right.png">View Invoice</a>

                  </div><!-- Invoice Header -->

                  <div class="mec-invoice-header" style="clear: both; margin: 0 0 30px; background: #fff; border-radius: 2px; box-shadow: 0 1px 9px -8px #4d5358; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; text-align: left; padding: 40px;">
                    <div class="mec-invoice-logo" style="height: 50px; margin: 0 0 10px; width: 100%;">
                      <span class="mec-invoice-buttons"><img src="{{CompanyLogoUrl}}" height="50" style="border: 0; line-height: 100%; outline: 0; -ms-interpolation-mode: bicubic; display: block; font-size: 14px;"></span>
                    </div>

                    <table align="center" border="0" cellspacing="0" cellpadding="0" class="mec-invoice-table" style="border-collapse: collapse; mso-table-lspace: 0px; mso-table-rspace: 0px; table-layout: fixed;">
                      <tbody>
                        <tr>
                          <td class="mec-invoice-header-half1" style="min-height: 50px; padding-right: 40px;">
                            <h3 style="color: #000; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 24px; font-weight: 700; line-height: 1.1; margin: 5px 0 15px;">
                              {{CompanyName}}</h3>

                            <p style="color: #75787b; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 400; line-height: 25px; margin: 0 0 5px;">
                              {{CompanyDescription}}</p>
                          </td>

                          <td class="mec-invoice-header-half2" style="min-height: 50px; padding-top: 5px; padding-left: 40px; border-left: 1px solid #e7e8e9;">
                            <table align="center" border="0" cellspacing="0" cellpadding="0" class="mec-invoice-table" style="border-collapse: collapse; mso-table-lspace: 0px; mso-table-rspace: 0px; table-layout: fixed;">
                              <tbody>
                                <tr>
                                  <td class="mec-invoice-header-info-t" style="width: 90px; color: #000; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 500; line-height: 20px; padding: 4px 0;">
                                    [[E-mail]]</td>

                                  <td class="mec-invoice-header-info-t" style="color: #75787b; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 400; line-height: 20px; padding: 4px 0;">
                                    {{CompanyEmail}}</td>
                                </tr>

                                <tr>
                                  <td class="mec-invoice-header-info-t" style="width: 90px; color: #000; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 500; line-height: 20px; padding: 4px 0;">
                                    [[Address]]</td>

                                  <td class="mec-invoice-header-info" style="color: #75787b; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 400; line-height: 20px; padding: 4px 0;">
                                    {{CompanyAddress}}</td>
                                </tr>

                                <tr>
                                  <td class="mec-invoice-header-info-t" style="width: 90px; color: #000; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 500; line-height: 20px; padding: 4px 0;">
                                    [[Phone]]</td>

                                  <td class="mec-invoice-header-info" style="color: #75787b; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 400; line-height: 20px; padding: 4px 0;">
                                    {{CompanyPhone}}</td>
                                </tr>

                                <tr>
                                  <td class="mec-invoice-header-info-t" style="width: 90px; color: #000; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 500; line-height: 20px; padding: 4px 0;">
                                    [[Vat Number]]</td>

                                  <td class="mec-invoice-header-info" style="color: #75787b; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 400; line-height: 20px; padding: 4px 0;">
                                    {{CompanyVatNumber}}</td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div><!-- Invoice Body -->


                </td>
              </tr>
            </tbody>
          </table>


        </td>
      </tr>
    </tbody>
  </table>


</body>

</html>