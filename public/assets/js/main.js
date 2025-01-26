const activePage = window.location.pathname;
const navLinks = document.querySelectorAll(".nav a").forEach((link) => {
    if (link.getAttribute("href") === activePage) {
        link.classList.add("active");
    } else {
        link.classList.remove("active");
    }
});

const anonymousButton = document.getElementById("anonymousButton");
anonymousButton.addEventListener("change", () => {
    if (anonymousButton.checked) {
        document.getElementById("formNameMessage").style.display = "none";
        document.getElementById("formEmailMessage").style.display = "none";
        document.getElementById("formMessage").classList.add("mt-4");
    } else if (!anonymousButton.checked) {
        document.getElementById("formNameMessage").style.display = "block";
        document.getElementById("formEmailMessage").style.display = "block";
        document.getElementById("formMessage").classList.remove("mt-4");
    }
});
