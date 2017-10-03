@extends("layout.layout")

@section("title")
    <title>اسم الامتحان</title>
@endsection

@section("content")
    <div class="ui center aligned one column grid">
        <div class="column">
            <div class="ui segment">
                <h2 class="ui right aligned  header"><span>امتحان درس</span><span>$exam->Name</span></h2>
                <div class="sm-space"></div>
            </div>
        </div>

        <div class="column">
            <h2 class="ui top attached center aligned black inverted header">إختر الاجابة الصحيحة ( أجب عن 12 فرع فقط ).</h2>
            <div class="ui attached segment">
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
                                        <input type="radio" name="answer" value="{{'A'.$i}}" tabindex="0" class="hidden">
                                        <label>Apples</label>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui radio checkbox">
                                        <input type="radio" name="answer" value="{{'B'.$i}}" tabindex="0" class="hidden">
                                        <label>Oranges</label>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui radio checkbox">
                                        <input type="radio" name="answer" value="{{'C'.$i}}" tabindex="0" class="hidden">
                                        <label>Pears</label>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui radio checkbox">
                                        <input type="radio" name="answer" value="{{'D'.$i}}" tabindex="0" class="hidden">
                                        <label>Grapefruit</label>
                                    </div>
                                </div>
                            </div>

                            <div class="field" style="text-align: right;">
                                <button type="submit" data-action="sendAnswer" class="ui green big button">ارسال</button>
                                <button type="submit" data-action="leaveQuestion" class="ui red big button">ترك السؤال</button>
                            </div>

                            <div id="ajaxResponse">

                            </div>
                        </div>
                    </div>
                @endfor
            </div>

        </div>
    </div>
@endsection

@section("script")
    <script>
        $('.ui.radio.checkbox').checkbox();
        $('.ui.form')
            .form({
                fields: {
                    answer: {
                        rules: [
                            {
                                type   : 'checked',
                                prompt : 'You must agree to the terms and conditions'
                            }
                        ]
                    }
                }
            });

        $("button[data-action='sendAnswer']").click(function ()
        {
            var questionId = $(this).parent().parent().find('input[name=question_ID]:hidden').val();
            var answer = $(this).parent().parent().find('input[name=answer]:checked').val();
            var _token = $(this).parent().parent().find('input[name=_token]:hidden').val();

            $.ajax({
                type: "POST",
                url: '/sendAnswer',
                data: {questionId: questionId, answer: answer, _token:_token},
                success: function( msg ) {
                    $("#ajaxResponse").append("<div class='ui message'> <span> + msg + </span></div>");
                }
            });
        });

        $("button[data-action='leaveQuestion']").click(function ()
        {
            var questionId = $(this).parent().parent().find('input[name=question_ID]:hidden').val();
            var _token = $(this).parent().parent().find('input[name=_token]:hidden').val();

            $.ajax({
                type: "POST",
                url: '/leaveQuestion',
                data: {questionId: questionId, _token:_token},
                success: function( msg ) {
                    $("#ajaxResponse").append("<div class='ui message'> <span> + msg + </span></div>");
                }
            });
        });
    </script>
@endsection