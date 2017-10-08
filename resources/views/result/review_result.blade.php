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

        @if(count($answers) > 0)
            @foreach($answers as $answer)

                <div class="ui right aligned fluid  card">
                    <div class="content ">

                        <div class="meta" style="color : #BD081C">السؤال</div>
                        <div class="description" style="color : #111111">{{$answer->Title}}</div>
                        <p></p>


                        <div class="meta" style="color : #BD081C">الجواب الصحيح</div>
                        <div class="description" style="color : #111111">{{$answer->CorrectAnswer}}</div>

                        <p></p>
                        <div class="meta" style="color : #BD081C">اجابتك كانت</div>
                        <div class="description" style="color : #111111">{{$answer->UserAnswer}}</div>


                    </div>
                </div>
            @endforeach
        @else
            <div class="ui segment" >
                <div class="ui warning message">
                    <div class="ui large header">لا توجد اي اجابة</div>
                </div>
            </div>
        @endif

        <a href="/" class="ui large blue button">الرئيسية</a>

    </div>

    <div class="ui hidden divider"></div>

<script>

    $('.test.button').transition('horizontal flip', '0ms');
    $('.test.button').transition('horizontal flip', '1400ms');

</script>


</body>
</html>
