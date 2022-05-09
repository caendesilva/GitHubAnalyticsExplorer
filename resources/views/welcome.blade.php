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
            background-color: #ddd;
        }

        thead th {
          background-color: #333;
          color: white;
        }

        .clones-table {
            float: left;
            margin: 0 20px;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>

</head>
<body>
    <h1>HydePHP Statistics</h1>
{{-- 
    <section>
        <h2>Daily GitHub clone activity per repository</h2>
        <x-clones-chart :clones="$clonesHyde" />
        <hr style="max-width: 800px; margin-left: 0; margin-bottom: 40px; opacity: 0.5;">
        <x-clones-chart :clones="$clonesFramework" />
        <hr style="max-width: 800px; margin-left: 0; margin-bottom: 40px; opacity: 0.5;">
        <x-clones-chart :clones="$clonesHydeFront" />
    </section> --}}


    <section>
        <h2>Daily clones per repository</h2>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>hyde</th>
                    <th>framework</th>
                    <th>hydefront</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dateRange as $date)
                    <tr>
                        <th>{{ $date }}</th>
                        <td>
                            @php($event = \App\Models\Event::where([
                                'type' => 'traffic/clones',
                                'repository' => 'hydephp/hyde',
                                'bucket' => $date . 'T00:00:00Z',
                            ])->first())
                            @if ($event)
                            <span title="{{ $event->total }} total, {{ $event->unique }} unique">{{ $event->total }}</span>
                            @else
                            <span title="No data found for this date" style="cursor: help; opacity: 0.5;">&ndash;</span>
                            @endif
                        </td>
                        <td>
                            @php($event = \App\Models\Event::where([
                                'type' => 'traffic/clones',
                                'repository' => 'hydephp/framework',
                                'bucket' => $date . 'T00:00:00Z',
                            ])->first())
                            @if ($event)
                            <span title="{{ $event->total }} total, {{ $event->unique }} unique">{{ $event->total }}</span>
                            @else
                            <span title="No data found for this date" style="cursor: help; opacity: 0.5;">&ndash;</span>
                            @endif
                        </td>
                        <td>
                            @php($event = \App\Models\Event::where([
                                'type' => 'traffic/clones',
                                'repository' => 'hydephp/hydefront',
                                'bucket' => $date . 'T00:00:00Z',
                            ])->first())
                            @if ($event)
                            <span title="{{ $event->total }} total, {{ $event->unique }} unique">{{ $event->total }}</span>
                            @else
                            <span title="No data found for this date" style="cursor: help; opacity: 0.5;">&ndash;</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>

{{-- 
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
                        <td>{{ $clone->unique }}
					        <small title="About {{ number_format( $clone->unique / $clone->total * 100, 2 ) }}% of clones were from unique users"><small style="opacity: 0.75;">(</small>{{ number_format( $clone->unique / $clone->total * 100) }}<small>%<small><small style="opacity: 0.75;">)</small></small>
                        </td>
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
                        <td>{{ $clone->unique }}
					        <small title="About {{ number_format( $clone->unique / $clone->total * 100, 2 ) }}% of clones were from unique users"><small style="opacity: 0.75;">(</small>{{ number_format( $clone->unique / $clone->total * 100) }}<small>%<small><small style="opacity: 0.75;">)</small></small>
                        </td>
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
                        <td>{{ $clone->unique }}
					        <small title="About {{ number_format( $clone->unique / $clone->total * 100, 2 ) }}% of clones were from unique users"><small style="opacity: 0.75;">(</small>{{ number_format( $clone->unique / $clone->total * 100) }}<small>%<small><small style="opacity: 0.75;">)</small></small>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section> --}}
</body>
</html>