<section style="max-width: 1600px; max-height: 400px;  margin-bottom: 100px;">
    <canvas id="packagistInstallsChart" width="400" height="400" style="max-width: 100%; max-height: 100%;"></canvas>
    
    <script>
        const ctxpackagistInstallsChart = document.getElementById('packagistInstallsChart');
        
        var total = {
            label: "Total",
            data: {!! json_encode($installs->pluck('total')) !!},
            lineTension: 0,
            fill: false,
            borderColor: 'green'
        };
        
        var data = {
            labels: {!! json_encode($installs->pluck('date')) !!},
            datasets: [total]
        };
        
        const packagistInstallsChart = new Chart(ctxpackagistInstallsChart, {
            type: 'line',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                plugins: {
                    title: {
                        display: true,
                        text: '{{ $installs->first()->repository }}',
                        color: 'black',
                        font: {
                            size: 18,
                            weight: 'bold'
                        },
                    },
                    subtitle: {
                        display: true,
                        text: '{{ $installs->sum('total') }} total installs',
                        color: '#333',
                        font: {
                            size: 16,
                            weight: 'normal',
                            style: 'italic'
                        },
                        padding: {
                            bottom: 20
                        }
                    },
                    tooltip: {
                    }
                }
            }
        });
    </script>
    
</section>