<?php
    include('/xampp/htdocs/web_Progrmming_project/db_con.php');
    if (isset($_GET['faculty'])) {
        $selectedFaculty = $_GET['faculty'];
        $selectedFaculty = mysqli_real_escape_string($con, $selectedFaculty);
        $query = "SELECT note_content FROM notes WHERE f_code = '$selectedFaculty' AND visibility = 1";
        $result = mysqli_query($con, $query);
        if ($result) {
            $notes = '';
            while ($row = mysqli_fetch_assoc($result)) {
                $notes .= $row['note_content'] . "<br>";
            }
            echo $notes;
            mysqli_free_result($result);
        } else {
            echo "Error: " . mysqli_error($con);
        }

        mysqli_close($con);
    }
?>

