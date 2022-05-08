<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HydePHP Statistics</title>
    <style>
        table {
          border-collapse: collapse;
          font-family: sans-serif;
        }
        
        th, td {
          text-align: left;
          padding: 8px 16px;
        }
        
        tr {
            border: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background-color: rgb(248, 248, 248);
        }
        
        th {
          background-color: #333;
          color: white;
        }

        .clones-table {
            float: left;
            margin: 0 20px;
        }
    </style>
</head>
<body>
    <h1>HydePHP Statistics</h1>

    <section>
        <h2>Total GitHub Clones per day</h2>
        <table class="clones-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Repository</th>
                    <th>Total Clones</th>
                    <th>Unique Cloners</th>
                </tr>
            </thead>
            <tbody>
                @foreach (\App\Models\Event::where('type', 'traffic/clones')->where('repository', 'hydephp/hyde')->get()->sortByDesc('bucket') as $clone)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($clone->bucket)->format('Y-m-d') }}</td>
                        <td>{{ $clone->repository }}</td>
                        <td>{{ $clone->total }}</td>
                        <td>{{ $clone->unique }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <table class="clones-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Repository</th>
                    <th>Total Clones</th>
                    <th>Unique Cloners</th>
                </tr>
            </thead>
            <tbody>
                @foreach (\App\Models\Event::where('type', 'traffic/clones')->where('repository', 'hydephp/framework')->get()->sortByDesc('bucket') as $clone)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($clone->bucket)->format('Y-m-d') }}</td>
                        <td>{{ $clone->repository }}</td>
                        <td>{{ $clone->total }}</td>
                        <td>{{ $clone->unique }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <table class="clones-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Repository</th>
                    <th>Total Clones</th>
                    <th>Unique Cloners</th>
                </tr>
            </thead>
            <tbody>
                @foreach (\App\Models\Event::where('type', 'traffic/clones')->where('repository', 'hydephp/hydefront')->get()->sortByDesc('bucket') as $clone)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($clone->bucket)->format('Y-m-d') }}</td>
                        <td>{{ $clone->repository }}</td>
                        <td>{{ $clone->total }}</td>
                        <td>{{ $clone->unique }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</body>
</html>