@extends("layout.layout")

@section("title")
    <title>الرقم الأمتحاني</title>
@endsection

@section("content")
    <style>

    </style>


    <div class="ui center aligned one column grid">

        <div class="ui hidden divider"></div>

        <div class="column">
            <div class="ui right aligned segment">
                <div class="ui right aligned list" style="font-size: 16px;">
                    <div class="item">الامتحان يبدأ في الساعة العاشرة صباحاً.</div>
                    <div class="item">مدة الامتحان ساعتان تبدأ من حين فتح الرابط الامتحاني.</div>
                    <div class="item">يرجى الاحتفاظ بالرقم الامتحاني الذي سيظهر لك عند التسجيل للامتحانات.</div>
                    <div class="item">يغلق الامتحان في اليوم التالي عند الساعة العشرة صباحاً.</div>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="ui fluid inverted yellow segment">
                <a href="/logout" class="ui medium blue left floated button">تسجيل الخروج</a>
                <div style="margin-top: 3px;" class="ui right aligned large header">الرقم الامتحاني هو : {{$user->Code}}</div>
            </div>
        </div>

        <div class="column">
            <div class="ui fluid inverted red segment">
                <div style="margin-top: 3px;" class="ui right aligned large header">يجب عليك حفظ الرقم الامتحاني</div>
            </div>
        </div>

        <div class="column">
            <table class="ui right aligned large celled table">
                <thead>
                <tr>
                    <th>اسم الامتحان</th>
                    <th>تاريخ الامتحان</th>
                    <th>الحالة</th>
                </tr>
                </thead>
                <tbody>

                @foreach($exams as $exam)

                    @include("main.exam_row" , ["exam" => $exam])

                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection