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

    @if(count($answers) > 0)
        @foreach($answers as $answer)

            <div class="ui Left aligned fluid  card">
                <div class="ui Left aligned content ">


                    <div class="ui grid ">
                        <div class="four wide column" style="color : #0617bd"> س {{$c= $c+1}} </div>
                        <div class="twelve wide column">{{$answer->Title}}</div>

                    </div>
                    <div class="ui divider"></div>
                    <p></p>

                    <div class="ui grid ">
                        <div class="four wide column" style="color : #0617bd">اختيارك كان</div>
                        <div class="twelve wide column">{{$answer->UserAnswer}}</div>

                    </div>
                    <div class="ui divider"></div>
                    <p></p>
                    <div class="ui grid ">
                        <div class="four wide column" style="color : #0617bd">الاختيار الصحيح هو :</div>
                        <div class="twelve wide column">{{$answer->CorrectAnswer}}</div>

                    </div>

                    <div class="ui divider"></div>
                    <p></p>

                    <div class="ui grid ">
                        <div class="four wide column" style="color : #0617bd">نتيجتك النهائية</div>
                        <div class="twelve wide column">
                            @if($answer->UserAnswer == $answer->CorrectAnswer)
                                <div class="description" style="color : #00b724">مطابقة</div>
                                <i class="large green checkmark icon"></i>
                            @else
                                <div class="description" style="color : #b70006">غير مطابقة</div>
                                <i class="large red icon close"></i>
                            @endif
                        </div>

                    </div>


                </div>
            </div>
        @endforeach
    @else
        <div class="ui segment">
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
