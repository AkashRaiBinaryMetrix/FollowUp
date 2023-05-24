<?php
/**
 * Created by PhpStorm.
 * User: emmanuel.suy
 * Date: 4/22/2019
 * Time: 12:28 PM
 */
include_once 'Config.php';
include_once 'SEC/Crypt/RSA.php';
include_once 'Base64.php';

$rsa = new Crypt_RSA();
$api_key = base64_decode(API_SECRET_KEY);
$rsa->setPublicKey($api_key, CRYPT_RSA_PUBLIC_FORMAT_PKCS1);
$rsa->loadKey($rsa->getPublicKey(), CRYPT_RSA_PUBLIC_FORMAT_PKCS1);
$rsa->setEncryptionMode(CRYPT_RSA_ENCRYPTION_NONE);

//orderId here. In mycase it's the time so you can use other
$orderId = time() . '';
//Amount to be paid
$amount = '25';

$orderIdEncrypt = Base64::urlsafe_b64encode($rsa->encrypt(strval($orderId)));
$amountEncrypt = Base64::urlsafe_b64encode($rsa->encrypt(strval($amount)));


$url = MC_BASE_URI . '/Checkout/Rest/' . BUSINESS_KEY;
$data = array(
    'amount' => $amountEncrypt,
    'orderId' => $orderIdEncrypt,
);
$myvars = http_build_query($data);
echo $url;
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $myvars);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
$response = curl_exec($ch);
$response = json_decode($response);
var_dump($response);
//        echo json_encode($response);exit;
if ($response->success) {
    header("Location: ".MC_BASE_URI."/Payment/Redirect/". $response->token);
} else {
    echo $response->msg;
}


?>