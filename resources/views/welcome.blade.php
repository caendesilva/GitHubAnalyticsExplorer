<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HydePHP Statistics</title>
    <style>
        nav {
            position: absolute;
            top: 0;
            right: 0;
        }
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        nav ul li {
            float: left;
        }
        nav ul li a {
            display: block;
            text-align: center;
            padding: 8px 12px;
            text-decoration: none;
            background: gainsboro;
            border-right: 1px solid gray;
            overflow: visible;
        }
        nav ul li a:hover, nav ul li a:focus, nav ul li a.active {
            background: lightgray;
        }
        nav ul li:last-child a {
            border-right: none;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
</head>
<body>
    <nav>
        <ul>
            <li><a aria-curent="page" class="active" href="./">Start Page</a></li>
            <li><a href="table">Database Viewer</a></li>
            <li><a href="https://hydephp.github.io/">Back to Hyde
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAMCAYAAABWdVznAAAAV0lEQVR4Xq2QwQ2AAAwC3cmd2Kk7sRP64CEJ9qOX8OPatMc/QKppnEPhTmJh23CLiwAqIw21CybKQ28qQi37WGFYBJcwfJQpP8LlEHKyZMF0IdmF13zlAjZ/6H4wb+mUAAAAAElFTkSuQmCC"
                alt="External link"></a></li>
        </ul>
    </nav>

    <header style="text-align: center; margin: 60px 40px;">
        <h1>HydePHP Statistics</h1>
        <h2>
            HydePHP is open source, its data should be too.
        </h2>
        <p>
            HydePHP is a Laravel-powered Static App Generator that
            allows you to create blogs, documentation sites, and more.
        </p>
        <p>
            Learn more about Hyde, and try it out for yourself, at
            <a href="https://hydephp.github.io/">https://hydephp.github.io/</a>! 
        </p>
    </header>

    <main style="display: flex; justify-content: center; overflow-x: auto;">
        <section style="min-width: 800px; border: 1px solid lightgray;">
            <h2 style="text-align: center;">Daily GitHub clone activity per repository</h2>
            <div style="padding: 10px 20px;">
                <x-clones-chart :clones="$clonesHyde" />
                <hr style="max-width: 800px; margin-left: 0; margin-bottom: 40px; opacity: 0.5;">
                <x-clones-chart :clones="$clonesFramework" />
                <hr style="max-width: 800px; margin-left: 0; margin-bottom: 40px; opacity: 0.5;">
                <x-clones-chart :clones="$clonesHydeFront" />
            </div>
        </section>
    
        <section style="min-width: 800px; border: 1px solid lightgray;">
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