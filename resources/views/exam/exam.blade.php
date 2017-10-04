@extends("layout.layout")

@section("title")
    <title>اسم الامتحان</title>
@endsection

@section("content")
    <div class="ui center aligned one column grid">
        <div class="column">
            <div class="ui segment">
                <h2 class="ui right aligned  header"><span>امتحان درس</span><span>$exam->Name</span></h2>
                <div class="sm-space"></div>
            </div>
        </div>

        <div class="column">
            <h2 class="ui top attached center aligned black inverted header">إختر الاجابة الصحيحة ( أجب عن 25 فرع فقط ).</h2>
            <div class="ui attached segment">

                @include("exam.questions")

                <a href="/finish/$exam->ID" class="ui big green button">انهاء الامتحان</a>
            </div>

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