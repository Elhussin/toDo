<?php
require 'vendor/autoload.php'; // تحميل Composer
require 'config.php'; // تضمين إعدادات SMTP من config.php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * وظيفة لإرسال البريد الإلكتروني
 * 
 * @param string $to عنوان البريد الإلكتروني للمستلم
 * @param string $subject عنوان الرسالة
 * @param string $body محتوى الرسالة (HTML)
 * @param string $altBody محتوى الرسالة النصي (بديل)
 * 
 * @return bool|string true إذا تم الإرسال بنجاح، أو رسالة الخطأ
 */
function sendEmail($to, $subject, $body, $altBody = '')
{
    $mail = new PHPMailer(true);

    try {
        // إعدادات الخادم
        $mail->isSMTP();
        $mail->Host       = SMTP_HOST; // استخدام الإعداد من config.php
        $mail->SMTPAuth   = true;
        $mail->Username   = SMTP_USERNAME; // استخدام الإعداد من config.php
        $mail->Password   = SMTP_PASSWORD; // استخدام الإعداد من config.php
        $mail->SMTPSecure = SMTP_SECURE; // استخدام الإعداد من config.php
        $mail->Port       = SMTP_PORT; // استخدام الإعداد من config.php

        // إعدادات البريد
        $mail->setFrom(SMTP_USERNAME, MAIL_FROM_NAME); // استخدام الإعداد من config.php
        $mail->addAddress($to); // المستلم
        $mail->Subject = $subject;
        $mail->Body    = $body;
        $mail->AltBody = $altBody;
        $mail->isHTML(true);
        $mail->CharSet = "UTF-8";

        // إرسال الرسالة
        $mail->send();
        return true;
    } catch (Exception $e) {
        return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
