<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="//d3js.org/d3.v3.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/cal-heatmap/3.3.10/cal-heatmap.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/cal-heatmap/3.3.10/cal-heatmap.css" />
    <title>草生やしたーい</title>
</head>
<body>
    <div id="cal-heatmap"></div>
<script type="text/javascript">
    var cal = new CalHeatMap();

    cal.init({
        itemSelector: "#cal-heatmap",
        domain: "day",
        range: 12,
        data: "datas-years.json",
        start: new Date(),
        legend: [1, 3, 5, 7, 10],
    });
</script>
</body>
</html>
