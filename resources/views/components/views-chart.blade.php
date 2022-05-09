<section style="max-width: 800px; max-height: 400px;  margin-bottom: 100px;">
    <canvas id="{{ $id }}" width="400" height="400" style="max-width: 100%; max-height: 100%;"></canvas>
    
    <script>
        const ctx{{ $id }} = document.getElementById('{{ $id }}');
        
        var total = {
            label: "Total",
            data: {!! json_encode($views->pluck('total')) !!},
            lineTension: 0,
            fill: false,
            borderColor: 'green'
        };
        
        var unique = {
            label: "Unique",
            data: {!! json_encode($views->pluck('unique')) !!},
            lineTension: 0,
            fill: false,
            borderColor: 'blue'
        };
        
        var data = {
            labels: {!! json_encode($views->pluck('date')) !!},
            datasets: [total, unique]
        };
        
        const {{ $id }} = new Chart(ctx{{ $id }}, {
            type: 'line',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: '{{ $views->first()->repository }}',
                        color: 'black',
                        font: {
                            size: 18,
                            weight: 'bold'
                        },
                    },
                    subtitle: {
                        display: true,
                        text: '{{ $views->sum('total') }} total views, {{ $views->sum('unique') }} unique visitors',
                        color: '#333',
                        font: {
                            size: 16,
                            weight: 'normal',
                            style: 'italic'
                        },
                        padding: {
                            bottom: 20
                        }
                    }
                }
            }
        });
    </script>
    
</section>