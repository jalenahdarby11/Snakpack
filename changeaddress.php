<?php

// Add and take away previous form input

  $jsonFilePath = '../../js/profile.json';

  $firstName = $lastName = $street = $apt = $city = $state = $postal = $mobile = "";
  $profileIdUpdate = 1;

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $firstName = test_input($_POST["firstName"]);
    $lastName = test_input($_POST["lastName"]);
    $street = test_input($_POST["street"]);
    $apt = test_input($_POST["apt"]);
    $city = test_input($_POST["city"]);
    $state = test_input($_POST["state"]);
    $postal = test_input($_POST["postal"]);
    $mobile = test_input($_POST["mobile"]);


    if(file_exists($jsonFilePath)) {
        $jsonData = file_get_contents($jsonFilePath);
        $dataArray = json_decode($jsonData, true);
    } else{
        $dataArray = [];
    }

    foreach($dataArray as $index => $profile){
      if($profile[profileId] == $profileIdUpdate){
        $dataArray[$index]['firstName'] = $firstName;
        $dataArray[$index]['lastName'] = $lastName;
        $dataArray[$index]['street'] = $street;
        $dataArray[$index]['apt'] = $apt;
        $dataArray[$index]['city'] = $city;
        $dataArray[$index]['state'] = $state;
        $dataArray[$index]['postal'] = $postal;
        $dataArray[$index]['mobile'] = $mobile;
        break;
      }
    }

    $updatedJSON = json_encode($dataArray, JSON_PRETTY_PRINT);

    if(file_put_contents($jsonFilePath, $updatedJSON)){
        echo "<p>Updated successfully</p>";
    }else{
        echo "<p>Didn't work</p>";
    }
  }

  function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  ?>