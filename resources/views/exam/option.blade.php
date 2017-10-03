<div class="field">
    <div class="ui radio checkbox">
        <input type="radio" name="{{'answer-' . $questionId}}"
               {{strcmp($question->UserAnswer , $option) == 0 ? "checked" : ""}}
               value="{{$option}}"  tabindex="0" class="hidden">
        <label>{{$option}}</label>
    </div>
</div>
