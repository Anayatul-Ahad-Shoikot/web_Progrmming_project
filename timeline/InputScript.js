
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
                var courses = JSON.parse(xhr2.responseText);
                var courseSelect = document.getElementById("courseSelect");
                courseSelect.innerHTML = '<option selected disabled>Select Course</option>';
                courses.forEach(function(course) {
                    var option = document.createElement('option');
                    option.value = course.c_code + '|' + course.c_sec;
                    option.textContent = `${course.c_name} - [${course.c_time}]`;
                    option.title = `code: ${course.c_code},   type: ${course.c_type} - ${course.c_sec},  day: ${course.c_day1} ${course.c_day2}`;
                    option.setAttribute('data-day1', course.c_day1);
                    option.setAttribute('data-type', course.c_type);
                    courseSelect.appendChild(option);
                    
                });
            }
        };
        xhr2.send();

        var xhr3 = new XMLHttpRequest();
        xhr3.open("GET", "fetch_sat_course.php?faculty=" + encodeURIComponent(selectedFaculty), true);
        xhr3.onreadystatechange = function() {
            if (xhr3.readyState === 4 && xhr3.status === 200) {
                var satCourses = JSON.parse(xhr3.responseText);
                var satSelect = document.getElementById("satSelect");
                satSelect.innerHTML = '<option selected disabled>Select Course</option>';
                satCourses.forEach(function(x) {
                    var option = document.createElement('option');
                    option.value = x.c_code + '|' + x.c_sec;
                    option.textContent = `${x.c_name} - [${x.c_time}]`;
                    option.title = `code: ${x.c_code},   type: ${x.c_type} - ${x.c_sec},  day: ${x.c_day1} ${x.c_day2}`;
                    option.setAttribute('data-day1', x.c_day1);
                    option.setAttribute('data-type', x.c_type);
                    satSelect.appendChild(option);
                    
                });
            }
        };
        xhr3.send();

        var xhr4 = new XMLHttpRequest();
        xhr4.open("GET", "fetch_sun_course.php?faculty=" + encodeURIComponent(selectedFaculty), true);
        xhr4.onreadystatechange = function() {
            if (xhr4.readyState === 4 && xhr4.status === 200) {
                var courses = JSON.parse(xhr4.responseText);
                var sunSelect = document.getElementById("sunSelect");
                sunSelect.innerHTML = '<option selected disabled>Select Course</option>';
                courses.forEach(function(course) {
                    var option = document.createElement('option');
                    option.value = course.c_code + '|' + course.c_sec;
                    option.textContent = `${course.c_name} - [${course.c_time}]`;
                    option.title = `code: ${course.c_code},   type: ${course.c_type} - ${course.c_sec},  day: ${course.c_day1} ${course.c_day2}`;
                    option.setAttribute('data-day1', course.c_day1);
                    option.setAttribute('data-type', course.c_type);
                    sunSelect.appendChild(option);
                    
                });
            }
        };
        xhr4.send();

        var xhr5 = new XMLHttpRequest();
        xhr5.open("GET", "fetch_tue_course.php?faculty=" + encodeURIComponent(selectedFaculty), true);
        xhr5.onreadystatechange = function() {
            if (xhr5.readyState === 4 && xhr5.status === 200) {
                var courses = JSON.parse(xhr5.responseText);
                var tueSelect = document.getElementById("tueSelect");
                tueSelect.innerHTML = '<option selected disabled>Select Course</option>';
                courses.forEach(function(course) {
                    var option = document.createElement('option');
                    option.value = course.c_code + '|' + course.c_sec;
                    option.textContent = `${course.c_name} - [${course.c_time}]`;
                    option.title = `code: ${course.c_code},   type: ${course.c_type} - ${course.c_sec},  day: ${course.c_day1} ${course.c_day2}`;
                    option.setAttribute('data-day1', course.c_day1);
                    option.setAttribute('data-type', course.c_type);
                    tueSelect.appendChild(option);
                    
                });
            }
        };
        xhr5.send();

        var xhr6 = new XMLHttpRequest();
        xhr6.open("GET", "fetch_wed_course.php?faculty=" + encodeURIComponent(selectedFaculty), true);
        xhr6.onreadystatechange = function() {
            if (xhr6.readyState === 4 && xhr6.status === 200) {
                var courses = JSON.parse(xhr6.responseText);
                var wedSelect = document.getElementById("wedSelect");
                wedSelect.innerHTML = '<option selected disabled>Select Course</option>';
                courses.forEach(function(course) {
                    var option = document.createElement('option');
                    option.value = course.c_code + '|' + course.c_sec;
                    option.textContent = `${course.c_name} - [${course.c_time}]`;
                    option.title = `code: ${course.c_code},   type: ${course.c_type} - ${course.c_sec},  day: ${course.c_day1} ${course.c_day2}`;
                    option.setAttribute('data-day1', course.c_day1);
                    option.setAttribute('data-type', course.c_type);
                    wedSelect.appendChild(option);
                    
                });
            }
        };
        xhr6.send();
    }
}
// filtering the course names of dropdown for easy search
function filterDropdownCourse() {
    var input, filter, select, option, i;
    input = document.getElementById("searchInputCourse");
    filter = input.value.toUpperCase();
    select = document.getElementById("courseSelect");
    option = select.getElementsByTagName("option");
    for (i = 0; i < option.length; i++) {
        txtValue = option[i].textContent || option[i].innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            option[i].style.display = "";
        } else {
            option[i].style.display = "none";
        }
    }
}



function updateCourseInfo() {
    var select = document.getElementById("courseSelect");
    var selectedOption = select.options[select.selectedIndex];
    var sat = document.getElementById("sat");
    var sun = document.getElementById("sun");
    var tue = document.getElementById("tue");
    var wed = document.getElementById("wed");
    sat.value = "";
    sun.value = "";
    tue.value = "";
    wed.value = "";

    if (selectedOption.getAttribute("data-type") == "Lab") {
        switch(selectedOption.getAttribute("data-day1")) {
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
        switch(selectedOption.getAttribute("data-day1")) {
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
    var satSelect = document.getElementById("satSelect");
    var sunSelect = document.getElementById("sunSelect");
    var tueSelect = document.getElementById("tueSelect");
    var wedSelect = document.getElementById("wedSelect");
    satSelect.style.display = 'none';
    sunSelect.style.display = 'none';
    tueSelect.style.display = 'none';
    wedSelect.style.display = 'none';
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