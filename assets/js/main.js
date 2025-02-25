document.addEventListener("DOMContentLoaded", function () {
    const buttons = document.querySelectorAll(".category-header");

    buttons.forEach(button => {
        button.addEventListener("click", function () {
            const list = this.nextElementSibling;

            if (list.style.display === "block") {
                list.style.display = "none";
            } else {
                list.style.display = "block";
            }
        });
    });
});