const activePage = window.location.pathname;
const navLinks = document.querySelectorAll(".nav a").forEach((link) => {
    if (link.getAttribute("href") === activePage) {
        link.classList.add("active");
    } else {
        link.classList.remove("active");
    }
});








