import { forEach } from "lodash";

const chart = document.getElementById('chart').getContext('2d');
 new Chart(chart, {
    type:'line',
    data:{
        labels: ['lundi','mardi','mercredi','jeudi','vendredi','samedi'],
        datasets: [
            {
                label:'etudiant',
                data:[90,56,45,23,30,4],
                borderColor: 'blue',
                borderWidth: 1
            },
            {
                label:'formateur',
                data:[80,10,40,20,11,7],
                borderColor: 'red',
                borderWidth: 1
            },
            
        ]

    },
    Options:{
        Responsive: true
    }
})
chart.canvas.parentNode.style.width = '900px';