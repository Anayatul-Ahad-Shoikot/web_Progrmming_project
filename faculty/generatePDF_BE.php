<?php
require('/xampp/htdocs/web_Progrmming_project/vendor/autoload.php');

if (!empty($_POST['tableHTML'])) {
    $tableHTML = $_POST['tableHTML'];

    // Initialize PhpSpreadsheet
    $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Load the HTML content
    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Html();
    $spreadsheet = $reader->loadFromString($tableHTML);

    // Set the filename
    $fileName = 'faculty_list.xlsx';

    // Prepare to write the spreadsheet to an .xlsx file
    $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');

    // Output to browser for download
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="'. urlencode($fileName) .'"');
    $writer->save('php://output');
} else {
    echo 'No data received.';
}
?>
