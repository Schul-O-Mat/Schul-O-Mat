<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <script>
        var GKRight = parseInt({{$rechtswert}});
        var GKHeight = parseInt({{$hochwert}});
    </script>
    <script src="/js/gk_to_latlong.js"></script>
    <script>
        CalcStart_onclick()
    </script>
</head>
<body>
<form name="CalcForm">
    <input type="text" id="GeoDezRight" size="20" tabindex="6" style="text-align: center"><br>
    <input type="text" id="GeoDezHeight" size="20" tabindex="7" style="text-align: center"><br>
</form>
</body>
</html>