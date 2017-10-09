<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @yield("title")

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Stylesheet -->
    <link href="{{asset('assets/styles/semantic.css')}}" rel="stylesheet" type="text/css">
    <link href="/assets/styles/style.css?version=3}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/styles/snackbar.css')}}" rel="stylesheet" type="text/css">

    <!-- Script -->
    <script src="{{asset("assets/scripts/jquery.min.js")}}"></script>
    <script src="{{asset("assets/scripts/semantic.js")}}"></script>

</head>
<body>
    <div class="ui container">
        @yield("content")
    </div>

    @yield("script")
</body>
</html>
