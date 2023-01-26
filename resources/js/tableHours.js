function addhours(name, element) {
    let tableHeader = document.createElement('th');
    tableHeader.textContent = name;
    element.appendChild(tableHeader);
}
import dataHours from "./day_hours.json" assert {type: "json"};

let hours = dataHours.hours;
let time = document.getElementById('time');

for (const key in hours) {
    let hour = hours[key].twenty_four_hour_format + " " + hours[key].time_of_day;
    addhours(hour, time);
};


let dayOfWeek = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Venredi", "Samedi", "Dimanche"];

let days = document.getElementById('days');

function addDays(name, element){
    let tableRow = document.createElement('tr');
    element.appendChild(tableRow);
    let tableHeader = document.createElement('th');
    tableHeader.textContent = name;
    tableRow.appendChild(tableHeader);  

}

dayOfWeek.forEach(day => {
    addDays(day, days);
});