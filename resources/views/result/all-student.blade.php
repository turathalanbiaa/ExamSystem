<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Stylesheet -->
    <link href="{{asset('assets/styles/semantic.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/styles/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/styles/snackbar.css')}}" rel="stylesheet" type="text/css">

    <!-- Script -->
    <script src="{{asset("assets/scripts/jquery.min.js")}}"></script>
    <script src="{{asset("assets/scripts/semantic.js")}}"></script>

</head>
<body>


<div class="ui container">

    <div class="ui hidden divider"></div>

    <a href="/" class="ui large blue button"> الرئيسية</a>
    <?php
    $c = 0;
    ?>

    @if(count($students) > 0)
        @foreach($students as $student)

            <div class="ui Left aligned fluid  card">
                <div class="ui Left aligned content ">
                    {{$student->Name}}
                    <br>
                    {{$student->username}}
                    <br>
                    {{$student->Mark}}
                    <br>
                    {{$student->code}}
                    <br>
                    {{$student->ID}}


                </div>
            </div>
        @endforeach
    @else

    @endif


</div>

<div class="ui hidden divider"></div>

<script>

    $('.test.button').transition('horizontal flip', '0ms');
    $('.test.button').transition('horizontal flip', '1400ms');

</script>


</body>
</html>
