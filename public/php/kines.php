<?php
$json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';
$token = "179c96f0-a67a-4324-b235-f0b3960baf95";
//setup the request, you can also use CURLOPT_URL
$ch = curl_init('https://api.kinescope.io/v1/videos?page=1&per_page=100&order=created_at.desc,title.asc');
//curl_setopt($ch, CURLOPT_POST, 1);
//curl_setopt($ch, CURLOPT_POSTFIELDS, "");
// Returns the data/output as a string instead of raw data
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch, CURLOPT_POSTFIELDS, "page=1&per_page=100&order=created_at.desc,title.asc&status[]=&folder_id=&project_id=&video_ids[]=&q=&without_folder=true");
//Set your auth headers
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
   'Content-Type: application/json',
   'Authorization: Bearer ' . $token
));

// get stringified data/output. See CURLOPT_RETURNTRANSFER
$data = curl_exec($ch);

// get info about the request
$info = curl_getinfo($ch);
// close curl resource to free up system resources
curl_close($ch);

echo $data;

//var_dump(json_decode($data, true));     // Associative array
/*$jsonIterator = new RecursiveIteratorIterator(
    new RecursiveArrayIterator(json_decode($data, TRUE)),
    RecursiveIteratorIterator::SELF_FIRST);

foreach ($jsonIterator as $key => $val) {
    if(!is_array($val)) {
        //if($key=="data"){
           // echo $val;
        //}//else if($key =="title"){
            //$title[$u] = $val;
        //} else if("file_size"){
            //$fie_size[$u] = $val;
        //} else if("create_at"){
            //$create_at[$u] = $val;
        //} else if("url"){
            //$url[$u] = $val;
        //} else if("download_link"){
            //$download_link[$u] = $val;
        //} 
        //$id[$u] = $key;
        //$dura[$u] = $val;
    //echo "ID:" .$id . "   ,Title: " .$title ."  ,File size: " .$file_size . "   ,Create AT: " .$create_at . "   , URL: " .$url . "    ,Downloa Link: " .$download_link . "................";
    //++$u;

    echo $key.": ".$val . "    ";
    }
}*/

//$decode = json_decode($data, true)
/*for($i = 0; $i < $u; $i++){
        if($id[$i]=="id"){
            $id_a[$a_i] = $dura[$i];
            //echo "    ID: ".$dura[$i];
            ++$a_i;
        }else if($id[$i] =="title"){
            $title[$t_i] = $dura[$i];
            //echo "    title: ".$dura[$i];
            ++$t_i;
        } else if($id[$i] =="file_size"){
            $size[$s_i] = $dura[$i];
            //$fie_size[$u] = $val;
            //echo "    file_size: ".$dura[$i];
            ++$s_i;
        } else if($id[$i] =="create_at"){
            $create[$c_i] = $dura[$i];
            ++$c_i;
            //$create_at[$u] = $val;
            //echo "    create_at: ".$dura[$i];
        } else if($id[$i] =="url"){
            $url[$u_i] = $dura[$i];
            //$url[$u] = $val;
            //echo "    url: ".$dura[$i];
            ++$u_i;
        } else if($id[$i] =="download_link"){
            $down[$d_i] = $dura[$i];
            ++$d_i;
            //$download_link[$u] = $val;
            //echo "    download_link: ".$dura[$i];
        } 
    //echo $id[$i]. ": ".$dura[$i];
}*/
//var_dump($id);     // Associative array
//var_dump($dura);     // Associative array

//for($i = 1; $i < $u; $i++){
  //echo "ID:" .$id[$i] . "   ,Title: " .$title[$i] ."  ,File size: " .$file_size[$i] . "   ,Create AT: " .$create_at[$i] . "   , URL: " .$url[$i] . "    ,Downloa Link: " .$download_link[$i] . "................";
//}
//$id = $decoded_json['data'];
//echo $data;
//foreach($id as $ids) {
    //echo $id.' vid '.$id['id']'.';
//}
//echo $id_a . $title . $size . $create . $url . $down;
//echo "ID: " .$a_i.  ", Title: " .$t_i. ", Size file: " .$s_i. ", Create at: " .$c_i. " ,URL: " .$u_i. " ,Download link:" .$d_i. ".";

?>