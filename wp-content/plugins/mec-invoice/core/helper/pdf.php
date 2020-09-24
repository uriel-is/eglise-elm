<?php

namespace MEC_Invoice;

// Don't load directly
if (!defined('ABSPATH')) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit;
}
/**
 ** Mec Invoice PDF.
 **
 ** @author     Webnus <info@webnus.biz>
 ** @package     Modern Events Calendar
 ** @since     1.0.0
 **/
class PDF
{
    private static $Y = 55;
    /*
    **  Create PDF from invoice ID
    **
    **  @since     1.0.0
    */
    public static function createFromInvoice($invoiceID, $saveAsFile = false)
    {

        $Hash = get_post_meta($invoiceID, 'invoiceID', true);
        $url = get_site_url(null, '?invoiceID=' . $invoiceID . '&makePreview=' . $Hash);
        if (isset($_GET['attendee']) && $attendee = $_GET['attendee']) {
            $url .= '&attendee=' . $attendee;
        }

        $apiKey = \MEC_Invoice\Helper::getOption('mec_invoice_html2pdf', '');
        $data = [
            'url' => $url,
            'apiKey' => $apiKey,
            'media' => 'print',
            'format' => 'A4',
        ];

        $dataString = json_encode($data);

        $ch = curl_init('https://api.html2pdf.app/v1/generate');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:76.0) Gecko/20100101 Firefox/76.0'
        ]);

        $response = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);

        if ($err) {
            echo 'Error #:' . $err;
        } else {
            if($saveAsFile) {
                $upload = wp_upload_dir();
                $upload_dir = $upload['basedir'];
                $upload_dir = $upload_dir . '/mec-invoices';
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0700);
                }
                file_put_contents($upload_dir . '/Invoice-' . $invoiceID . '.pdf', $response);
                return realpath($upload_dir . '/Invoice-' . $invoiceID . '.pdf');
            } else {
                header('Content-Type: application/pdf');
                header('Content-Disposition: inline; filename="invoice-' . $invoiceID . '.pdf"');
                header('Content-Transfer-Encoding: binary');
                header('Accept-Ranges: bytes');

                echo $response;
                die();
            }
        }
        return;
    }

    private static function checkImage($image) {
        $defaultImage = realpath(MECINVOICEDIR . '/assets/img/def.jpg');
        if(file_exists($image)) {
            return $image;
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $image);
        // don't download content
        curl_setopt($ch, CURLOPT_NOBODY, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($ch);
        curl_close($ch);
        if ($result !== FALSE) {
            return $image;
        } else {
            return $defaultImage;
        }

    }

    private static function getY($c = 5) {
        static::$Y = static::$Y + $c;
        return static::$Y;
    }

} //PDF
