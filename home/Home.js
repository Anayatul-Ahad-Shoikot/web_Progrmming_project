// function saveSidebarState(isHidden) {
//     localStorage.setItem('sidebarHidden', isHidden);
// }
// function getSidebarState() {
//     return localStorage.getItem('sidebarHidden') === 'true';
// }
// function saveSwitchModeState(isDarkMode) {
//     localStorage.setItem('switchMode', isDarkMode);
// }
// function getSwitchModeState() {
//     return localStorage.getItem('switchMode') === 'true';
// }
// let sideMenu = document.querySelectorAll(".nav-link");
// sideMenu.forEach((item) => {
//     let li = item.parentElement;
//     item.addEventListener("click", () => {
//         sideMenu.forEach((link) => {
//             link.parentElement.classList.remove("active");
//         });
//         li.classList.add("active");
//     });
// });
// let menuBar = document.querySelector(".menu-btn");
// let sideBar = document.querySelector(".sidebar");
// let isSidebarHidden = getSidebarState();
// if (isSidebarHidden) {
//     sideBar.classList.add("hide");
    
// }
// menuBar.addEventListener("click", () => {
//     sideBar.classList.toggle("hide");
//     isSidebarHidden = !isSidebarHidden;
//     saveSidebarState(isSidebarHidden);
// });
// let switchMode = document.getElementById("switch-mode");
// let isDarkMode = getSwitchModeState();
// switchMode.checked = isDarkMode;
// switchMode.addEventListener("change", (e) => {
//     if (e.target.checked) {
//         document.body.classList.add("dark");
//         isDarkMode = true;
//     } else {
//         document.body.classList.remove("dark");
//         isDarkMode = false;
//     }
//     saveSwitchModeState(isDarkMode);
// });
// let searchFrom = document.querySelector(".content nav form");
// let searchBtn = document.querySelector(".search-btn");
// let searchIcon = document.querySelector(".search-icon");
// searchBtn.addEventListener("click", (e) => {
//     if (window.innerWidth < 576) {
//         e.preventDefault();
//         searchFrom.classList.toggle("show");
//         if (searchFrom.classList.contains("show")) {
//             searchIcon.classList.replace("fa-search", "fa-times");
//         } else {
//             searchIcon.classList.replace("fa-times", "fa-search");
//         }
//     }
// });
// window.addEventListener("resize", () => {
//     if (window.innerWidth > 576) {
//         searchIcon.classList.replace("fa-times", "fa-search");
//         searchFrom.classList.remove("show");
//     }
//     if (window.innerWidth < 768) {
//         sideBar.classList.add("hide");
//     }
// });
// if (window.innerWidth < 768) {
//     sideBar.classList.add("hide");
// }

function saveSidebarState(isHidden) {
    localStorage.setItem('sidebarHidden', isHidden);
}
function getSidebarState() {
    return localStorage.getItem('sidebarHidden') === 'true';
}
function saveSwitchModeState(isDarkMode) {
    localStorage.setItem('switchMode', String(isDarkMode));
}
function getSwitchModeState() {
    return localStorage.getItem('switchMode') === 'true';
}

document.addEventListener('DOMContentLoaded', (event) => {
    let sideMenu = document.querySelectorAll(".nav-link");
    sideMenu.forEach((item) => {
        let li = item.parentElement;
        item.addEventListener("click", () => {
            sideMenu.forEach((link) => {
                link.parentElement.classList.remove("active");
            });
            li.classList.add("active");
        });
    });

    let menuBar = document.querySelector(".menu-btn");
    let sideBar = document.querySelector(".sidebar");
    let isSidebarHidden = getSidebarState();
    if (isSidebarHidden) {
        sideBar.classList.add("hide");
    }
    menuBar.addEventListener("click", () => {
        sideBar.classList.toggle("hide");
        isSidebarHidden = !isSidebarHidden;
        saveSidebarState(isSidebarHidden);
    });

    let switchMode = document.getElementById("switch-mode");
    let isDarkMode = getSwitchModeState();
    switchMode.checked = isDarkMode;
    document.body.classList.toggle("dark", isDarkMode);
    switchMode.addEventListener("change", (e) => {
        document.body.classList.toggle("dark", e.target.checked);
        saveSwitchModeState(e.target.checked);
    });
});
