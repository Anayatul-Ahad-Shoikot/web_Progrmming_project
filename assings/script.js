$(document).ready(function() {
    // Fetch faculty data on page load
    fetchFaculties();
  
    // Handle faculty change event
    $("#facultySelect").change(function() {
      var selectedFaculty = $(this).val();
      fetchCourses(selectedFaculty);
    });
  });
  
  function fetchFaculties() {
    $.ajax({
      url: "fetch_faculty.php",
      dataType: "json",
      success: function(data) {
        $("#facultySelect").empty();
        $("#facultySelect").append($('<option>').val("").text("Select faculty"));
        $.each(data, function(index, faculty) {
          $("#facultySelect").append($('<option>').val(faculty.f_code).text(faculty.f_name));
        });
        console.log(data);
      },
    //   error: function(jqXHR, textStatus, errorThrown) {
    //     console.error("Error fetching faculty data:", textStatus, errorThrown);
    //   }
    });
  }
  
   function fetchCourses(facultyCode) {
//     $.ajax({
//       url: "/assings/fetch_satCourses.php",
//       dataType: "json",
//       data: { faculty_code: facultyCode },
//       success: function(data) {
//         $("#saturdaySelect").empty();
//         $("#saturdaySelect").append($('<option>').val("").text("Select Course"));
//         $.each(data, function(index, course) {
//           $("#saturdaySelect").append($('<option>').val(course.t_id).text(course.c_code));
//         });
//       },
//       error: function(jqXHR, textStatus, errorThrown) {
//         console.error("Error fetching course data:", textStatus, errorThrown);
//       }
//     });
  }
  