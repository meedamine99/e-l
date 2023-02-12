var shine = document.querySelector('.shine');
var links = document.querySelectorAll('.links');
window.addEventListener('mousemove', cursor);
function cursor(e) {
    var x = e.pageX;
    var y = e.pageY;
    shine.style.left = x + "px";
    shine.style.top = y + "px";
};
links.forEach(link => {
    link.addEventListener("mouseover", () => {
        shine.classList.add("shineEffect");
    });
    link.addEventListener("mouseleave", () => {
        shine.classList.remove("shineEffect");
    });
});

const preloder = document.querySelector('.container');
const page = document.getElementById('page');
page.style.display = "none"
window.addEventListener('load', function () {
    preloder.style.display = "none"
    page.style.display = "block"
    preloder.style.transition = "1s"
})


/* extra */
function checkForVisibility() {
    var headers = document.querySelectorAll(".header");
    headers.forEach(function (header) {
        if (isElementInViewport(header)) {
            header.classList.add("headerVisible");
        } else {
            header.classList.remove("headerVisible");
        }
    });
}

function isElementInViewport(el) {
    var rect = el.getBoundingClientRect();

    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <=
        (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
}

if (window.addEventListener) {
    addEventListener("DOMContentLoaded", checkForVisibility, false);
    addEventListener("load", checkForVisibility, false);
    addEventListener("scroll", checkForVisibility, false);
}
