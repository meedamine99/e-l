import { forEach } from "lodash";

const chart = document.getElementById('chart').getContext('2d');
const userData = document.querySelector('.userData').value;
console.log(userData);
new Chart(chart, {
    type: 'line',
    data: {
        labels: ['Janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre' , 'décembre'],
        datasets: [
            {
                label: 'etudiant',
                data: userData,
                borderColor: 'blue',
                borderWidth: 1
            },

        ]

    },
    Options: {
        Responsive: true
    }
})
chart.canvas.parentNode.style.width = '900px';