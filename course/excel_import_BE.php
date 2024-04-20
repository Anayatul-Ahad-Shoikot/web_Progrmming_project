<?php
    include('/xampp/htdocs/web_Progrmming_project/db_con.php');
    require('/xampp/htdocs/web_Progrmming_project/vendor/autoload.php');
    session_start();
    $user = $_SESSION['username'];
    if (isset($_SESSION['ac_id']) && isset($_SESSION['prior'])) {
        $ac_id = $_SESSION['ac_id'];
        $prior = $_SESSION['prior'];
        if(isset($_POST['import_btn'])){
            if ($_FILES['import_file']['error'] == UPLOAD_ERR_NO_FILE) {
                $_SESSION['red'] = "Select a spreadsheet first";
                header("Location: /course/course.php");
                exit(0);
                echo 'Error.';
            }
            $fileName = $_FILES[ 'import_file' ][ 'name'];
            $file_extension = pathinfo($fileName, PATHINFO_EXTENSION);
            $allowed_extensions = ['csv', 'xls', 'xlsx'];
            if(in_array($file_extension, $allowed_extensions)){
                $inputFileNamePath = $_FILES[ 'import_file' ][ 'tmp_name'];
                $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
                $data = $spreadsheet->getActiveSheet()->toArray();
                foreach ($data as $row){
                    $c_code = $row['0'];
                    $c_name = $row['1'];
                    if ($row['2'] == 0){
                        $c_type = "Theory";
                    } else {
                        $c_type = "Lab";
                    }
                    $c_sec = $row['3'];
                    $c_day1 = $row['4'];
                    $c_day2 = $row['5'];
                    $c_time = $row['6'];

                    $insert_data = "INSERT INTO course (c_code, c_name, c_type, c_sec, c_time, c_day1, c_day2) VALUES ('$c_code', '$c_name', '$c_type', '$c_sec', '$c_time', '$c_day1', '$c_day2')";
                    $result = mysqli_query($con, $insert_data);
                    $msg = true;
                }
                    if($msg){
                        $content = 'Course list imported at ('. date('Y/m/d  H:i').') ---'.$user;
                        $content_key = 'import';
                        $content_activity = 'add';
                        $stmt2 = $con->prepare("INSERT INTO history (content_key, content, user, content_activity) VALUES (?, ?, ?, ?)");
                        $stmt2->bind_param("ssss", $content_key, $content, $user, $content_activity);
                        $stmt2->execute();
                        $_SESSION['green'] = "Imported successfully";
                        header("Location: /course/course.php");
                        exit(0);
                    } else {
                        $_SESSION['red'] = "Import faild";
                        header("Location: /course/course.php");
                        exit(0);
                    }
                }
            } else {
                $_SESSION['red'] = "Invalid file type";
                header("Location: /course/course.php" );
                exit(0);
            }
        }
    $con->close();
?>