const activePage = window.location.pathname;


const navLinks = document.querySelectorAll(".nav-item").forEach((link) => {
    if (link.getAttribute("id") === activePage || activePage.includes(link.getAttribute("id"))) {
        link.classList.add("active");
        
        
    } else {
        link.classList.remove("active");
    }
});

const subLinks = document.querySelectorAll(".sublinks").forEach((subLink) => {
    if (subLink.getAttribute("href") === activePage) {
        subLink.classList.add("active");
    } else {
        subLink.classList.remove("active");
    }
});












