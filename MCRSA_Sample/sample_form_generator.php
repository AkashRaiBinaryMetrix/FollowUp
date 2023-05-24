<?php
/**
 * Created by PhpStorm.
 * User: emmanuel.suy
 * Date: 4/22/2019
 * Time: 11:45 AM
 */
include_once 'Config.php';
include_once 'SEC/Crypt/RSA.php';
include_once 'Base64.php';

$rsa = new Crypt_RSA();
$api_key = base64_decode(API_SECRET_KEY);
$rsa->setPublicKey($api_key, CRYPT_RSA_PUBLIC_FORMAT_PKCS1);
$rsa->loadKey($rsa->getPublicKey(), CRYPT_RSA_PUBLIC_FORMAT_PKCS1);
$rsa->setEncryptionMode(CRYPT_RSA_ENCRYPTION_NONE);

//
$orderId = time().'';
//amount HTG 25
$amount = '25';

$orderIdEncrypt = Base64::urlsafe_b64encode($rsa->encrypt(strval($orderId)));
$amountEncrypt = Base64::urlsafe_b64encode($rsa->encrypt(strval($amount)));
$button = '<form method="post" name="moncash" action="'.MC_BASE_URI.'/Checkout/'.BUSINESS_KEY.'">';
$button .= '<input type="hidden" name="orderId" value="'.$orderIdEncrypt.'"/>';
$button .= '<input type="hidden" name="amount" value="'.$amountEncrypt.'"/>';
$button .= '<input type="image" name="ap_image" src="'.MC_BASE_URI.'/resources/assets/images/MC_button.png"/>';
$button .= '</form>';

echo $button;