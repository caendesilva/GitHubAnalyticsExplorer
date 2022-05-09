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

    <section>
        <h2>Daily GitHub clone activity per repository</h2>
        <x-clones-chart :clones="$clonesHyde" />
        <hr style="max-width: 800px; margin-left: 0; margin-bottom: 40px; opacity: 0.5;">
        <x-clones-chart :clones="$clonesFramework" />
        <hr style="max-width: 800px; margin-left: 0; margin-bottom: 40px; opacity: 0.5;">
        <x-clones-chart :clones="$clonesHydeFront" />
    </section>

</body>
</html>