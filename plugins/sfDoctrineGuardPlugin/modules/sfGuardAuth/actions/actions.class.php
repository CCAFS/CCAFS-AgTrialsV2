<?php

require_once(dirname(__FILE__) . '/../lib/BasesfGuardAuthActions.class.php');
require_once dirname(__FILE__) . '/../../../../../lib/PHPMailer/PHPMailer.php';

/**
 *
 * @package    symfony
 * @subpackage plugin
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: actions.class.php 23319 2009-10-25 12:22:23Z Kris.Wallsmith $
 */
class sfGuardAuthActions extends BasesfGuardAuthActions {

    public function executeForgotpassword(sfWebRequest $request) {
        $emailaddress = sfContext::getInstance()->getRequest()->getParameterHolder()->get('emailaddress');
        if (isset($emailaddress)) {
            $emailaddress = strtolower(trim($emailaddress));
            $sf_guard_user = Doctrine::getTable('sfGuardUser')->findOneByEmailAddress($emailaddress);
            if (count($sf_guard_user) > 1) {
                $Username = $sf_guard_user->username;
                $cadena = "[^A-Z0-9]";
                $newpassword = substr(eregi_replace($cadena, "", md5(rand())) . eregi_replace($cadena, "", md5(rand())) . eregi_replace($cadena, "", md5(rand())), 0, 6);
                $sf_guard_user->setPassword($newpassword);
                $sf_guard_user->save();
                //ENVIO DE CORREO
                //ENVIO CORREO
                if ($emailaddress != '') {
                    $sent = date("d-M-Y") . " " . date("h:i:s");
                    $destinatario = trim($emailaddress);
                    $asunto = "Account Notification";
                    $cuerpo = "<html>";
                    $cuerpo .= "<body>";
                    $cuerpo .= "<h1>Account Notification</h1>";
                    $cuerpo .= "<p>";
                    $cuerpo .= "<b>Username: </b>$Username<br> <b>New Password: </b>$newpassword<br><br><a href='http://www.agtrials.org/login' target='blank'>www.agtrials.org</a><br><br><b>Please remember to change your password.</b> After you login in: Profile user >> <a href='http://www.agtrials.org/changepassword' target='blank'>Change password</a> ";
                    $cuerpo .= "</p>";
                    $cuerpo .= "<b>Send:</b> $sent ";
                    $cuerpo .= "</body>";
                    $cuerpo .= "</html>";

                    $SendPHPMailer = SendPHPMailer();
                    $SendPHPMailer->AddAddress($destinatario);
                    $SendPHPMailer->Subject = $asunto;
                    $SendPHPMailer->Body = $cuerpo;
                    $SendPHPMailer->Send();
                }
                $this->getUser()->setAuthenticated(false);
                $this->Notice = "The Username and Password sent at email: $emailaddress";
            } else {
                echo "<script> alert('*** Incorrect Email address! ***'); window.history.back();</script>";
            }
        }
    }

}
