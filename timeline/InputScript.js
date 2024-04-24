
// filtering the faculty names of dropdown for easy search
function filterDropdownFaculty() {
    var input, filter, select, option, i;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    select = document.getElementById("facultySelect");
    option = select.getElementsByTagName("option");
    for (i = 0; i < option.length; i++) {
        if (option[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
            option[i].style.display = "";
        } else {
            option[i].style.display = "none";
        }
    }
}
function updateFacultyInfo() {
    var select = document.getElementById("facultySelect");
    var selectedOption = select.options[select.selectedIndex];
    var c_t = document.getElementById("c_t");
    var m_t = document.getElementById("m_t");
    var c_l = document.getElementById("c_l");
    var m_l = document.getElementById("m_l");
    c_t.value = selectedOption.getAttribute("data-current_T");
    m_t.value = selectedOption.getAttribute("data-max_T");
    c_l.value = selectedOption.getAttribute("data-current_L");
    m_l.value = selectedOption.getAttribute("data-max_L");
    var theory = document.getElementById("theory");
    var lab = document.getElementById("lab");
    var ratioT = selectedOption.getAttribute("data-current_T") + " / " + selectedOption.getAttribute("data-max_T");
    theory.innerHTML = ratioT;
    var RatioL = selectedOption.getAttribute("data-current_L") + " / " + selectedOption.getAttribute("data-max_L");
    lab.innerHTML = RatioL;
    var selectedFaculty = selectedOption.value;
    if (selectedFaculty) {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "fetch_notes.php?faculty=" + selectedFaculty, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var notes = xhr.responseText;
                if (notes.trim() !== "") {
                    displayPopup(notes);
                }
            }
        };
        xhr.send();
        var xhr2 = new XMLHttpRequest();
        xhr2.open("GET", "fetch_course.php?faculty=" + encodeURIComponent(selectedFaculty), true);
        xhr2.onreadystatechange = function() {
            if (xhr2.readyState === 4 && xhr2.status === 200) {
                // Parse the JSON response containing available courses
                var courses = JSON.parse(xhr2.responseText);
                var courseSelect = document.getElementById("courseSelect");
                courseSelect.innerHTML = ''; // Clear current options
                
                // Append new options to the course select dropdown
                courses.forEach(function(course) {
                    var option = document.createElement('option');
                    option.value = course.c_code;
                    option.textContent = course.c_name+ '['+ course.c_type +'] - ' + course.c_sec;
                    courseSelect.appendChild(option);
                });
            }
        };
        xhr2.send();
    }
}
// filtering the course names of dropdown for easy search
function filterDropdownCourse() {
    var input, filter, select, option, i;
    input = document.getElementById("searchInputCourse");
    filter = input.value.toUpperCase(); // Convert filter to upper case for case-insensitive comparison
    select = document.getElementById("courseSelect");
    option = select.getElementsByTagName("option");
    for (i = 0; i < option.length; i++) {
        // Check if the option text contains the filter text
        txtValue = option[i].textContent || option[i].innerText; // Get text content or inner text of the option
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            option[i].style.display = ""; // Show the option
        } else {
            option[i].style.display = "none"; // Hide the option if it does not match
        }
    }
}
function updateCourseInfo() {
    var select = document.getElementById("courseSelect");
    var selectedOption = select.options[select.selectedIndex];
    if (selectedOption.getAttribute("data-type") == "Lab"){
        var col_3 = document.getElementById("col_3");
        col_3.value = selectedOption.getAttribute("data-code");
        switch(selectedOption.getAttribute("data-day1")){
            case 'Sat':
                sat.value = "Sat";
                sun.value = "X";
                tue.value = "X";
                wed.value = "X";
                break;
            case 'Sun':
                sun.value = "Sun";
                sat.value = "X";
                tue.value = "X";
                wed.value = "X";
                break;
            case 'Tue':
                tue.value = "Tue";
                sun.value = "X";
                sat.value = "X";
                wed.value = "X";
                break;
            case 'Wed':
                wed.value = "Wed";
                sun.value = "X";
                tue.value = "X";
                sat.value = "X";
                break;
        }
    } else {
        var col_3 = document.getElementById("col_3");
        col_3.value = selectedOption.getAttribute("data-code");
        switch(selectedOption.getAttribute("data-day1")){
            case 'Sat':
                sat.value = "Sat";
                tue.value = "Tue";
                sun.value = "X";
                wed.value = "X";
                break;
            case 'Sun':
                sun.value = "Sun";
                wed.value = "Wed";
                sat.value = "X";
                tue.value = "X";
                break;
        }
    }
}

function displayPopup(notes) {
    var popupSound = document.getElementById("popupSound");
    popupSound.play();
    var popup = document.getElementById("notePopup");
    var noteContent = document.getElementById("noteContent");
    noteContent.innerHTML = notes;
    popup.style.display = "block";
    var popupSound = document.getElementById("popupSound");
    popupSound.play();
}

function closePopup() {
    var popup = document.getElementById("notePopup");
    popup.style.display = "none";
}






function filterDropdownSat() {
    var input, filter, select, option, i;
    input = document.getElementById("sat");
    filter = input.value.toUpperCase();
    select = document.getElementById("satCourseSelect");
    option = select.getElementsByTagName("option");
    for (i = 0; i < option.length; i++) {
        if (option[i].innerHTML.toUpperCase().indexOf(filter) > -1 && option[i].getAttribute("data-day1") == "Sat") {
            option[i].style.display = "";
        } else {
            option[i].style.display = "none";
        }
    }
}

function updateSatCourseInfo() {
    var select = document.getElementById("satCourseSelect");
    var selectedOption = select.options[select.selectedIndex];
    if (selectedOption.getAttribute("data-type") == "Lab"){
        var col_3 = document.getElementById("col_3");
        col_3.value = selectedOption.getAttribute("data-code");
        sat.value = "Sat";
        sun.value = "X";
        tue.value = "X";
        wed.value = "X";
    } else {
        var col_3 = document.getElementById("col_3");
        col_3.value = selectedOption.getAttribute("data-code");
        sat.value = "Sat";
        tue.value = "Tue";
        sun.value = "X";
        wed.value = "X";
    }
}

function filterDropdownSat() {
    var input, filter, select, option, i;
    input = document.getElementById("sat");
    filter = input.value.toUpperCase();
    select = document.getElementById("satCourseSelect");
    option = select.getElementsByTagName("option");
    for (i = 0; i < option.length; i++) {
        if (option[i].innerHTML.toUpperCase().indexOf(filter) > -1 && option[i].getAttribute("data-day1") == "Sat") {
            option[i].style.display = "";
        } else {
            option[i].style.display = "none";
        }
    }
}

function updateSatCourseInfo() {
    var select = document.getElementById("satCourseSelect");
    var selectedOption = select.options[select.selectedIndex];
    if (selectedOption.getAttribute("data-type") == "Lab"){
        var col_3 = document.getElementById("col_3");
        col_3.value = selectedOption.getAttribute("data-code");
        switch(selectedOption.getAttribute("data-day1")){
            case 'Sat':
                sat.value = "Sat";
                sun.value = "X";
                tue.value = "X";
                wed.value = "X";
                break;
            case 'Sun':
                sun.value = "Sun";
                sat.value = "X";
                tue.value = "X";
                wed.value = "X";
                break;
            case 'Tue':
                tue.value = "Tue";
                sun.value = "X";
                sat.value = "X";
                wed.value = "X";
                break;
            case 'Wed':
                wed.value = "Wed";
                sun.value = "X";
                tue.value = "X";
                sat.value = "X";
                break;
        }
    } else {
        var col_3 = document.getElementById("col_3");
        col_3.value = selectedOption.getAttribute("data-code");
        switch(selectedOption.getAttribute("data-day1")){
            case 'Sat':
                sat.value = "Sat";
                tue.value = "Tue";
                sun.value = "X";
                wed.value = "X";
                break;
            case 'Sun':
                sun.value = "Sun";
                wed.value = "Wed";
                sat.value = "X";
                tue.value = "X";
                break;
        }
    }
}

function filterDropdownSat() {
    var input, filter, select, option, i;
    input = document.getElementById("sat");
    filter = input.value.toUpperCase();
    select = document.getElementById("satCourseSelect");
    option = select.getElementsByTagName("option");
    for (i = 0; i < option.length; i++) {
        if (option[i].innerHTML.toUpperCase().indexOf(filter) > -1 && option[i].getAttribute("data-day1") == "Sat") {
            option[i].style.display = "";
        } else {
            option[i].style.display = "none";
        }
    }
}

function updateTueCourseInfo() {
    var select = document.getElementById("tueCourseSelect");
    var selectedOption = select.options[select.selectedIndex];
    if (selectedOption.getAttribute("data-type") == "Lab"){
        var col_3 = document.getElementById("col_3");
        col_3.value = selectedOption.getAttribute("data-code");
        switch(selectedOption.getAttribute("data-day1")){
            case 'Sat':
                sat.value = "Sat";
                sun.value = "X";
                tue.value = "X";
                wed.value = "X";
                break;
            case 'Sun':
                sun.value = "Sun";
                sat.value = "X";
                tue.value = "X";
                wed.value = "X";
                break;
            case 'Tue':
                tue.value = "Tue";
                sun.value = "X";
                sat.value = "X";
                wed.value = "X";
                break;
            case 'Wed':
                wed.value = "Wed";
                sun.value = "X";
                tue.value = "X";
                sat.value = "X";
                break;
        }
    } else {
        var col_3 = document.getElementById("col_3");
        col_3.value = selectedOption.getAttribute("data-code");
        switch(selectedOption.getAttribute("data-day1")){
            case 'Sat':
                sat.value = "Sat";
                tue.value = "Tue";
                sun.value = "X";
                wed.value = "X";
                break;
            case 'Sun':
                sun.value = "Sun";
                wed.value = "Wed";
                sat.value = "X";
                tue.value = "X";
                break;
        }
    }
}

function filterDropdownWed() {
    var input, filter, select, option, i;
    input = document.getElementById("wed");
    filter = input.value.toUpperCase();
    select = document.getElementById("wedCourseSelect");
    option = select.getElementsByTagName("option");
    for (i = 0; i < option.length; i++) {
        if (option[i].innerHTML.toUpperCase().indexOf(filter) > -1 && option[i].getAttribute("data-day1") == "Wed") {
            option[i].style.display = "";
        } else {
            option[i].style.display = "none";
        }
    }
}

function updateWedCourseInfo() {
    var select = document.getElementById("wedCourseSelect");
    var selectedOption = select.options[select.selectedIndex];
    if (selectedOption.getAttribute("data-type") == "Lab"){
        var col_3 = document.getElementById("col_3");
        col_3.value = selectedOption.getAttribute("data-code");
        switch(selectedOption.getAttribute("data-day1")){
            case 'Sat':
                sat.value = "Sat";
                sun.value = "X";
                tue.value = "X";
                wed.value = "X";
                break;
            case 'Sun':
                sun.value = "Sun";
                sat.value = "X";
                tue.value = "X";
                wed.value = "X";
                break;
            case 'Tue':
                tue.value = "Tue";
                sun.value = "X";
                sat.value = "X";
                wed.value = "X";
                break;
            case 'Wed':
                wed.value = "Wed";
                sun.value = "X";
                tue.value = "X";
                sat.value = "X";
                break;
        }
    } else {
        var col_3 = document.getElementById("col_3");
        col_3.value = selectedOption.getAttribute("data-code");
        switch(selectedOption.getAttribute("data-day1")){
            case 'Sat':
                sat.value = "Sat";
                tue.value = "Tue";
                sun.value = "X";
                wed.value = "X";
                break;
            case 'Sun':
                sun.value = "Sun";
                wed.value = "Wed";
                sat.value = "X";
                tue.value = "X";
                break;
        }
    }
}