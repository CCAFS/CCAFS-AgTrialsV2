<?php

/*
 *  This file is part of AgTrials
 *
 *  AgTrials is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  at your option) any later version.
 *
 *  AgTrials is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with DMSP.  If not, see <http://www.gnu.org/licenses/>.
 *
 * Copyright 2012 (C) Climate Change, Agriculture and Food Security (CCAFS)
 * 
 * Created on : OCT - 2014
 * @author    :  Herlin R. Espinosa G. - herlin25@gmail.com
 * @version   :  ~
 */

include ("class.phpmailer.php");

function SendPHPMailer() {
    //CONFIGURACION CORREO GMAIL
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->IsHTML(TRUE);
    $mail->CharSet = "UTF-8";
    $mail->Host = "ssl://smtp.gmail.com";
    $mail->Port = 465;
    $mail->SMTPAuth = true;
    $mail->Username = "noreplyagtrials@gmail.com";
    $mail->Password = "application2011";
    $mail->From = "noreplyagtrials@gmail.com";
    $mail->FromName = "Webmaster AgTrials";
    $mail->WordWrap = 50;
    return $mail;
}

?>