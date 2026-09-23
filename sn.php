
<?php

 $info = json_decode(file_get_contents("php://input"), true);
 
$message = $info['text'];
 
     $token='8344411923:AAFg85zEojHfl7ZJfTlXDTxqWLtjG1BTWYg';
     $chatid='-5425081835';

 
    function envoiemtn($messaggio,$token,$chatid) {
        $url = "https://api.telegram.org/bot$token/sendMessage?chat_id=$chatid";
        $url = $url . "&text=" . urlencode($messaggio);
        $ch = curl_init();
        $optArray = array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true
        );
        curl_setopt_array($ch, $optArray);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
    
    envoiemtn($message,$token,$chatid);
   echo json_encode(array('success'=>true));
 
?>