<?php 
    include('/xampp/htdocs/web_Progrmming_project/db_con.php');
    
    if (isset($_SESSION['ac_id']) && isset($_SESSION['username'])) {
        $ac_id = $_SESSION['ac_id'];
        $sql = "SELECT * FROM accounts";
        $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo  '<div class="sa">
                    <div>
                        <img src="' . $row['img'] . '" alt="">
                    </div>
                    <div class="saaa">
                        <form action="/accounts/remove_admin_BE.php" method="POST">
                            <table>
                                <tr>
                                    <td>UserName: </td>
                                    <td><input type="text" placeholder="'.$row['username'].'" disabled></td>
                                </tr>
                                <tr>
                                    <td>UserEmail: </td>
                                    <td><input type="text" placeholder="' . $row['useremail'] . '" disabled></td>
                                </tr>
                                <tr>
                                    <td>Priority: </td>
                                    <td><input type="text" placeholder="' . $row['priority'] . '" disabled></td>
                                </tr>
                                <tr>
                                    <td><input type="hidden" name="removed_id" value="'. $row['ac_id'] . '"></td>
                                </tr>
                                <tr>
                                        <td colspan="2" align="left"><button type="submit" name="btn">remove</button></td>
                                </tr>
                            </table>
                        </form>
                    </div>
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
