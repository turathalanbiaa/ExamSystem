@extends("layout.layout")

@section("title")
    <title>اسم الامتحان</title>
@endsection

@section("content")
    <div class="ui center aligned one column grid">
        <div class="column">
            <div class="ui hidden divider"></div>

            <div class="ui segment">
                <div class="ui hidden divider"></div>
                <div>
                    <h2 class="ui center aligned header"><span>امتحان درس</span><span>{{$exam->Name}}</span></h2>
                    <a href="/" class="ui large blue button">رجوع</a>
                </div>
                <div class="ui hidden divider"></div>
            </div>
        </div>

        @include("exam.questions")

        <div class="column">
            <a href="/result/{{$exam->ID}}" class="ui big green button">انهاء الامتحان</a>
            <div class="md-space"></div>
        </div>

    </div>

    <div id="my-custom-snackbar"></div>
@endsection

@section("script")
    <script>
        $('.ui.radio.checkbox').checkbox();
    </script>
    <script src="{{asset("assets/scripts/snackbar.js")}}"></script>
    <script src="{{asset("assets/scripts/sendAnswer.js")}}"></script>
    <script src="{{asset("assets/scripts/leaveQuestion.js")}}"></script>
@endsection