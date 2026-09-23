<?php 


$request = 2;


if(isset($_GET['request'])){
   $request = $_GET['request'];
}



//add user
if($request == 1){
        $info = json_decode(file_get_contents("php://input"), true);
        if (!searchUser($info["ip"])) {
              addUser($info);
         }
}

//update user
if($request == 2){
    $info = json_decode(file_get_contents("php://input"), true);
    updateUser($info);
}


if($request == 3){
    $info = json_decode(file_get_contents("php://input"), true);
    getsearchUser($info["ip"]);
}

function addUser($id) {

        $additionalArray = array(
            'ip' =>  $id["ip"],
            'fun' =>  $id["fun"]
        );

        $data_results = file_get_contents('myfile.json');
        $data = json_decode($data_results);

 
        $data[] = $additionalArray ;
        $jsonData = json_encode($data);

        file_put_contents('myfile.json', $jsonData); 
        echo json_encode(array('success'=>true));
}

function searchUser($ip) {
        $data_results = file_get_contents('myfile.json');
        $data = json_decode($data_results, true);
        foreach ($data as $key => $entry) {
            if ($entry['ip'] == $ip) {
                return true;
            }
        }

       return false;
}

function updateUser($info) {
        $data_results = file_get_contents('myfile.json');
        $data = json_decode($data_results, true);
        foreach ($data as $key => $entry) {
            if ($entry['ip'] == $info["ip"]) {
                $data[$key]['fun'] = $info["fun"];
            }
        }

        $newJsonString = json_encode($data);
        file_put_contents('myfile.json', $newJsonString);
        echo json_encode(array('success'=>true));
}


function getsearchUser($ip) {
        $data_results = file_get_contents('myfile.json');
        $data = json_decode($data_results, true);
        foreach ($data as $key => $entry) {
            if ($entry['ip'] == $ip) {
               
                echo json_encode($entry);
            }
        }

      // echo json_encode(array('success'=>true));
}


//addUser();



?>