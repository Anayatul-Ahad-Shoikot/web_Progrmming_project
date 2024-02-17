<?php 
    include('/xampp/htdocs/web_Progrmming_project/db_con.php');
    
    if (isset($_SESSION['ac_id']) && isset($_SESSION['username'])) {
        $ac_id = $_SESSION['ac_id'];
        $sql = "SELECT * FROM accounts WHERE ac_id != $ac_id";
        $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo  '<div class="box st">
                    <div>
                        <img src="' . $row['img'] . '" alt="">
                    </div>
                    <form action="/Root/Admin_Side/Dash/Admin/REMOVE_ADMIN.php" method="POST">
                        <input type="text" placeholder="UserName: ' . $row['username'] . '" disabled>
                        <input type="text" placeholder="UserEmail: ' . $row['useremail'] . '" disabled>
                        <input type="text" placeholder="Priority: ' . $row['priority'] . '" disabled>
                        <input type="text" placeholder="Account ID: ' . $row['ac_id'] . '" disabled>
                    </form>
                    </div>';
                }
            } else {
                echo "No Record Found";
            }
        } else {
            echo "Error to load session";
    }
    mysqli_close($con);
?>
