<?php 
    include ('/xampp/htdocs/web_Progrmming_project/db_con.php');
    if(isset($_GET['f_name'])){
        $f_id = $_GET['f_name'];
        $presentCourseQuery = "SELECT * FROM timeline WHERE f_name = '$f_name' AND present = 1";
        $presentCourseQueryResult = mysqli_query($con, $presentCourseQuery);
        if (mysqli_num_rows($presentCourseQueryResult) > 0) {
            while ($row = mysqli_fetch_assoc($presentCourseQueryResult)){
            echo "<p>".$row['c_name'].",  [".$row['section']."]</p>";
            }
        } else {
            echo "No course is being taken yet";
        }
}
?>