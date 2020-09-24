<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
  <meta name="generator" content="HTML Tidy for Linux (vers 25 March 2009), see www.w3.org" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="format-detection" content="telephone=no" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
    @media only screen and (max-width: 350px) {
      .mec-invoice-title a.mec-invoice-print-btn {
        display: none !important;
      }
      table.mec-invoice-items-table {
          zoom: 0.7;
      }
    }

    @media only screen and (max-width: 768px) {
      .mec-invoice-table-container {
        max-width: 600px !important;
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
        display: none !important;
      }

      body {
        -webkit-print-color-adjust: exact;
      }

      @page {
        size: A4 portrait;
        -webkit-print-color-adjust: exact;
      }

      body,
      table.wn-body-t {
        background: none !important;
      }

      table.wn-body-t {
        margin: 10px 2% 5px !important;
        width: 96% !important;
      }

      table.wn-body-t tr td,
      table.mec-invoice-table td.mec-invoice-header-half1 p {
        font-size: 11px !important;
        line-height: 1.2 !important;
        color: #606060 !important;
      }

      table.wn-body-t tr td.mec-invoice-body-info-t,
      table.wn-body-t tr td.mec-invoice-header-info-t,
      table.wn-body-t tr td.mec-invoice-organizer-info-t {
        color: #000000 !important;
        font-size: 10px !important;
        line-height: 1.3 !important;
      }

      table.mec-invoice-table td.mec-invoice-header-half1 h3 {
        font-size: 16px !important;
        line-height: 1 !important;
        margin: 0 !important;
      }

      table.mec-invoice-table td.mec-invoice-header-half1 {
        /* display: none !important; */
      }

      table.mec-invoice-table td.mec-invoice-header-info-t,
      table.mec-invoice-table td.mec-invoice-header-info {
        padding: 1px 0px !important;
      }

      .mec-invoice-body-half1>table.mec-invoice-table,
      table.mec-invoice-table-organizer-w,
      .mec-invoice-header {
        border: none !important;
        padding: 0px !important;
        box-shadow: none !important;
        border-radius: 0 !important;
        margin-bottom: 0px !important;
        background: none !important;
      }

      table.mec-invoice-table-organizer-w .mec-invoice-organizer-half1 {
        padding: 5px 0px 0px 20px !important;
      }

      table.mec-invoice-table-organizer-w .mec-invoice-organizer-info {
        font-size: 9px !important;
        line-height: 1.1 !important;
      }

      .mec-invoice-header {
        margin-top: 25px !important;
        width: 60%;
      }

      .mec-invoice-header .mec-invoice-header-half2 {
        padding-left: 20px !important;
        border-left: none !important;
      }

      .mec-invoice-organizer-title {
        padding: 0 0 0 20px !important;
        font-size: 16px !important;
        line-height: 1 !important;
      }

      .mec-invoice-items-table-wrap .mec-invoice-items-w {
        padding: 50px 10px 0 20px !important;
      }

      .mec-invoice-body-half1 .mec-invoice-body-qr-code img {
        position: absolute !important;
        top: 25px !important;
        right: 20px !important;
        width: 147px !important;
        height: 147px !important;
      }

      .mec-invoice-body-half2 .mec-invoice-attendees-wrap {
        padding: 10px 10px 0px !important;
        margin: 0px 0 10px !important;
      }

      table.mec-invoice-items-table tr td,
      table.mec-invoice-items-table tr th {
        padding: 3px 2px !important;
      }

      table.mec-invoice-items-table tr th {
        font-size: 12px !important;
        line-height: 1.2 !important;
      }

      .mec-invoice-attendees-title {
        padding: 20px 10px 0px !important;
        font-size: 16px !important;
        line-height: 1 !important;
      }

      .mec-invoice-attendees-wrap div.mec-invoice-attendee {
        padding: 0px !important;
        margin-bottom: 10px !important;
        border-bottom: 1px solid #d0d0d0 !important;
      }

      .mec-invoice-attendees-wrap div.mec-invoice-attendee:last-child {
        margin-bottom: 0 !important;
        border-bottom: none !important;
      }

      .mec-invoice-attendees-wrap .mec-invoice-attendee-name {
        font-size: 11px !important;
      }

      .mec-invoice-attendees-wrap .mec-invoice-attendee-email {
        font-size: 9px !important;
        color: #606060 !important;
      }

      .mec-invoice-title a,
      .powered-by-mec,
      .mec-invoice-organizer-image,
      .mec-invoice-attendee img.attendee-profile {
        display: none !important;
      }

      .mec-invoice-organizer-info-t,
      .mec-invoice-organizer-info {
        width: 100% !important;
        display: block !important;
        border: none !important;
        padding: 0px !important;
      }

      .mec-invoice-organizer-half2 {
        padding: 5px 0px 0px 20px !important;
        border-left: 1px solid #d0d0d0 !important;
      }

      .mec-invoice-organizer-half2>table {
        padding: 0px !important;
        border: none !important;
      }

      .mec-invoice-body-half1 .mec-invoice-info,
      .mec-invoice-body-half1 .mec-invoice-organizer-title {
        padding: 20px 0 0 20px !important;
      }

      .wn-body table tr td.mec-invoice-body-half1 .mec-invoice-info {
        padding: 20px !important;
      }

      .wn-body table tr td.mec-invoice-body-half1 .mec-invoice-body-qr-code {
        padding: 0px !important;
        width: 1px !important;
      }

      .mec-invoice-body {
        box-shadow: none !important;
        border-radius: 0 !important;
        border: none !important;
        border-top: 1px solid #d0d0d0 !important;
        margin-top: 25px !important;
      }

      .mec-invoice-body .mec-invoice-body-half1 {
        width: 64% !important;
        padding-right: 2% !important;
        border: none !important;
      }

      .mec-invoice-body .mec-invoice-body-half2 {
        width: 36% !important;
        padding-left: 10px !important;
        border: none !important;
      }

      .mec-invoice-total-p,
      .mec-invoice-totsl-t {
        color: #000000 !important;
        font-size: 11px !important;
        background: #f1f2f3 !important;
      }

      .mec-invoice-total-p span,
      .mec-invoice-item-discount,
      .mec-invoice-item-tax {
        font-size: 10px !important;
      }

      .mec-invoice-items-table td.mec-invoice-item {
        background: none !important;
      }

      .mec-invoice-items-table td.mec-invoice-totsl-t {
        padding-left: 15px !important;
        margin-left: -15px !important;
        font-size: 10px !important;
      }

      .mec-invoice-body-info-t a {
        color: #000000 !important;
        text-decoration: none !important;
        font-weight: 600 !important;
      }
    }

      {{CustomStyle}}

    /*]]>*/
  </style>
</head>
<!--[if gte mso 9]>
    <xml>
        <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
    </xml>
    <![endif]-->
<!--[if !mso]><!-->
<!--<![endif]-->

<body class="wn-body" style="-ms-text-size-adjust: 100% !important; -webkit-font-smoothing: antialiased !important; -webkit-text-size-adjust: 100% !important; margin: 0px auto; padding: 0px" bgcolor="#EDF0F3">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="wn-body-t" bgcolor="#EDF0F3" style="background-color: #edf0f3; border-collapse: collapse; mso-table-lspace: 0px; mso-table-rspace: 0px">
    <tr>
      <td style="padding: 0; vertical-align: top;" align="center" valign="top">
        <!--[if (gte mso 9)|(IE)]>
                <table width="680" align="center" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="680" align="center" valign="top">
                            <![endif]-->
        <table align="center" border="0" cellspacing="0" cellpadding="0" class="mec-invoice-table-container" style="overflow: hidden;border-collapse: collapse; mso-table-lspace: 0px; mso-table-rspace: 0px; table-layout: fixed;">
          <tr>
            <td style="padding: 0 10px">
              <!-- Invoice Title -->
              <div class="mec-invoice-title" style="margin: 45px 0 30px; background: #008aff; border-radius: 2px; box-shadow: 0 3px 15px -9px #008aff; color: #fff; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 32px; font-weight: 700; text-align: left; padding: 20px 0px 20px 40px; line-height: 40px;">
                <span class="mec-invoice-nubber">{{InvoiceTitle}}</span>
                <span class="mec-invoice-buttons">
                  <a class="mec-invoice-pdf-btn" style="text-decoration: none; color: #fff; font-size: 14px; padding: 0 35px; border-left: 1px solid #269cff; font-weight: 400; float: right;{{DownloadBtnStyles}}" href="{{PDFLink}}">
                    <img style=" vertical-align: sub; margin-right: 6px;" alt="pdf" src="https://img.icons8.com/material-sharp/18/ffffff/pdf-2.png" />[[Download PDF]]
                  </a>
                  <a class="mec-invoice-print-btn" style="text-decoration: none; color: #fff; font-size: 14px; padding: 0 35px; border-left: 1px solid #269cff; font-weight: 400; float: right;{{PrintButtonStyles}}" href="#">
                    <img style=" vertical-align: sub; margin-right: 6px;" src="https://img.icons8.com/windows/18/ffffff/print.png" />
                    [[Print]]
                  </a>
                </span>
              </div>


              <!-- Invoice Header -->
              <div class="mec-invoice-header" style="clear: both; margin: 0 0 30px; background: #fff; border-radius: 2px; box-shadow: 0 1px 9px -8px #4d5358; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; text-align: left; padding: 40px;{{CompanyInformationStyle}}">
                <div class="mec-invoice-logo" style="height: 50px; margin: 0 0 10px; width: 100%;{{CompanyLogoUrlStyle}}">
                  <span class="mec-invoice-buttons">
                    <img src="{{CompanyLogoUrl}}" alt="Company Logo" height="50" style="border: 0; line-height: 100%; outline: 0; -ms-interpolation-mode: bicubic; display: block; font-size: 14px;" />
                  </span>
                </div>
                <table align="center" border="0" cellspacing="0" cellpadding="0" class="mec-invoice-table" style="border-collapse: collapse; mso-table-lspace: 0px; mso-table-rspace: 0px; table-layout: fixed;">
                  <tr>
                    <td class="mec-invoice-header-half1" style="min-height: 50px; padding-right: 40px;">
                      <h3 style="color: #000; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 24px; font-weight: 700; line-height: 1.1; margin: 5px 0 15px;{{CompanyNameStyle}}">
                        {{CompanyName}}
                      </h3>
                      <p style="color: #75787b; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 400; line-height: 25px; margin: 0 0 5px;{{CompanyDescriptionStyle}}">
                        {{CompanyDescription}}
                      </p>
                    </td>
                    <td class="mec-invoice-header-half2" style="min-height: 50px; padding-top: 5px; padding-left: 40px; border-left: 1px solid #e7e8e9;">
                      <table align="center" border="0" cellspacing="0" cellpadding="0" class="mec-invoice-table" style="border-collapse: collapse; mso-table-lspace: 0px; mso-table-rspace: 0px; table-layout: fixed;">
                        <tr style="{{CompanyEmailStyle}}">
                          <td class="mec-invoice-header-info-t" style="width: 90px; color: #000; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 500; line-height: 20px; padding: 4px 0;">
                            [[E-mail]]
                          </td>
                          <td class="mec-invoice-header-info-t" style="color: #75787b; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 400; line-height: 20px; padding: 4px 0;">
                            {{CompanyEmail}}
                          </td>
                        </tr>
                        <tr style="{{CompanyAddressStyle}}">
                          <td class="mec-invoice-header-info-t" style="width: 90px; color: #000; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 500; line-height: 20px; padding: 4px 0;">
                            [[Address]]
                          </td>
                          <td class="mec-invoice-header-info" style="color: #75787b; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 400; line-height: 20px; padding: 4px 0;">
                            {{CompanyAddress}}
                          </td>
                        </tr>
                        <tr style="{{CompanyPhoneStyle}}">
                          <td class="mec-invoice-header-info-t" style="width: 90px; color: #000; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 500; line-height: 20px; padding: 4px 0;">
                            [[Phone]]
                          </td>
                          <td class="mec-invoice-header-info" style="color: #75787b; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 400; line-height: 20px; padding: 4px 0;">
                            {{CompanyPhone}}
                          </td>
                        </tr>
                        <tr style="{{CompanyVatNumberStyle}}">
                          <td class="mec-invoice-header-info-t" style="width: 90px; color: #000; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 500; line-height: 20px; padding: 4px 0;">
                            [[Vat Number]]
                          </td>
                          <td class="mec-invoice-header-info" style="color: #75787b; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 400; line-height: 20px; padding: 4px 0;">
                            {{CompanyVatNumber}}
                          </td>
                        </tr>
                        <tr style="{{CompanyURLStyle}}">
                          <td class="mec-invoice-header-info-t" style="width: 90px; color: #000; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 500; line-height: 20px; padding: 4px 0;">
                            [[Website]]
                          </td>
                          <td class="mec-invoice-header-info-t" style="color: #75787b; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 400; line-height: 20px; padding: 4px 0;">
                            <a href="{{CompanyURL}}" target="_blank">{{CompanyURLV}}</a>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </div>

              <!-- Invoice Body -->
              <div class="mec-invoice-body" style="clear: both; margin: 0 0 30px; background: #fff; border-radius: 2px; box-shadow: 0 1px 9px -8px #4d5358; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; text-align: left; padding: 0px;">
                <table align="center" border="0" cellspacing="0" cellpadding="0" class="mec-invoice-table" style="border-collapse: collapse; mso-table-lspace: 0px; mso-table-rspace: 0px; table-layout: fixed;">
                  <tr>
                    <td class="mec-invoice-body-half1" style="min-height: 50px; border-right: 1px solid #e7e8e9;">
                      <table align="center" border="0" cellspacing="0" cellpadding="0" class="mec-invoice-table" style="border-collapse: collapse; mso-table-lspace: 0px; mso-table-rspace: 0px; table-layout: fixed; background: #f6f8fA; border-bottom: 1px solid #e7e8e9;">
                        <tr>
                          <td class="mec-invoice-info" style="min-height: 50px; padding: 40px;">
                            <table align="center" border="0" cellspacing="0" cellpadding="0" class="mec-invoice-table" style="border-collapse: collapse; mso-table-lspace: 0px; mso-table-rspace: 0px; table-layout: fixed;">
                              <tr style="{{EventNameStyle}}">
                                <td class="mec-invoice-body-info-t" style="width: 130px; color: #000; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 500; line-height: 29px;">
                                  [[Event Name]]
                                </td>
                                <td class="mec-invoice-body-info-t" style="color: #008aff; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 500; line-height: 25px;">
                                  <a href="{{EventUrl}}">{{EventName}}</a>
                                </td>
                              </tr>
                              <tr style="{{EventDescriptionsStyle}}">
                                <td class="mec-invoice-body-info-t" style="width: 130px; color: #000; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 500; line-height: 29px;">
                                  [[Event Excerpt]]
                                </td>
                                <td class="mec-invoice-body-info-t" style="color: #75787b; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 12px; font-weight: 400; line-height:1.5">
                                  {{EventDescriptions}}
                                </td>
                              </tr>
                              <tr>
                                <td class="mec-invoice-body-info-t" style="width: 130px; color: #000; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 500; line-height: 29px;">
                                  [[Event Date]]
                                </td>
                                <td class="mec-invoice-body-info" style="color: #75787b; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 400; line-height: 25px;">
                                  {{EventDate}}
                                </td>
                              </tr>
                              <tr>
                                <td class="mec-invoice-body-info-t" style="width: 130px; color: #000; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 500; line-height: 29px;">
                                  [[Event Time]]
                                </td>
                                <td class="mec-invoice-body-info" style="color: #75787b; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 400; line-height: 25px;">
                                  {{EventTime}}
                                </td>
                              </tr>
                              <tr style="{{InvoiceDateStyle}}">
                                <td class="mec-invoice-body-info-t" style="width: 130px; color: #000; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 500; line-height: 29px;">
                                  [[Invoice Date]]
                                </td>
                                <td class="mec-invoice-body-info" style="color: #75787b; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 400; line-height: 25px;">
                                  {{InvoiceDate}}
                                </td>
                              </tr>
                              <tr style="{{EventLocationStyle}}">
                                <td class="mec-invoice-body-info-t" style="width: 130px; color: #000; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 500; line-height: 29px;">
                                  [[Event Location]]
                                </td>
                                <td class="mec-invoice-body-info" style="color: #75787b; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 400; line-height: 25px;">
                                  {{EventLocation}}
                                </td>
                              </tr>
                              <tr>
                                <td class="mec-invoice-body-info-t" style="width: 130px; color: #000; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 500; line-height: 29px;">
                                  [[Invoice Number]]
                                </td>
                                <td class="mec-invoice-body-info" style="color: #75787b; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 400; line-height: 25px;">
                                  {{InvoiceNumber}}
                                </td>
                              </tr>
                              <tr>
                                <td class="mec-invoice-body-info-t" style="width: 130px; color: #000; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 500; line-height: 29px;">
                                  [[Transaction ID]]
                                </td>
                                <td class="mec-invoice-body-info" style="color: #75787b; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 400; line-height: 25px;">
                                  {{TransactionID}}
                                </td>
                              </tr>
                            </table>
                          </td>
                          <td class="mec-invoice-body-qr-code" style="min-height: 50px; width: 164px; padding: 40px 40px 40px 1px;">
                            <img src="{{QRCodeUrl}}" alt="QRCode" width="164" style="border: 0; line-height: 100%; outline: 0; -ms-interpolation-mode: bicubic; display: block; font-size: 14px;" />
                          </td>
                        </tr>
                      </table>
                      <div class="mec-invoice-organizer-title" style="padding: 40px 0 0 40px; color: #008aff; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 18px; font-weight: 700; line-height: 32px; text-transform: uppercase;{{OrganizerStyle}}">
                        [[Organizer]]
                      </div>
                      <table align="center" border="0" cellspacing="0" cellpadding="0" class="mec-invoice-table-organizer-w" style="border-collapse: collapse; mso-table-lspace: 0px; mso-table-rspace: 0px; table-layout: fixed; background: #fff; border-bottom: 1px solid #e7e8e9;{{OrganizerStyle}}">
                        <tbody>
                          <tr>
                            <td class="mec-invoice-organizer-image" style="width: 75px; padding: 30px 10px 10px 40px;"><img src="{{OrganizerImage}}" width="75" height="75" alt="" style="border: 0; line-height: 100%; outline: 0; -ms-interpolation-mode: bicubic; display: block; font-size: 14px;" /></td>
                            <td class="mec-invoice-organizer-half1" style="min-height: 50px; padding: 40px 40px 10px 30px;">
                              <table align="left" border="0" cellspacing="0" cellpadding="0" class="mec-invoice-table" style="border-collapse: collapse; mso-table-lspace: 0px; mso-table-rspace: 0px; table-layout: fixed;">
                                <tr style="{{OrganizerNameStyle}}">
                                  <td class="mec-invoice-organizer-info-t" style="width: 70px; color: #000; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 500; line-height: 29px;">
                                    [[Name]]
                                  </td>
                                  <td class="mec-invoice-organizer-info" style="color: #75787b; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 400; line-height: 25px;">
                                    {{OrganizerName}}
                                  </td>
                                </tr>
                                <tr style="{{OrganizerSiteStyle}}">
                                  <td class="mec-invoice-organizer-info-t" style="width: 70px; color: #000; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 500; line-height: 29px;">
                                    [[Website]]
                                  </td>
                                  <td class="mec-invoice-organizer-info" style="color: #75787b; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 400; line-height: 25px;">
                                    {{OrganizerSite}}
                                  </td>
                                </tr>
                              </table>
                            </td>
                            <td class="mec-invoice-organizer-half2" style="min-height: 50px; padding: 40px 40px 40px 0;">
                              <table align="left" border="0" cellspacing="0" cellpadding="0" class="mec-invoice-table" style="border-collapse: collapse; mso-table-lspace: 0px; mso-table-rspace: 0px; table-layout: fixed; border-left: 1px solid #e7e8e9;">
                                <tr>
                                  <td class="mec-invoice-organizer-info-t" style="width: 70px; color: #000; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 500; line-height: 29px; padding-left: 40px;">
                                    [[Email]]
                                  </td>
                                  <td class="mec-invoice-organizer-info" style="color: #75787b; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 400; line-height: 25px;{{OrganizerEmailStyle}}">
                                    {{OrganizerEmail}}
                                  </td>
                                </tr>
                                <tr>
                                  <td class="mec-invoice-organizer-info-t" style="width: 70px; color: #000; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 500; line-height: 29px; padding-left: 40px;">
                                    [[Phone]]
                                  </td>
                                  <td class="mec-invoice-organizer-info" style="color: #75787b; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 400; line-height: 25px;{{OrganizerPhoneStyle}}">
                                    {{OrganizerPhone}}
                                  </td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <table align="center" border="0" cellspacing="0" cellpadding="0" class="mec-invoice-items-table-wrap" style="border-collapse: collapse; mso-table-lspace: 0px; mso-table-rspace: 0px; table-layout: fixed; background: #fff;">
                        <tr>
                          <td class="mec-invoice-items-w" style="padding: 40px;">
                            <!-- Invoice Items -->
                            <table border="0" cellspacing="0" cellpadding="0" class="mec-invoice-items-table" style="border-collapse: collapse; mso-table-lspace: 0px; mso-table-rspace: 0px; table-layout: fixed;">
                              <thead>
                                <tr style="border-bottom: 2px solid #008aff;">
                                  <th class="mec-invoice-item" style="width: 55%; color: #000; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 600; line-height: 24px; padding: 20px 2px;text-align:left;">
                                    [[Description]]
                                  </th>
                                  <th class="mec-invoice-item" style="width: 10%; color: #000; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 600; line-height: 24px; padding: 20px 2px;text-align:left;">
                                    [[Rate]]
                                  </th>
                                  <th class="mec-invoice-item" style="width: 15%;color: #000; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 600; line-height: 24px; padding: 20px 2px;text-align:center;">
                                    [[Qty]]
                                  </th>
                                  <th class="mec-invoice-item" style="width: 20%;color: #000; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 600; line-height: 24px; padding: 20px 2px;text-align:left;">
                                    [[Amount]]
                                  </th>
                                </tr>
                              </thead>
                              <tbody>
                                {{CartItems}}
                              </tbody>
                              <tfoot>
                                <tr>
                                  <td class="mec-invoice-item" style="color: #75787b; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px; padding: 25px 2px 5px;">
                                  </td>
                                  <td class="mec-invoice-item" style="color: #75787b; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px; padding: 25px 2px 5px;">
                                  </td>
                                  <td class="mec-invoice-item-tax" style="color: #000; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 600; line-height: 24px; padding: 25px 2px 5px;{{TaxStyle}}">
                                    [[Tax\Fee]]
                                  </td>
                                  <td class="mec-invoice-item-tax-a" style="color: #000; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 600; line-height: 24px; padding: 25px 2px 5px;{{TaxStyle}}">
                                    {{Tax}}
                                  </td>
                                </tr>
                                <tr>
                                  <td class="mec-invoice-item" style="color: #75787b; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px; padding: 5px 2px 20px;">
                                  </td>
                                  <td class="mec-invoice-item" style="color: #75787b; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px; padding: 5px 2px 20px;">
                                  </td>
                                  <td class="mec-invoice-item-discount" style="color: #000; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 600; line-height: 24px; padding: 5px 2px 20px;{{DiscountStyle}}">
                                    [[Discount]]
                                  </td>
                                  <td class="mec-invoice-item-discount-a" style="color: #000; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 600; line-height: 24px; padding: 5px 2px 20px;{{DiscountStyle}}">
                                    {{Discount}}
                                  </td>
                                </tr>
                                <tr>
                                  <td class="mec-invoice-item" style="color: #75787b; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px; padding: 20px 2px;">
                                  </td>
                                  <td class="mec-invoice-item" style="background: #f7f9fA; color: #75787b; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px; padding: 20px 2px;">
                                  </td>
                                  <td class="mec-invoice-totsl-t" style="background: #f7f9fA; color: #000; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 16px; font-weight: 700; line-height: 24px; padding: 20px 2px;">
                                    [[Total Due]]
                                  </td>
                                  <td class="mec-invoice-total-p" style="background: #f7f9fA; color: #2bbc10; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 21px; font-weight: 700; line-height: 24px; padding: 20px 2px;">
                                    {{TotalPrice}} <span style="font-size: 14px; font-weight: 300;">{{Currency}}</span>
                                  </td>
                                </tr>
                              </tfoot>
                            </table>
                          </td>
                        </tr>
                      </table>
                    </td>
                    <td class="mec-invoice-body-half2 mec-invoice-attendees" style="min-height: 50px; padding-bottom: 40px; width: 300px;">
                      <div class="mec-invoice-attendees-title" style="padding: 40px 0 0 40px; color: #008aff; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 18px; font-weight: 700; line-height: 32px; text-transform: uppercase;">
                        [[Attendees]]
                      </div>
                      <div class="mec-invoice-attendees-wrap" style="padding: 15px 10px 15px 40px">
                        {{AttendeesList}}
                      </div>
                    </td>
                  </tr>
                </table>
              </div>

              <!-- Invoice Footer -->
              <div class="mec-invoice-footer" style="clear: both; margin: 0 0 30px; background: #fff; border-radius: 2px; box-shadow: 0 1px 9px -8px #4d5358; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; text-align: left; padding: 40px;{{InvoiceDescriptionStyle}}">
                <table align="center" border="0" cellspacing="0" cellpadding="0" class="mec-invoice-table" style="border-collapse: collapse; mso-table-lspace: 0px; mso-table-rspace: 0px; table-layout: fixed;">
                  <tr>
                    <td class="mec-invoice-footer-half1" style="min-height: 50px; padding-right: 40px;">
                      <p style="color: #75787b; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 14px; font-weight: 400; line-height: 25px; margin: 0 0 5px;">
                        {{InvoiceDescription}}
                      </p>
                    </td>
                  </tr>
                </table>
              </div>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>

</html>