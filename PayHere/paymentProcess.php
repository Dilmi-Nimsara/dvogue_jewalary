<?php

$merchant_id = "1231868";
$order_id = uniqid();
$amount = 1000;
$currency = "LKR";
$merchant_secret = "NjU5NTE5Mzk2Njk5NDM2MDcxMjUzNDI5NTg3NjE4MDIzODI4NjU=";
$item=array('jjjjj','kkjkkk');
$hash = strtoupper(
    md5(
        $merchant_id .
        $order_id .
        number_format($amount, 2, '.', '') .
        $currency .
        strtoupper(md5($merchant_secret))
    )
);

$valueArray = [];
$valueArray["merchant_id"] = $merchant_id;
$valueArray["order_id"] = $order_id;
$valueArray["amount"] = $amount;
$valueArray["currency"] = $currency;
$valueArray["item"] = $item;
$valueArray["hash"] = $hash;

$jsonObj = json_encode($valueArray);

echo $jsonObj;
