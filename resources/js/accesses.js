const formationSelect = document.getElementById('formation');
const checkMatiere = document.querySelectorAll('.matiere');
function inactive(item) {
    item.forEach(e => {
        e.classList.add("inactive");
    });
};
inactive(checkMatiere);
formationSelect.addEventListener('change', item => {
    inactive(checkMatiere);
    checkMatiere.forEach(e => {
        if (parseInt(e.dataset.matiere) === parseInt(item.target.value))
            e.classList.remove("inactive");
    })
})