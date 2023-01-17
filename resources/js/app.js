import './bootstrap';

import './bootstrap';


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



/* window.onscroll = function () {
  reverseColor();
};

var contact = document.getElementById("contact");
var contactPos = contact.offsetTop;
const body = document.querySelector("body");
function reverseColor() {
  if (window.pageYOffset >= contactPos - 600) {
    body.style.setProperty("background-color", " #24acdc");
    body.style.setProperty("color", "#f2f2f2");
    body.style.transition = '2s ease-in-out'
  } else {
    body.style.setProperty("background-color", "#f2f2f2");
    body.style.setProperty("color", " #24acdc");
    body.style.transition = '2s'
  }
} */
/* parallax */

window.addEventListener('scroll', function () {
    const Bg = document.querySelector('.bg1');
    /*   const aBg = document.querySelectorAll('.about-image'); */
    let WinPos = window.pageYOffset;

    Bg.style.transform = "translateY(" + WinPos * .15 + "px)";
    [...document.getElementsByClassName('about-image')].forEach(el => {
        el.style.transform = "translateY(" + WinPos * .1 + "px)";
    })
});



const preloder = document.querySelector('.container');
const page = document.getElementById('page');
page.style.display = "none"
window.addEventListener('load', function () {
    preloder.style.display = "none"
    page.style.display = "block"
    preloder.style.transition = "1s"
})