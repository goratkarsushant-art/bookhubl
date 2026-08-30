<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (file_exists(__DIR__.'/vendor/autoload.php')) require_once __DIR__.'/vendor/autoload.php';

const SMTP_EMAIL = 'sushantgoratkar@gmail.com';
const SMTP_PASSWORD = 'YOUR_GMAIL_APP_PASSWORD';

function send_mail($to, $name, $subject, $body) {
    if (!class_exists('PHPMailer\\PHPMailer\\PHPMailer')) return false;
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = SMTP_EMAIL;
        $mail->Password = SMTP_PASSWORD;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->setFrom(SMTP_EMAIL, 'BookHub');
        $mail->addAddress($to, $name);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->send();
        return true;
    } catch (Exception $e) { return false; }
}
function send_otp($to,$name,$otp) {
    return send_mail($to,$name,'Library Password Reset OTP','<h2>Password Reset</h2><p>Hello '.htmlspecialchars($name).',</p><p>Your OTP is <b style="font-size:25px">'.$otp.'</b></p><p>OTP is valid for 5 minutes and can be used only once.</p>');
}
function send_login_alert($to,$name) {
    return send_mail($to,$name,'Library Login Alert','<h2>Login Successful</h2><p>Hello '.htmlspecialchars($name).', you have successfully logged in to the BookHub.</p><p>Time: '.date('d M Y, h:i A').'</p>');
}
?>
