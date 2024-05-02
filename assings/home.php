
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
  <link rel="stylesheet" href="/assings/style.css">
</head>

<body>
  <form id="myForm" method="POST" action="/assings/submit.php">


    <div class="form-group">
      <select name="faculty" id="facultySelect" class="form-control">
        <option selected disabled>select faculty </option>
        <?php
          include '/xampp/htdocs/web_Progrmming_project/db_con.php';
          $sql = "SELECT f_code, f_name FROM faculty WHERE visible = 1";
          $result = $con->query($sql);
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo '<option value="' . $row["f_code"] . '">' . $row["f_name"] . '</option>';
            }
          } else {
            echo '<option>No faculty found</option>';
          }
          $con->close();
        ?>
      </select>
    </div>


    <div class="form-group">
      <label>Course: </label>
      <select name="course" id="courseSelect" class="form-control" disabled>
        <option selected disabled>Select a course</option>
      </select>
    </div>


    <button type="submit" name="add_btn" class="btn btn-primary">ADD</button>
  </form>

  <div class="print">
  <?php
    include '/xampp/htdocs/web_Progrmming_project/db_con.php';
          $facultyId = "HS";
          $query = "";
      $stmt = $con->prepare($query);
      $stmt->bind_param("s", $facultyId);
      $stmt->execute();
      $result = $stmt->get_result();
      $availableCourses = []; // Initialize an array to store available courses
      while ($row = $result->fetch_assoc()) {
      $availableCourses[] = $row['c_id']; // Add each course row to the array
      }
      echo '<pre>';
      print_r($availableCourses); // Print the array of available courses
      echo '</pre>';
      $con->close();
    ?>
  </div>
  <script>
    $(document).ready(function() {
      $('#facultySelect').select2({
        placeholder: "Select faculty",
        allowClear: true
      }).on('change', function() {
        var facultyId = $(this).val();
        $.ajax({
          url: '/assings/fetch_satCourses.php',
          type: 'GET',
          data: {
            facultyId: facultyId
          },
          dataType: 'json',
          success: function(data) {
            console.log('Data:', data);
          },
          error: function(jqXHR, textStatus, errorThrown) {
            $('#courseSelect').empty().append('<option selected disabled>No courses found</option>');
          }
        });
      });
    });
  </script>
</body>
</html>