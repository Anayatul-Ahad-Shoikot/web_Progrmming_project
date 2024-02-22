<?php
    include('/xampp/htdocs/web_Progrmming_project/db_con.php');
        if (isset($_POST['add_btn'])){
            $name = $_POST['name'];
            
            echo $name;
        }
        $con->close();
?>