<div class="field">
    <?php $randomNumber = rand(1,999999); ?>
    <div>
        <input class="radio-button" type="radio" name="{{'answer-' . $questionId}}" id="{{'answer-' . $questionId . '-' . $randomNumber}}"
               {{strcmp($question->UserAnswer , $option) == 0 ? "checked" : ""}}
               value="{{$option}}"  tabindex="0">
        <label for="{{'answer-' . $questionId . '-' . $randomNumber}}" class="radio-button-label">{{$option}}</label>
    </div>
</div>
