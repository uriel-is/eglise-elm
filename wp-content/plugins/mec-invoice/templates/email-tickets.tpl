<div class="mec-ticket-wrap" style="padding: 0 10px 30px 30px; text-align: left; color: #75787b; border: 2px dashed #d9d9d9; border-radius: 13px; margin: 20px; min-height: 100px;">

    <table align="center" border="0" cellspacing="0" cellpadding="0" class="mec-ticket-table-1" style="border-collapse: collapse; mso-table-lspace: 0px; mso-table-rspace: 0px; table-layout: fixed;">

        <tbody>
            <tr>
                <td class="mec-ticket-f4box" style="background: #f4f5f6;border-radius: 0 0 5px 5px;">

                    <div class="mec-ticket-number" style="padding: 20px 0 8px 50px;color: #0066ff;font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif;font-size: 20px;font-weight: 500;line-height: 1;">#{{InvoiceID}}-{{TicketID}}</div>

                    <div class="mec-ticket-event-title" style="color: #000000;font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif;font-size: 33px;font-weight: 700;line-height: 1.1;padding-right: 20px;padding-left: 50px;">{{EventName}}</div>

                    <div class="mec-ticket-event-location" style="color: #6d6d6d;font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif;font-size: 18px;font-weight: 400;line-height: 1.1;padding: 15px 20px 0 50px;{{EventLocationStyle}}">{{EventLocation}}</div><br>

                    <table align="center" border="0" cellspacing="0" cellpadding="0" class="mec-ticket-table-blue-box-w" style="border-collapse: collapse;mso-table-lspace: 0px;mso-table-rspace: 0px;table-layout: fixed;width: 100%;">
                        <tbody>
                            <tr>
                                <td class="mec-ticket-table-ww1" style="padding-top: 10px;">
                                    <table width="100%" align="center" border="0" cellspacing="0" cellpadding="0" class="mec-ticket-table-blue-box" style="border-collapse: collapse;mso-table-lspace: 0px;mso-table-rspace: 0px;table-layout: fixed;border-radius: 0 25px 25px 0;background: #1075f2;height: 116px;width: 100%;">
                                        <tbody>
                                            <tr>
                                                <td style="padding-top: 24px;">
                                                    <div class="mec-ticket-event-date" style="color: #fff;font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif;font-size: 15px;font-weight: 400;line-height: 1.1;padding: 10px 4px;text-align: center;">[[DATE]]<br><br><strong>{{InvoiceDateD}}</strong></div>
                                                </td>
                                                <td style="padding-top: 24px;">
                                                    <div class="mec-ticket-event-time" style="border-left: 1px solid #4c98f5;color: #fff;font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif;font-size: 15px;font-weight: 400;line-height: 1.1;padding: 10px 4px;text-align: center;">[[TIME]]<br><br><strong>{{InvoiceDateT}}</strong></div>
                                                </td>
                                                <td style="padding-top: 24px;">
                                                    <div class="mec-ticket-event-price" style="border-left: 1px solid #4c98f5;color: #fff;font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif;font-size: 15px;font-weight: 400;line-height: 1.1;padding: 10px 4px;text-align: center;">[[PRICE]]<br><br><strong>{{TotalPrice}}</strong></div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td class="mec-ticket-table-ww2" width="210">
                                    <div class="mec-ticket-holder" style="color: #6d6d6d;font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif;font-size: 15px;font-weight: 400;line-height: 1.1;padding: 45px 10px 6px 25px;">[[Ticket Holder]] <br><br><strong style="color: #505050;">{{AttendeeName}}</strong></div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <br>
                    <div class="mec-ticket-event-organizer" style="color: #6d6d6d;font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif;font-size: 12px;font-weight: 400;line-height: 1.1;padding: 5px 20px 6px 50px;{{OrganizerStyle}}">[[Organized by]] <strong style="color: #505050;">{{OrganizerName}}</strong></div>

                </td>
                <td class="mec-ticket-tcol2" width="180" style="padding: 20px;">
                    <img class="mec-ticket-logo" src="{{CompanyLogoUrl}}" height="36" style="border: 0; line-height: 100%; outline: 0; -ms-interpolation-mode: bicubic; display: block; font-size: 10px;">


                    <div class="mec-ticket-table-co-info" style="padding: 8px;">

                        <p class="mec-ticket-header-info-t" style="color: #75787b; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 10px; font-weight: 400; line-height: 1.1; padding: 2px 0; margin: 0;{{CompanyNameStyle}}">
                            <strong>{{CompanyName}}</strong></p>

                        <p class="mec-ticket-header-info-t" style="color: #75787b; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 10px; font-weight: 400; line-height: 1.1; padding: 2px 0; margin: 0;{{CompanyURLStyle}}">
                            {{CompanyURL}}</p>

                        <p class="mec-ticket-header-info-t" style="color: #75787b; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 10px; font-weight: 400; line-height: 1.1; padding: 2px 0; margin: 0;{{CompanyEmailStyle}}">
                            {{CompanyEmail}}</p>

                        <p class="mec-ticket-header-info-t" style="color: #75787b; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 10px; font-weight: 400; line-height: 1.1; padding: 2px 0; margin: 0;{{CompanyAddressStyle}}">
                            {{CompanyAddress}}</p>

                        <p class="mec-ticket-header-info-t" style="color: #75787b; font-family: -apple-system,BlinkMacSystemFont, 'Segoe UI',Roboto, sans-serif; font-size: 10px; font-weight: 400; line-height: 1.1; padding: 2px 0; margin: 0;{{CompanyVatNumberStyle}}">
                            [[Vat Number]]: {{CompanyVatNumber}}</p>

                    </div><br>



                    <img class="mec-ticket-qr" src="{{AttendeeQrCode}}" height="170" style="border: 0; line-height: 100%; outline: 0; -ms-interpolation-mode: bicubic; display: block; font-size: 10px;">
                </td>

            </tr>
        </tbody>
    </table>
</div>