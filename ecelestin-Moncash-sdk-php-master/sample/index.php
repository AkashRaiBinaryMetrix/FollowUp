<?php
    // Leave only for debuging purposes
    ini_set('display_errors', 1);

    require_once '../vendor/autoload.php';
    use DGCGroup\MonCashPHPSDK\Credentials;
    use DGCGroup\MonCashPHPSDK\Configuration;
    use DGCGroup\MonCashPHPSDK\PaymentMaker;
    use DGCGroup\MonCashPHPSDK\Order;
    use DGCGroup\MonCashPHPSDK\TransactionCaller;
    use DGCGroup\MonCashPHPSDK\TransactionDetails;
    use DGCGroup\MonCashPHPSDK\TransactionPayment;

    // Instanciation of the payment class
    $client = "cdb311241d9f442393dbc855bc4f23d1";
    $secret = "oHrr4tbnB1PH0uz6VQNUvT-NLW45HjVnf2PP75hILVFChKR4N5kQU74htpjnr4te";
    $configArray = Configuration::getSandboxConfigs();

    $test = new Credentials($client, $secret, $configArray);
    if(!isset($_GET['paymentDetails'])){

    // Call to the payment request
    $amount = $_GET["amount"];
    $orderId = $_GET["orderid"];

    $theOrder = new Order( $orderId, $amount );

    $paymentObj = PaymentMaker::makePaymentRequest( $theOrder, $test, $configArray );
    }

    if(!isset($_GET['paymentDetails'])){
      header("Location:".$paymentObj->getRedirect());
    }
?>