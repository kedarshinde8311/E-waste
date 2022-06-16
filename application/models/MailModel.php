<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MailModel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('FirebaseModel', 'firebaseModel');
	}
	
	
	public function sendMessage($phone, $text)
	{
		$url = "http://mysmsshop.in/http-api.php?username=ravi6924&password=R@rawat22&senderid=ARISEN&route=1&number=" . $phone . "&message=" . urlencode($text);
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$curl_scraped_page = curl_exec($ch);
		curl_close($ch);
	}
	
	public function sendMail($from, $to, $subject, $body){
		try{
		    
		    $data_array =  array(
            "from"=>$from,
            "to"=>$to,
            "subject"=>$subject,
            "body"=>$body,
          );
          $make_call = $this->callAPI('POST', 'https://www.viprasindia.com/api/sendmail/', json_encode($data_array));
          $response = json_decode($make_call, true);
		    
		    
			//  $headers = 'From: A\'rban Leaf '.'<'. $from .'>'. "\r\n" . 
			//   'MIME-Version: 1.0' . "\r\n" .
			//   'Content-Type: text/html; charset=utf-8';
			//  $result = mail($to, $subject, $body, $headers);
			return "success";
		}
		catch(Exception $ex){
	    	return "failed";
		}
	}

	// public function sendMail($from, $to, $subject, $body)
	// {
	// 	try {
	// 		require_once __DIR__ . '/mailer/class.phpmailer.php';
	// 		require_once __DIR__ . '/mailer/PHPMailerAutoload.php';

	// 		$mail = new PHPMailer;
	// 		$mail->isSMTP();
	// 		$mail->Host = 'smtp.gmail.com';
	// 		$mail->Port = 587;
	// 		$mail->SMTPSecure = 'tls';
	// 		$mail->SMTPAuth = 'true';
	// 		$mail->Username = "messagefromwebsites@gmail.com";
	// 		$mail->Password = "iGAP@Tech";
	// 		$mail->FromName = "A'rban Leaf";
	// 		$mail->addAddress($to);
	// 		$mail->Subject = $subject;
	// 		$mail->msgHTML($body);
	// 		$result = "sent";
	// 		if (!$mail->send()) {
	// 			$result = "failed " . $mail->ErrorInfo;
	// 		}
	// 		return $result;
	// 	} catch (Exception $ex) {
	// 		return "exception";
	// 	}
	// }

	function callAPI($method, $url, $data){
        $curl = curl_init();
        switch ($method){
           case "POST":
              curl_setopt($curl, CURLOPT_POST, 1);
              if ($data)
                 curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
              break;
           case "PUT":
              curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
              if ($data)
                 curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
              break;
           default:
              if ($data)
                 $url = sprintf("%s?%s", $url, http_build_query($data));
        }
        // OPTIONS:
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
           'APIKEY: 111111111111111111111',
           'Content-Type: application/json',
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        // EXECUTE:
        $result = curl_exec($curl);
        if(!$result){die("Connection Failure");}
        curl_close($curl);
        return $result;
     }
}
