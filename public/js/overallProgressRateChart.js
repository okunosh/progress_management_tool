document.addEventListener('DOMContentLoaded', function() {
    var canvases = document.querySelectorAll('canvas[id^="progressChart"]');
    canvases.forEach(function(canvas) {
        var goalId = canvas.getAttribute('data-goal-id');
        var ctx = canvas.getContext('2d');
        var progressRate = canvas.getAttribute('data-progress-rate');
        var goalName = canvas.getAttribute('data-goal-name');

        var progressChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['進捗率'],
                datasets: [{
                    label: goalName,
                    data: [progressRate],
                    backgroundColor: '#0476e8'
                }]
            },
            options: {
                indexAxis: 'y',
                scales: {
                    x: {
                        beginAtZero: true,
                        max: 100
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    });
});