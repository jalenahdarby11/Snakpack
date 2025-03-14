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

