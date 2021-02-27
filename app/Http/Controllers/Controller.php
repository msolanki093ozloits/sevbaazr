<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /*send_notification_FCM($customer->notification_id, $title, $msg, $order_id,$type);
    function send_notification_FCM($notification_id, $title, $message, $id = null, $type) {

		$accesstoken = 'AAAAzm3fz18:APA91bF1XQi8cPRMG6SGdlTlraM6lNqIKzDLtYBK9ZkmWPE9UzIKxutzI-gkwYNcuXMpSyECB6xDKx_WsxFAVy_kPVabl6EAa28ZGzSFq_7qEcL2MSlX1gfqUbD9KnKeS-WP15odW6Vc';

		$URL = 'https://fcm.googleapis.com/fcm/send';

		$post_data = '{
            "to" : "' . $notification_id . '",
            "data" : {
              "body" : "",
              "title" : "' . $title . '",
              "type" : "' . $type . '",
              "id" : "' . $id . '",
              "message" : "' . $message . '",
            },
            "notification" : {
                 "body" : "' . $message . '",
                 "title" : "' . $title . '",
                  "type" : "' . $type . '",
                 "id" : "' . $id . '",
                 "message" : "' . $message . '",
                "icon" : "new",
                "sound" : "default"
                },

          }';

		$crl = curl_init();
		$headr = array();
		$headr[] = 'Content-type: application/json';
		$headr[] = 'Authorization: key=' . $accesstoken;

		curl_setopt($crl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($crl, CURLOPT_URL, $URL);
		curl_setopt($crl, CURLOPT_HTTPHEADER, $headr);
		curl_setopt($crl, CURLOPT_POST, true);
		curl_setopt($crl, CURLOPT_POSTFIELDS, $post_data);
		curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);

		$rest = curl_exec($crl);

		if ($rest === false) {

			// throw new Exception('Curl error: ' . curl_error($crl));
			//print_r('Curl error: ' . curl_error($crl));
			$result_noti = 0;
		} else {

			$result_noti = 1;
		}

		//curl_close($crl);
		//print_r($result_noti);die;
		return $result_noti;
	}*/
}
