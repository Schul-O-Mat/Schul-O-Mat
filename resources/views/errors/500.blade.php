<!DOCTYPE html>
<html>
<head>
    <title>404 - Nicht gefunden</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            color: #000;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 72px;
            margin-bottom: 40px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="title">Interner Fehler - <span style="color: #2196f3">500</span></div>
    @unless(empty($sentryID))
        <!-- Sentry JS SDK 2.1.+ required -->
            <script src="https://cdn.ravenjs.com/3.3.0/raven.min.js"></script>

            <script>
                Raven.showReportDialog({
                    eventId: '{{ $sentryID }}',

                    // use the public DSN (dont include your secret!)
                    dsn: 'https://c9dd52c3abc0470f97ff6de7f3ea4890@sentry.io/186497'
                });
            </script>
        @endunless
    </div>
</div>
</body>
</html>
