const formationSelect = document.getElementById('formation');
const checkMatiere = document.querySelectorAll('.matiere');
/* function inactive(item) {
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
}) */

function select(select, content) {
    function inactive(item) {
        item.forEach(e => {
            e.classList.add("inactive");
        })
    };
    inactive(content);
    select.addEventListener('change', item => {
        inactive(content);
        content.forEach(e => {
            if (parseInt(e.dataset.matiere) === parseInt(item.target.value))
                e.classList.remove("inactive");
        })
    });
};

select(formationSelect, checkMatiere)

const formationSelectForTime = document.getElementById('formation');
const selectMatiere = document.querySelectorAll('.matiere');

select(formationSelectForTime, selectMatiere)