<?php
    // Include your database connection file
    include '/xampp/htdocs/web_Progrmming_project/db_con.php';
    $var = $_GET["value"];
    $valM = mysqli_real_escape_string($con, $val);
    $sql = "SELECT c_sec FROM course WHERE c_code = $valM";
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result)>0){
        echo "<select>";
        while($rows = mysqli_fetch_assoc($result)){
            echo "<option>".$rows["c_sec"] ."</option>";
        }
        echo "</select>";
    }
?>
