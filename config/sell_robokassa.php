<?php

$mrh_login = "phoenixtv.ru";
$mrh_pass1 = "l6ZcHuk6nzW1Rc3QuLF6";
$inv_id = 5;
$inv_desc = "Подписка";
$out_summ = "5.00";
$IsTest = 1;
$crc = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1");
echo "https://auth.robokassa.ru/Merchant/Index.aspx?MerchantLogin=" . $mrh_login . "&OutSum=" .$out_summ . "&InvoiceID=" . $inv_id . "&Description=" . $inv_desc . 
        "&SignatureValue=" . $crc . "&IsTest=" .$IsTest;
        
        // build CRC value
        //$crc =  md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1"); 
        
        // build URL
        //$url =
        //"https://auth.robokassa.ru/Merchant/Index.aspx?MerchantLogin=$mrh_login&".
        
        //"OutSum=$out_summ&InvId=$inv_id&Description=$inv_desc&SignatureValue=$crc";
        
        // print URL if you need
        //echo "<a href='/ru/$url'>Payment link</a>";