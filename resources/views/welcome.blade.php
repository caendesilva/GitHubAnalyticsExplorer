<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HydePHP Statistics</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
</head>
<body>
    <h1>HydePHP Statistics</h1>

    <main style="display: flex;">
        <section style="min-width: 800px;">
            <h2 style="text-align: center;">Daily GitHub clone activity per repository</h2>
            <div style="padding: 10px 20px;">
                <x-clones-chart :clones="$clonesHyde" />
                <hr style="max-width: 800px; margin-left: 0; margin-bottom: 40px; opacity: 0.5;">
                <x-clones-chart :clones="$clonesFramework" />
                <hr style="max-width: 800px; margin-left: 0; margin-bottom: 40px; opacity: 0.5;">
                <x-clones-chart :clones="$clonesHydeFront" />
            </div>
        </section>
    
        <section style="min-width: 800px;">
            <h2 style="text-align: center;">Daily GitHub view activity per repository</h2>
            <div style="padding: 10px 20px;">
                <x-views-chart :views="$viewsHyde" />
                <hr style="max-width: 800px; margin-left: 0; margin-bottom: 40px; opacity: 0.5;">
                <x-views-chart :views="$viewsFramework" />
                <hr style="max-width: 800px; margin-left: 0; margin-bottom: 40px; opacity: 0.5;">
                <x-views-chart :views="$viewsHydeFront" />
            </div>
        </section>
    </main>

</body>
</html>