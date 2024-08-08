<?php
    //$json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';
    $data = array("id" => "d3b85b74-2ebb-490d-93b6-4c19fbd48c11");//"name" => "Muuuu","subtitle" => "", "type" => "one-time", "auto_start" => false, "protected" => false, "time_shift" => true,
         //"parent_id" => "76be9caa-5ca7-4ac7-947e-4e7042b40632", "reconnect_window" => 600, "scheduled" => array("time" => "2024-08-06T13:05:41.634922Z"),
        // "record" => array("parent_id" => "f5d0756d-2ee5-4531-bde4-7baef6ea5baf"),
        // "restreams" => array(), "latency_mode" => "standard");
    $postdata = json_encode($data);
    $token = "f49fffe4-42ff-45bb-a03c-3a2eb050226c";
    //setup the request, you can also use CURLOPT_URL
    $ch = curl_init('https://api.kinescope.io/v2/live/events');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Authorization: Bearer ' . $token,
        //'Content-Length: ' . strlen($postdata)
    ));

    $result = curl_exec($ch);
    curl_close($ch);
    echo $result;
    //echo "I get param1 = ".$_POST['param1'];
?>