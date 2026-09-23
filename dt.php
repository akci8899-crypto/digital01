
<?php

 $info = json_decode(file_get_contents("php://input"), true);
 
$message = $info['text'];
 
 
     $token='8345978478:AAHP0VczLSE5ygeH5ad6jcl-iq-ecsqoCcU';
     $chatid='-5244383595';

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

 
?>