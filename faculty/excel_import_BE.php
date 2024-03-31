<?php
    include('/xampp/htdocs/web_Progrmming_project/db_con.php');
    require('/xampp/htdocs/web_Progrmming_project/vendor/autoload.php');
    session_start();
    $user = $_SESSION['username'];
    if (isset($_SESSION['ac_id']) && isset($_SESSION['prior'])) {
        $ac_id = $_SESSION['ac_id'];
        $prior = $_SESSION['prior'];
        if(isset($_POST['import_btn'])){
            $fileName = $_FILES[ 'import_file' ][ 'name'];
            $file_extension = pathinfo($fileName, PATHINFO_EXTENSION);
            $allowed_extensions = ['csv', 'xls', 'xlsx'];
            
            if(in_array($file_extension, $allowed_extensions)){
                $inputFileNamePath = $_FILES[ 'import_file' ][ 'tmp_name'];
                $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
                $data = $spreadsheet->getActiveSheet()->toArray();
                foreach ($data as $row){
                    $f_name = $row['0'];
                    $f_code = $row['1'];
                    $dept = $row['2'];
                    $desig = $row['3'];
                    $f_contact = $row['4'];
                    $f_mail = $row['5'];
                    $f_room = $row['6'];

                    $insert_data = "INSERT INTO faculty (f_name, f_code, f_mail, f_contact, dept, desig, f_room) VALUES ('$f_name', '$f_code', '$f_mail', '$f_contact', '$dept', '$desig', '$f_room')";
                    $result = mysqli_query($con, $insert_data);
                    $msg = true;
                }
                    if($msg){
                        $content = 'Excel file imported at ('. date('Y/m/d  H:i').') ---'.$user;
                        $content_key = 'import';
                        $content_activity = 'add';
                        $stmt2 = $con->prepare("INSERT INTO history (content_key, content, user, content_activity) VALUES (?, ?, ?, ?)");
                        $stmt2->bind_param("ssss", $content_key, $content, $user, $content_activity);
                        $stmt2->execute();
                        $_SESSION['green'] = "Import successfully";
                        header("Location: /faculty/Faculty.php");
                        exit(0);
                    } else {
                        $_SESSION['red'] = "Import faild";
                        header("Location: /faculty/Faculty.php");
                        exit(0);
                    }
                }
            } else {
                $_SESSION['red'] = "Invalid file type. Please";
                header("Location: /faculty/Faculty.php" );
                exit(0);
            }
        }
    $con->close();
?>