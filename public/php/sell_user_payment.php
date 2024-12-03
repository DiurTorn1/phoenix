<?php

$mrh_login = "phoenixtv.ru";
$mrh_pass1 = "nCWY57iaB1fKog5zr2BK";
$inv_id = $_POST['id_product'];
$inv_desc = $_POST['name_product'];
$out_summ = $_POST['price_product'];
$IsTest = 1;
$crc = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1");
echo 'https://auth.robokassa.ru/Merchant/Index.aspx?MerchantLogin=' . $mrh_login . '&OutSum=' . $out_summ . '&InvoiceID=' . $inv_id . '&Description=' . $inv_desc . 
        '&SignatureValue=' . $crc;// . '&IsTest=' . $IsTest;