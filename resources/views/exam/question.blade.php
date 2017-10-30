<div class="ui segment">
    <h3 class="ui right aligned header">
        <span>{{$i . '- '}}</span>
        <span>{{$question->Title}}</span>
    </h3>

    <div id="question_form_{{$question->QuestionID}}" class="ui form">

        <div class="ui dimmer">
            <div class="ui active large loader"></div>
        </div>

        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="question_ID" value="{{$question->QuestionID}}">

        <div id="question_{{$question->QuestionID}}" class="grouped fields">

            <?php $options = json_decode($question->Options); ?>

                @foreach($options as $option)
                    @include('exam.option' , ["questionId" => $question->QuestionID , "option" => $option])
                @endforeach
        </div>

        <div class="field" style="text-align: right;">
            <button type="submit" data-action="sendAnswer" style="display: none" class="ui green big button">حفظ</button>
            <button type="submit" data-action="leaveQuestion" class="ui red big button">ترك</button>
        </div>

    </div>

</div>

<script>
    $("#question_form_{{$question->QuestionID}} input[type='radio']").click(function()
    {
        $("#question_form_{{$question->QuestionID}}").find('.green.button').click();
    })
</script>
