<?php
    if($_SERVER[?REQUEST_METHOD] == "POST") {
      $selectedOptions = isset($_POST['flavor'] ? $POST['flavor'] : [];

      $response = [
        "selected_flavors" => $selected_flavors
      ];

      header('Content-Type: application/json');
      echo json_encode($response);

      )
    }

  ?>
getStarted
<?php
    if ($SERVER['REQUEST_METHOD'] == 'POST') {
      function get_data(){
        $cardNum = $_POST['cardNum'];
        $cvc = $_POST['cvc'];
        $expiration = $_POST['expiration'];
        $file_name = 'profile'. '.json';


        if(file_exists("$files_name")){
          $current_data = file_get_contents("file_name");
          $array_data = json_decode($current_data, true);

          $extra = array(
            ''
          )
        }
      }
    }
  ?>