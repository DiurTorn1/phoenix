<?php
$data = "Hello from PHP";
$url = 'http://127.0.0.1:5000/process_data';
$options = array(
    'http' => array(
        'header'  => "Content-type: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode(array('data' => $data)),
    ),
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
if ($result === FALSE) {
    echo "Error calling the Python API.";
} else {
    $response = json_decode($result, true);
    echo "Response from Python: " . $response['output'];
}
?>