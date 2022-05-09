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
</head>
<body>
    <h1>
        HydePHP Raw Data
    </h1>
    <menu role="toolbar">
        <li>
            <a href="/table.json">View JSON</a>
        </li>
        <li>
            <a href="/table.json" download>Download JSON</a>
        </li>
    </menu>
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