<section style="max-width: 800px; max-height: 400px;  margin-bottom: 100px;">

<h2 style="text-align: center;">
    Daily clone activity for repository {{ $clones->first()->repository }}
</h2>

<canvas id="{{ $id }}" width="400" height="400" style="max-width: 100%; max-height: 100%;"></canvas>

<script>
    const ctx{{ $id }} = document.getElementById('{{ $id }}');
    
    var total = {
        label: "Total",
        data: {!! json_encode($clones->pluck('total')) !!},
        lineTension: 0,
        fill: false,
        borderColor: 'green'
      };
    
    var unique = {
        label: "Unique",
        data: {!! json_encode($clones->pluck('unique')) !!},
        lineTension: 0,
        fill: false,
      borderColor: 'blue'
      };
    
    var data = {
      labels: {!! json_encode($clones->pluck('date')) !!},
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
            }
        }
    });
</script>

</section>
