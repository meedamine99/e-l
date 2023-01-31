import './bootstrap';

import './bootstrap';

var forms = document.querySelectorAll('form');
var inputs = document.querySelectorAll('.form-control');
var selects = document.querySelectorAll('select');


forms.forEach(function (form) {

    form.addEventListener('submit', function (event) {
        inputs.forEach(e => {
            if (e.value == "") {
                event.preventDefault()
                event.stopPropagation()

                e.style.borderColor = "red";

            } else if (e.value != "") {
                e.style.borderColor = "green"
            }
        });
        selects.forEach(e => {
            if (e.value == "") {
                event.preventDefault()
                event.stopPropagation()

                e.style.borderColor = "red";

            } else if (e.value != "") {
                e.style.borderColor = "green"
            }
        });


    })
})

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


const serviceContainers = [...document.querySelectorAll('.service-container')];
const nxtBtn = [...document.querySelectorAll('.nxt-btn')];
const preBtn = [...document.querySelectorAll('.pre-btn')];

serviceContainers.forEach((item, i) => {

    let containerWidth = 600;

    nxtBtn[i].addEventListener('click', () => {
        item.scrollLeft += 645.550;
    })

    preBtn[i].addEventListener('click', () => {
        item.scrollLeft -= 645.550;
    })
})



/* parallax */

window.addEventListener('scroll', function () {
    let WinPos = window.pageYOffset;
    const Bg = document.querySelector('.bg1');
    Bg.style.transform = "translateY(" + WinPos * .15 + "px)";


    const images = document.querySelectorAll('.about-image');
    images.forEach(e => {
        e.style.transform = "translateY(" + WinPos * .1 + "px)"
    });

    const befores = document.querySelectorAll('.before');
    befores.forEach(e => {
        e.style.transform = "translateY(" + WinPos * .05 + "px)"
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


