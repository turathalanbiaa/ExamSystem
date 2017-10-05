<?php $i = 0; ?>

<div class="column">
    <h2 class="ui top attached center aligned black inverted header">        صح او خطأ - اجب على {{$exam->CategoryOne}} سؤال</h2>
    <div class="ui attached segment">

        @foreach($trueOrFalseQuestions as $question)
            @include('exam.question' , ["question" => $question , "i" => ++$i])
        @endforeach

    </div>

</div>

<div class="ui hidden divider"></div>
<div class="ui divider" style="width: 100%;"></div>
<div class="ui hidden divider"></div>

<div class="column">
    <h2 class="ui top attached center aligned black inverted header">اختيارات - اجب على {{$exam->CategoryTwo}} سؤال</h2>
    <div class="ui attached segment">

        @foreach($optionsQuestions as $question)
            @include('exam.question' , ["question" => $question , "i" => ++$i])
        @endforeach

    </div>

</div>
