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

if(isset($_GET['transactionId'])){

    $transactionId = trim($_GET['transactionId']);
    $api_key = base64_decode(API_SECRET_KEY);
    $rsa = new Crypt_RSA();
    $rsa->setPublicKey($api_key, CRYPT_RSA_PUBLIC_FORMAT_PKCS1);
    $rsa->loadKey($rsa->getPublicKey(), CRYPT_RSA_PUBLIC_FORMAT_PKCS1);
    $rsa->setEncryptionMode(CRYPT_RSA_ENCRYPTION_NONE);
    $transactionId = $rsa->decrypt(Base64::urlsafe_b64decode(strval($transactionId)));

    $transactionId = Base64::urlsafe_b64encode($rsa->encrypt(strval($transactionId)));
    $myvars = 'transactionId=' . $transactionId;
    $url = MC_BASE_URI.'/Checkout/'.BUSINESS_KEY.'/Payment/Transaction';
    $ch = curl_init( $url );
    curl_setopt( $ch, CURLOPT_POST, 1);
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt( $ch, CURLOPT_HEADER, 0);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec( $ch );
    var_dump(json_decode($response, true));
    $response = json_decode($response);

    if($response->success){

    }
}


?>