<tr>
    <td>{{$exam->Name}}</td>
    <td>{{$exam->Date}}</td>
    <td>

        @if($exam->FinishState == \App\Enums\FinishStatus::FINISH)
            درجتك هي <div class="ui large blue inverted label">{{$exam->Mark}}</div>
        @elseif($exam->ExamStatus == \App\Enums\ExamStatus::EXAM_CLOSED)
            <a class="ui grey disabled big  fluid button " style="margin: 0;">ابدأ الامتحان</a>
        @elseif($exam->ExamStatus == \App\Enums\ExamStatus::EXAM_END && $exam->FinishState == \App\Enums\FinishStatus::NOT_FINISH)
            <a href="/mark/{{$exam->ID}}" class="ui green big  fluid button " style="margin: 0;">عرض الدرجة</a>
        @elseif($exam->ExamStatus == \App\Enums\ExamStatus::EXAM_OPEN && $exam->FinishState == \App\Enums\FinishStatus::NOT_FINISH)
            <a href="/enroll/{{$exam->ID}}" class="ui green big  fluid button " style="margin: 0;">ابدأ الامتحان</a>
        @endif

    </td>
</tr>