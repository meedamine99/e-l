function addOptions(name , element) {
    let opt=document.createElement('option');
    opt.setAttribute("value", name);
    opt.textContent = name;
    element.appendChild(opt);
}
import dataHours from  "./day_hours.json" assert {type: "json"};


let hours =dataHours.hours;
let hourStart = document.getElementById('hourStart');
let hourEnd = document.querySelector('#hourEnd');
for (const key in hours) {
    hours[key].twenty_four_hour_format !="21:00" ? addOptions(hours[key].twenty_four_hour_format + " " + hours[key].time_of_day, hourStart) : "";
        
    hours[key].twenty_four_hour_format !="09:00" ? addOptions(hours[key].twenty_four_hour_format + " " + hours[key].time_of_day, hourEnd): "";
    
}
