const ctx = document.getElementById('myChart');
var ages = document.querySelectorAll('.age');
var ageArr = [];
var kindergarden = 0;
var high_school = 0;
var graduate = 0;
var over_graduate = 0;
for (i = 0; i < ages.length; i++) {
    ageArr[i] = ages[i].textContent;
}
for (i = 0; i < ageArr.length; i++) {
    if (ageArr[i] < 6) {
        kindergarden += 1;
    }
    if (ageArr[i] > 6 && ageArr[i] <= 16) {
        high_school += 1;
    }
    if (ageArr[i] > 16 && ageArr[i] <= 22) {
        graduate += 1;
    }
    if (ageArr[i] > 22) {
        over_graduate += 1;
    }
}
const labels = [
    'Kindergarden',
    'High School',
    'Graduate',
    'Over Graduate',
];

const data = {
    labels,
    datasets: [{
        data: [kindergarden, high_school, graduate, over_graduate],
        label: "Type Of Students",
        backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 205, 86, 0.2)',
            'rgba(255, 159, 64, 0.2)',
        ],
        borderColor: [
            'rgb(255, 99, 132)',
            'rgb(255, 159, 64)',
            'rgb(255, 205, 86)',
            'rgba(255, 159, 64, 1)',
        ],
        borderWidth: 1,
        inflateAmount: 1,
    },],
};

const config = {
    type: 'line',
    data: data,
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    },
};

const myChart = new Chart(ctx, config);

