<tr>
    <td>{{$exam->Name}}</td>
    <td>{{$exam->Date}}</td>
    <td>

        @if($exam->FinishState == \App\Enums\FinishStatus::FINISH)
            <span>درجتك هي</span>
            <div class="ui large blue inverted label">{{$exam->Mark}}</div>
            <a href="/my-answer/{{$exam->ID}}" class="ui green big button " style="margin: 0;">عرض الاجوبة</a>
        @elseif($exam->ExamStatus == \App\Enums\ExamStatus::EXAM_CLOSED)
            <a class="ui grey disabled big  fluid button " style="margin: 0;">الامتحان مغلق</a>
        @elseif($exam->ExamStatus == \App\Enums\ExamStatus::EXAM_END && $exam->FinishState === null)
            <a class="ui big disabled fluid button " style="margin: 0;">لم تمتحن</a>
        @elseif($exam->ExamStatus == \App\Enums\ExamStatus::EXAM_END && $exam->FinishState !== null)
            <div class="ui fluid buttons">
                <a href="/result/{{$exam->ID}}" class="ui green big button " style="margin: 0;">عرض الدرجة</a>
                <a href="/my-answer/{{$exam->ID}}" class="ui green big button " style="margin: 0;">عرض الاجوبة</a>
            </div>
        @elseif($exam->ExamStatus == \App\Enums\ExamStatus::EXAM_OPEN && $exam->FinishState == \App\Enums\FinishStatus::NOT_FINISH)
            <a href="/exam/{{$exam->ID}}" class="ui green big  fluid button " style="margin: 0;">ابدأ الامتحان</a>
        @endif

    </td>
</tr>