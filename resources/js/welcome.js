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