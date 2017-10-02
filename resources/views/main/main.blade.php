@extends("layout.layout")

@section("title")
    <title>الرقم الأمتحاني</title>
@endsection

@section("content")
    <style>

    </style>
    <div class="ui center aligned one column grid">
        <div class="column">
            <div class="ui segment">
                <div class="md-space"></div>
                <h2 class="ui center aligned header">الجدول الامتحاني للمرحلة التمهيدية</h2>
                <div class="md-space"></div>
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
                <tr>
                    <td>امتحان الفقه</td>
                    <td>20-10-2017</td>
                    <td>
                        <form class="ui form" method="post" action="">
                            {!! csrf_field() !!}
                            <input type="hidden" name="exam_ID" value="">
                            <button type="submit" class="ui fluid green big button" style="margin: 0;">ابدأ الامتحان</button>
                        </form>

                        <div class="ui fluid center aligned big label">
                            <span>درجة الامتحان : </span>
                            <span>{{' 39 '.' من '.' 100 '}}</span>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection