<?php
  include '/xampp/htdocs/web_Progrmming_project/db_con.php';
  $sql = "SELECT f_code, f_name FROM faculty WHERE visible = 1";
  $result = $con->query($sql);
  $faculties = array();
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $faculties[] = $row;
    }
  }
  $con->close();
  // Return JSON response
  header('Content-Type: application/json');
  echo json_encode($faculties);
?>
