<?php $i = 1; ?>
@for($i=1;$i < 6;$i++)
    <div class="ui segment">
        <h3 class="ui right aligned header">
            <span>{{$i . '- '}}</span>
            <span>الايمان معرفة بالقلب وإقرار باللسان و</span>
        </h3>

        <div class="ui form">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="question_ID" value="{{$i}}" value="">

            <div class="grouped fields">
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="{{'answer-' . $i}}" checked value="{{'A'.$i}}"  tabindex="0" class="hidden">
                        <label>Apples</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="{{'answer-' . $i}}" value="{{'B'.$i}}" tabindex="0" class="hidden">
                        <label>Oranges</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="{{'answer-' . $i}}" value="{{'C'.$i}}" tabindex="0" class="hidden">
                        <label>Pears</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input type="radio" name="{{'answer-' . $i}}" value="{{'D'.$i}}" tabindex="0" class="hidden">
                        <label>Grapefruit</label>
                    </div>
                </div>
            </div>

            <div class="field" style="text-align: right;">
                <button type="submit" data-action="sendAnswer" class="ui green big button">ارسال</button>
                <button type="submit" data-action="leaveQuestion" class="ui red big button">ترك السؤال</button>
            </div>
        </div>
    </div>
@endfor