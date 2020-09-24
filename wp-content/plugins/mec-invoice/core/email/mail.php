<?php

namespace MEC_Invoice;

// Don't load directly
if (!defined('ABSPATH')) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit;
}
/**
** Mec Invoice Email.
**
** @author     Webnus <info@webnus.biz>
** @package     Modern Events Calendar
** @since     1.0.0
**/
class Email
{

   /*
    **Instance of this class.
    ** *
    **@since   1.0.0
    **@access  public
    **@var     MEC_Invoice
    ** */
    public static $instance;

    // Email Parameters
    public $from;
    public $to;
    public $subject;
    public $content;
    public $html_content;
    public $headers;

   /*
    **  Provides access to a single instance of a module using the Singleton pattern.
    **
    **  @since   1.0.0
    **  @return  object
    */
    public static function instance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }


   /*
    **  Construct
    **
    **  @since     1.0.0
    */
    public function __construct () {
        $this->from = null;
        $this->to = null;
        $this->subject = null;
        $this->content = "";
        $this->headers = "";
        $this->html_content = "";
    }


    /*
    **  Get Email Templates
    **
    **  @since     1.0.0
    */
    public function getTemplate ($name='invoice') {
        $path = realpath(MECINVOICEDIR . '/templates/email-'. $name .'.tpl');
        if (file_exists($path)) {
            $content = file_get_contents($path);
            preg_match_all('/\[\[(.*?)\]\]/i', $content, $translatableMatches);
            foreach ($translatableMatches[0] as $key => $text) {
                $content = str_replace($text, __($translatableMatches[1][$key], 'mec-invoice'), $content);
            }
            return $content;
        }
        return "";
    }

   /*
    **  Send Email
    **
    **  @since     1.0.0
    */
    public function send () {

        $from = $this->from;
        $to = $this->to;
        $message = !empty($this->html_content) ? trim($this->html_content) : trim($this->content);
        $subject = $this->subject;

        if (!$from) {
            $from = \get_option('admin_email');
        }

        if(!$this->headers) {
            $this->headers   = [
                'MIME-Version' => 'MIME-Version: 1.0',
                'Content-type' => 'text/plain; charset=UTF-8',
                'From' => get_bloginfo('name') . ' <' . $from . '>',
                'Reply-To' => $from,
                'X-Mailer' => 'PHP/' . phpversion(),
            ];
        }

        if ($this->html_content) {
            add_filter('wp_mail_content_type', function() {
                return "text/html";
            });
        }

        $sent = \wp_mail($to, $subject, $message, $this->headers);

        if($sent) {
            return true;
        }
        return false;
    }
} //Helper
