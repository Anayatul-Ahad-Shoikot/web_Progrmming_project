function filterDropdown() {
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
function filterDropdownCourse() {
    var input, filter, select, option, i;
    input = document.getElementById("searchInputCourse");
    filter = input.value.toUpperCase();
    select = document.getElementById("courseSelect");
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
    var load = document.getElementById("load");
    var ratioT = selectedOption.getAttribute("data-current_T") + " / " + selectedOption.getAttribute("data-max_T");
    var RatioL = selectedOption.getAttribute("data-current_L") + " / " + selectedOption.getAttribute("data-max_L");
    load.innerHTML = "Theory: " + ratioT + "<br> Lab: " + RatioL;

    var selectedFaculty = selectedOption.value;
    if (selectedFaculty) {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "fetch_notes.php?faculty=" + selectedFaculty, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var notes = xhr.responseText;
                if (notes.trim() !== "") { // Check if notes data is not empty
                    displayPopup(notes);
                }
            }
        };
        xhr.send();
    }
}
function updateCourseInfo() {
    var select = document.getElementById("courseSelect");
    var selectedOption = select.options[select.selectedIndex];
    var codeInput = document.getElementById("codeInput");
    var typeInput = document.getElementById("typeInput");
    var secInput = document.getElementById("secInput");
    var timeInput = document.getElementById("timeInput");
    var dayInput = document.getElementById("dayInput");
    codeInput.value = selectedOption.getAttribute("data-code");
    typeInput.value = selectedOption.getAttribute("data-type");
    secInput.value = selectedOption.getAttribute("data-sec");
    timeInput.value = selectedOption.getAttribute("data-time");
    dayInput.value = selectedOption.getAttribute("data-day");
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