document.addEventListener("DOMContentLoaded", function() {
    var btnOpenPopup = document.querySelector('.bxs-plus-circle');
    var popup = document.getElementById('notePopup');
    var closePopup = document.getElementsByClassName('close')[0];
    btnOpenPopup.addEventListener('click', function() {
        popup.style.display = "block";
    });
    closePopup.addEventListener('click', function() {
        popup.style.display = "none";
    });
    window.addEventListener('click', function(event) {
        if (event.target == popup) {
            popup.style.display = "none";
        }
    });
});