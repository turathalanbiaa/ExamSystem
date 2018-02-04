<?php $i = 0; ?>

{{--<div class="column">--}}
    {{--<h2 class="ui top attached center aligned black inverted header">س١/ صح او خطأ - اجب على {{$exam->CategoryOne}} فرع</h2>--}}
    {{--<div class="ui attached segment">--}}

        {{--@foreach($trueOrFalseQuestions as $question)--}}
            {{--@include('exam.question' , ["question" => $question , "i" => ++$i])--}}
        {{--@endforeach--}}

    {{--</div>--}}

{{--</div>--}}

<div class="ui hidden divider"></div>
<div class="ui divider" style="width: 100%;"></div>
<div class="ui hidden divider"></div>

<?php $i = 0; ?>

<div class="column">
    <h2 class="ui top attached center aligned black inverted header"> اجب على {{$exam->CategoryTwo}} فرع</h2>
    <div class="ui attached segment">
        @foreach($trueOrFalseQuestions as $question)
            @include('exam.question' , ["question" => $question , "i" => ++$i])
        @endforeach
        @foreach($optionsQuestions as $question)
            @include('exam.question' , ["question" => $question , "i" => ++$i])
        @endforeach

    </div>

</div>
