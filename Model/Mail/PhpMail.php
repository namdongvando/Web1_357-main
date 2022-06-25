<?php

namespace Model\Mail;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



class PhpMail
{


    static public $Username = "";
    static public $Password = "";
    static public function SendMailHttp($Subject, $Body, $AltBody, $MailTo)
    {
        //api
        $url = "https://mail.web102.xyz/index.php";
        $postdata =
            [
                "Username" => self::$Username,
                "Password" => self::$Password,
                "Subject" => $Subject,
                "Body" => $Body,
                "AltBody" => $AltBody,
                "MailTo" => $MailTo
            ];
        $postdata = http_build_query($postdata);
        $opts = array(
            'http' =>
            array(
                'method' => 'POST',
                'header' => 'Content-Type: application/x-www-form-urlencoded;charset=utf-8',
                'content' => $postdata,
                "ssl" => array(
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                )
            )
        );
        $context = stream_context_create($opts);
        $res = file_get_contents($url, false, $context);
        return $res;
    }
}
