<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HydePHP Raw Data</title>
	<style>
        table,
        td,
        th {
            border: 1px solid black;
            padding: 4px 8px;
            font-family: monospace;
        }
		th {
            text-transform: uppercase;
		}
        table {
            border-collapse: collapse;
        }
        h1 > small {
            font-size: 16px;
        }
        menu {
            display: flex;
            list-style: none;
            padding: 0;
            font-size: 16px;
        }
        menu li {
            margin-right: 12px;
        }
    </style>
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
</head>
<body>
    <header>
        <h1>
            HydePHP Raw Data
        </h1>
        <menu role="toolbar">
            <li>
                <a href="table.json">View JSON</a>
            </li>
            <li>
                <a href="table.json" download>Download JSON</a>
            </li>
        </menu>
    </header>
    <nav>
        <ul>
            <li><a href="./">Start Page</a></li>
            <li><a aria-current="page" class="active" href="table">Database Viewer</a></li>
            <li><a href="https://hydephp.github.io/">Back to Hyde
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAMCAYAAABWdVznAAAAV0lEQVR4Xq2QwQ2AAAwC3cmd2Kk7sRP64CEJ9qOX8OPatMc/QKppnEPhTmJh23CLiwAqIw21CybKQ28qQi37WGFYBJcwfJQpP8LlEHKyZMF0IdmF13zlAjZ/6H4wb+mUAAAAAElFTkSuQmCC"
                alt="External link"></a></li>
        </ul>
    </nav>
	<table>
        <thead>
            <tr>
                @foreach (array_keys($events[0]) as $head)
                <th>
                    {{ $head }}
                </th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
            <tr>
                @foreach ($event as $key => $value)
				<td>
					{{ $value }}
				</td>
				@endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>