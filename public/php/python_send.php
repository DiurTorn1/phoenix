<?php
$data = array("mail" => "xxx@mail.ru");
$url = 'http://127.0.0.1:5000/process_data';
$options = array(
    'http' => array(
        'header'  => "Content-type: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode(array('mail' => $_POST[''])),
    ),
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
if ($result === FALSE) {
    echo "Error";
} else {
    $response = json_decode($result, true);
    echo $response['output'];
}
?>