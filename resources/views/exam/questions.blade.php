<?php $i = 0; ?>
@foreach($questions as $question)
    @include('exam.question' , ["question" => $question , "i" => ++$i])
@endforeach