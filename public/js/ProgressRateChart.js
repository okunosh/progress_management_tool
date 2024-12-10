document.addEventListener('DOMContentLoaded', function() {
    var canvases = document.querySelectorAll('canvas[id^="progressChart"]');
    canvases.forEach(function(canvas) {
        var goalId = canvas.getAttribute('data-goal-id');
        var ctx = canvas.getContext('2d');
        var progressRate = canvas.getAttribute('data-progress-rate');
        var goalName = canvas.getAttribute('data-goal-name');
        var goalType = canvas.getAttribute('data-goal-type');
        var colors = {
            long: '#0476e8', // 青色
            short: '#FF0000' // 赤色
        };
        // goal_typeに基づいて色を選択
        var barColor = colors[goalType] || colors.long; // デフォルトは青色
        var sizes = {
            long: { width: 120, height: 8 },
            short: { width: 80, height: 5 }
        };
        const canvasSize = sizes[goalType] || sizes.long; // デフォルトはlongのサイズ
        // Canvasのサイズを設定
        canvas.setAttribute('width', canvasSize.width);
        canvas.setAttribute('height', canvasSize.height);


        var progressChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['進捗率'],
                datasets: [{
                    label: goalName,
                    data: [progressRate],
                    backgroundColor: barColor
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
                },

            }
        });
    });
});