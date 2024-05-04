document.addEventListener("DOMContentLoaded", function() {
    setInitialSelectState();
});

function setInitialSelectState() {
    document.getElementById("saturdaySelect").disabled = true;
    document.getElementById("sundaySelect").disabled = true;
    document.getElementById("tuesdaySelect").disabled = true;
    document.getElementById("wednesdaySelect").disabled = true;
    document.getElementById("add_btn").disabled = true;
}

function updateFacultyInfo() {
    var select = document.getElementById("facultySelect");
    var selectedOption = select.options[select.selectedIndex];
    if (!selectedOption.value) return;

    document.getElementById("saturdaySelect").disabled = false;
    document.getElementById("sundaySelect").disabled = false;
    document.getElementById("tuesdaySelect").disabled = false;
    document.getElementById("wednesdaySelect").disabled = false;

    var parts = selectedOption.value.split('-');
    var f_code = parts[0].trim();
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "/timeline/fetch_notes.php?faculty=" + f_code, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var notes = xhr.responseText;
            if (notes.trim() !== "") {
                displayPopup(notes);
            }
        }
    };
    xhr.send();
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

function checkDayCourse(dayId, otherDayIds) {
    var facultySelect = document.getElementById('facultySelect');
    var daySelect = document.getElementById(dayId);
    var facultyId = facultySelect.value;
    var courseId = daySelect.value;
    var xhr = new XMLHttpRequest();
    xhr.open('GET', `/timeline/check_${dayId.replace("Select", "")}.php?facultyId=` + encodeURIComponent(facultyId) + '&courseId=' + encodeURIComponent(courseId), true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            if (xhr.responseText === "YES") {
                alert('Opss....Time conflicts.');
                window.location.reload();
            } else {
                document.getElementById("add_btn").disabled = false;
                otherDayIds.forEach(id => {
                    document.getElementById(id).disabled = true;
                });
            }
        }
    };
    xhr.send();
}

function checkSatCourse() {
    checkDayCourse('saturdaySelect', ['sundaySelect', 'tuesdaySelect', 'wednesdaySelect']);
    // var facultySelect = document.getElementById('facultySelect');
    // var saturdaySelect = document.getElementById('saturdaySelect');
    // var facultyId = facultySelect.value;
    // var courseId = saturdaySelect.value;
    // var xhr = new XMLHttpRequest();
    // xhr.open('GET', '/timeline/check_Saturday.php?facultyId=' + encodeURIComponent(facultyId) + '&courseId=' + encodeURIComponent(courseId), true);
    // xhr.onreadystatechange = function () {
    //     if (xhr.readyState === 4 && xhr.status === 200) {
    //         if (xhr.responseText === "YES") {
    //             alert('Opss....Time conflicts.');
    //             window.location.reload();
    //         }
    //     }
    // };
    // xhr.send();
}
function checkSunCourse() {
    checkDayCourse('sundaySelect', ['saturdaySelect', 'tuesdaySelect', 'wednesdaySelect']);
    // var facultySelect = document.getElementById('facultySelect');
    // var saturdaySelect = document.getElementById('sundaySelect');
    // var facultyId = facultySelect.value;
    // var courseId = saturdaySelect.value;
    // var xhr = new XMLHttpRequest();
    // xhr.open('GET', '/timeline/check_Sunday.php?facultyId=' + encodeURIComponent(facultyId) + '&courseId=' + encodeURIComponent(courseId), true);
    // xhr.onreadystatechange = function () {
    //     if (xhr.readyState === 4 && xhr.status === 200) {
    //         if (xhr.responseText === "YES") {
    //             alert('Opss....Time conflicts.');
    //             window.location.reload();
    //         }
    //     }
    // };
    // xhr.send();
}
function checkTueCourse() {
    checkDayCourse('tuesdaySelect', ['saturdaySelect', 'sundaySelect', 'wednesdaySelect']);
    // var facultySelect = document.getElementById('facultySelect');
    // var saturdaySelect = document.getElementById('tuesdaySelect');
    // var facultyId = facultySelect.value;
    // var courseId = saturdaySelect.value;
    // var xhr = new XMLHttpRequest();
    // xhr.open('GET', '/timeline/check_Tuesday.php?facultyId=' + encodeURIComponent(facultyId) + '&courseId=' + encodeURIComponent(courseId), true);
    // xhr.onreadystatechange = function () {
    //     if (xhr.readyState === 4 && xhr.status === 200) {
    //         if (xhr.responseText === "YES") {
    //             alert('Opss....Time conflicts.');
    //             window.location.reload();
    //         }
    //     }
    // };
    // xhr.send();
}
function checkWedCourse() {
    checkDayCourse('wednesdaySelect', ['saturdaySelect', 'sundaySelect', 'tuesdaySelect']);
    // var facultySelect = document.getElementById('facultySelect');
    // var saturdaySelect = document.getElementById('wednesdaySelect');
    // var facultyId = facultySelect.value;
    // var courseId = saturdaySelect.value;
    // var xhr = new XMLHttpRequest();
    // xhr.open('GET', '/timeline/check_Wednesday.php?facultyId=' + encodeURIComponent(facultyId) + '&courseId=' + encodeURIComponent(courseId), true);
    // xhr.onreadystatechange = function () {
    //     if (xhr.readyState === 4 && xhr.status === 200) {
    //         if (xhr.responseText === "YES") {
    //             alert('Opss....Time conflicts.');
    //             window.location.reload();
    //         }
    //     }
    // };
    // xhr.send();
}