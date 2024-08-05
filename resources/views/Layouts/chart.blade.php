<!DOCTYPE html>
<html>
<head>
    <title>Tamu Bulanan Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div style="width: 100%;">
        {!! $chart->container() !!}
    </div>

    {!! $chart->script() !!}
</body>
</html>
