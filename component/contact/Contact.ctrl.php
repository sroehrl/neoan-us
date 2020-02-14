<?php
/* Generated by neoan3-cli */

namespace Neoan3\Components;

use Neoan3\Apps\Hcapture;
use Neoan3\Core\RouteException;
use Neoan3\Frame\Neoan3;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Contact extends Neoan3
{

    /**
     * @param array $body
     * @throws RouteException
     */
    function postContact(array $body)
    {
        $frame = new Neoan3();
        $debug = true;
        $credentials = $frame->credentials['blua_mail'];
        Hcapture::setEnvironment($frame->credentials['neoan_us_hcaptcha']);
        try {
            $isHuman = Hcapture::isHuman($body);
        } catch (\Exception $e) {
            var_dump('setup hcaptcha ' . $e->getMessage());
            die();
        }

        try {
            if ($isHuman || $debug) {
                $mailBody = $body['message'] . "<br>";
                foreach (['subject', 'phone'] as $value) {
                    if (isset($body[$value])) {
                        $mailBody .= "<br><strong>$value</strong>: ";
                        $mailBody .= "<br>" . (is_array($body[$value]) ? implode(', ', $body[$value]) : $body[$value]);
                    }
                }

                // send email
                $mail = new PHPMailer(true);
                try {
                    $mail->isSMTP();
                    $mail->isHTML(true);
                    $mail->Host = $credentials['host'];
                    $mail->SMTPAuth = true;
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port = $credentials['port'];
                    $mail->Username = $credentials['username'];
                    $mail->Password = $credentials['password'];
                    $mail->setFrom($credentials['fromEmail'], 'contact form');
                    $mail->addAddress('neoan@neoan.us');
                    $mail->addReplyTo($body['email']);
                    $mail->Subject = 'Message via contact form';
                    $mail->Body = $mailBody;
                    $mail->send();
                } catch (Exception $e) {
                    var_dump($e->getMessage());
                    die();
                }
            } else {
                throw new RouteException('bot', 401);
            }
        } catch (\Exception $e) {
            throw new RouteException('bot', 401);
        }
    }

}
