<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
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
<input type="text" name="GeoDezRight_TXT" size="20" tabindex="6" style="text-align: center"><br>
<input type="text" name="GeoDezHeight_TXT" size="20" tabindex="7" style="text-align: center"><br>
</body>
</html>