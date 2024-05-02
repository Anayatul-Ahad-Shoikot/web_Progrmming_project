
function updateFacultyInfo() {
    var select = document.getElementById("facultySelect");
    var selectedOption = select.options[select.selectedIndex];
    if (!selectedOption.value) return;

    var theory = document.getElementById("theory");
    var lab = document.getElementById("lab");
    theory.innerHTML = selectedOption.getAttribute("data-current_T") + " / " + selectedOption.getAttribute("data-max_T");
    lab.innerHTML = selectedOption.getAttribute("data-current_L") + " / " + selectedOption.getAttribute("data-max_L");
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "fetch_notes.php?faculty=" + selectedOption.value, true);
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