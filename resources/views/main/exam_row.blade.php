<tr>
    <td>{{$exam->Name}}</td>
    <td>{{$exam->Date}}</td>
    <td>
        @if($exam->ExamStatus == \App\Enums\ExamStatus::EXAM_CLOSED)
            <button class="ui grey disabled fluid button" style="margin: 0;">الامتحان مغلق</button>
        @elseif($exam->ExamStatus == \App\Enums\ExamStatus::EXAM_OPEN)
            @if($exam->FinishState === null)
                <a href="/exam/{{$exam->ID}}" class="ui green big  fluid button " style="margin: 0;">ابدأ الامتحان</a>
            @elseif($exam->FinishState == \App\Enums\FinishStatus::NOT_FINISH)
                <a href="/exam/{{$exam->ID}}" class="ui green big  fluid button " style="margin: 0;">اكمل الامتحان</a>
            @else
                <span>درجتك هي</span>
                <div class="ui large blue inverted label">{{$exam->Mark}}</div>
                <span>يمكنك مشاهدة الاجوبة بعد انتهاء الامتحان</span>
            @endif
        @else
            @if($exam->FinishState === null)
                <button class="ui grey disabled fluid button" style="margin: 0;">لم تمتحن</button>
            @elseif($exam->FinishState == \App\Enums\FinishStatus::NOT_FINISH)
                <a href="/finish/{{$exam->ID}}" class="ui green big button " style="margin: 0;">حساب الدرجة</a>
                <a href="/my-answer/{{$exam->ID}}" class="ui green big button " style="margin: 0;">عرض الاجوبة</a>
            @else
                <span>درجتك هي</span>
                <div class="ui large blue inverted label">{{$exam->Mark}}</div>
                <a href="/my-answer/{{$exam->ID}}" class="ui green big button " style="margin: 0;">عرض الاجوبة</a>
            @endif
        @endif
    </td>
</tr>