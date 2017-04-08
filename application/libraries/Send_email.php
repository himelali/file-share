<?php

/**
 * Created by PhpStorm.
 * User: Himel
 * Date: 4/8/2017
 * Time: 8:41 PM
 */
class Send_email {

    CONST EMAIL_URL = 'https://api.elasticemail.com/v2/email/send';

    public function send($to, $body, $subject = 'File Uploaded Successfully') {
        try{
            $post = [
                'from'      => 'noreply@appsbean.com',
                'fromName'  => "File Sharing",
                'apikey'    => 'fdd5f4e9-fd67-416e-a84a-0531709b9fe1',
                'subject'   => $subject,
                'to'        => $to,
                'bodyHtml'  => $body,
                'isTransactional' => FALSE
            ];
            $ch = curl_init();
            curl_setopt_array($ch, [
                CURLOPT_URL             => EMAIL_URL,
                CURLOPT_POST            => TRUE,
                CURLOPT_POSTFIELDS      => $post,
                CURLOPT_RETURNTRANSFER  => TRUE,
                CURLOPT_HEADER          => FALSE,
                CURLOPT_SSL_VERIFYPEER  => FALSE
            ]);
            curl_exec ($ch);
            curl_close ($ch);
            return TRUE;
        } catch(Exception $ex) {
           return FALSE;
        }
    }

}