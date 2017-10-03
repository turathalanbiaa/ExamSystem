<div class="ui segment">
    <h3 class="ui right aligned header">
        <span>{{$i . '- '}}</span>
        <span>{{$question->Title}}</span>
    </h3>

    <div class="ui form">

        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="question_ID" value="{{$question->ID}}">

        <div id="question_{{$question->ID}}" class="grouped fields">

            <?php $options = json_decode($question->Options) ?>

                @foreach($options as $option)
                    @include('exam.option' , ["question" => $question , "option" => $option])
                @endforeach

        </div>

        <div class="field" style="text-align: right;">
            <button type="submit" data-action="sendAnswer" class="ui green big button">ارسال</button>
            <button type="submit" data-action="leaveQuestion" class="ui red big button">ترك السؤال</button>
        </div>

    </div>

</div>
