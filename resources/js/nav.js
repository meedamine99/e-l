const links = document.querySelectorAll('.links') ;
links.forEach((link) => {
    link.addEventListener("mouseover", () => {
        link.children[1].classList.remove("optiontransition")
    })
    link.addEventListener("mouseleave", () => {
        link.children[1].classList.add("optiontransition")
        
    })
})
