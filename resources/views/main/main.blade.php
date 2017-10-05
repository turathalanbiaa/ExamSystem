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
            <div class="ui segment">
                <div class="md-space"></div>
                <h2 class="ui center aligned header">الجدول الامتحاني للمرحلة التمهيدية</h2>
                <div class="md-space"></div>
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