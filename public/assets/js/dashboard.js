'use strict';
/* NatsuX */
// Get the canvas element from html page
const graphCanvas = document.getElementById('graph').getContext('2d');

/* Graph Data */
const graphData = {
    type: 'line',
    data: {
        labels: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
        datasets: [{
            label: 'Requests',
            data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
        }]
    },
    options: {
        scales: {
            y: {beginAtZero: false}
        },
        plugins: {
            legend: {
                display: false
            }
        }
    }
};

/* Create Chart base from the data */
function createCharts(data, canvas) {
    new Chart(canvas, data);
}
// Generate
createCharts(graphData, graphCanvas);