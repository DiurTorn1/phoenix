<?php

/*$mrh_login = "phoenixtv.ru";
$mrh_pass1 = "l6ZcHuk6nzW1Rc3QuLF6";
$inv_id = 5;
$inv_desc = $_POST['name_product'];
$out_summ = $_POST['price_product'];
$IsTest = 1;
$crc = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1");
echo 'https://auth.robokassa.ru/Merchant/Index.aspx?MerchantLogin=' . $mrh_login . '&OutSum=' . $out_summ . '&InvoiceID=' . $inv_id . '&Description=' . $inv_desc . 
        '&SignatureValue=' . $crc . '&IsTest=' . $IsTest;*/

$mrh_pass2 = "l6ZcHuk6nzW1Rc3QuLF6";   // merchant pass2 here
      
// HTTP parameters:
$out_summ = $_POST["OutSum"];
$inv_id = $_POST["InvId"];
$crc = strtoupper($_POST["SignatureValue"]);
        
// build own CRC
$my_crc = strtoupper(md5("$out_summ:$inv_id:$mrh_pass2"));
        
if ($my_crc != $crc){
    echo "bad sign";
} else {
    echo "OK";
}
        
// print OK signature

        
// perform some action (change order state to paid)