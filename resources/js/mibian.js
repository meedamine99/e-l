import { forEach } from "lodash";

const chart = document.getElementById('chart').getContext('2d');
const userData = document.querySelector('.userData').value;
console.log(userData);
new Chart(chart, {
    type: 'line',
    data: {
        labels: ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi'],
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