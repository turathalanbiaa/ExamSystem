@extends("layout.layout")

@section("title")
    <title>اسم الامتحان</title>
@endsection

@section("content")
    <style>
        .ui.radio.checkbox label
        {
            padding-right: 1.85714em;
            padding-left: 0;
        }

        .ui.radio.checkbox label:before,
        .ui.radio.checkbox label:after
        {
            right: 0;
        }

        .grouped.fields
        {
            text-align: right;
            margin-right: 25px !important;
            padding-bottom: 10px !important;
        }

        .ui.attached.segment>.ui.segment {
            margin-bottom: 25px;
        }
    </style>
    <div class="ui center aligned one column grid">
        <div class="column">
            <div class="ui segment">
                <h2 class="ui right aligned  header"><span>امتحان درس</span><span>اسم الامتحان</span></h2>
                <div class="sm-space"></div>
            </div>
        </div>

        <div class="column">
            <h2 class="ui top attached center aligned black inverted header">إختر الاجابة الصحيحة ( أجب عن 12 فرع فقط ).</h2>
            <div class="ui attached segment">

                <div class="ui segment">
                    <?php $i = 1; ?>
                    <h3 class="ui right aligned header">
                        <span>{{$i++ . '- '}}</span>
                        <span>الايمان معرفة بالقلب وإقرار باللسان و</span>
                    </h3>

                    <form class="ui form" method="post" action="/ajax">
                        {!! csrf_field() !!}
                        <input type="hidden" name="question_ID" value="">

                        <div class="grouped fields">
                            <div class="field">
                                <div class="ui radio checkbox">
                                    <input type="radio" name="answer" tabindex="0" class="hidden">
                                    <label>Apples</label>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui radio checkbox">
                                    <input type="radio" name="answer" tabindex="0" class="hidden">
                                    <label>Oranges</label>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui radio checkbox">
                                    <input type="radio" name="answer" tabindex="0" class="hidden">
                                    <label>Pears</label>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui radio checkbox">
                                    <input type="radio" name="answer" tabindex="0" class="hidden">
                                    <label>Grapefruit</label>
                                </div>
                            </div>
                        </div>

                        <div class="field" style="text-align: right;">
                            <button type="submit" name="sendAnswer" class="ui green big button">ارسال</button>
                            <button type="submit" name="delete" class="ui red big button">ترك السؤال</button>
                        </div>
                    </form>
                </div>

                <div class="ui segment">
                    <?php $i = 1; ?>
                    <h3 class="ui right aligned header">
                        <span>{{$i++ . '- '}}</span>
                        <span>الايمان معرفة بالقلب وإقرار باللسان و</span>
                    </h3>

                    <form class="ui form" method="post" action="/ajax">
                        {!! csrf_field() !!}
                        <input type="hidden" name="question_ID" value="">

                        <div class="grouped fields">
                            <div class="field">
                                <div class="ui radio checkbox">
                                    <input type="radio" name="answer" tabindex="0" class="hidden">
                                    <label>Apples</label>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui radio checkbox">
                                    <input type="radio" name="answer" tabindex="0" class="hidden">
                                    <label>Oranges</label>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui radio checkbox">
                                    <input type="radio" name="answer" tabindex="0" class="hidden">
                                    <label>Pears</label>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui radio checkbox">
                                    <input type="radio" name="answer" tabindex="0" class="hidden">
                                    <label>Grapefruit</label>
                                </div>
                            </div>
                        </div>

                        <div class="field" style="text-align: right;">
                            <button type="submit" name="sendAnswer" class="ui green big button">ارسال</button>
                            <button type="submit" name="delete" class="ui red big button">ترك السؤال</button>
                        </div>
                    </form>
                </div>

                <div class="ui segment">
                    <?php $i = 1; ?>
                    <h3 class="ui right aligned header">
                        <span>{{$i++ . '- '}}</span>
                        <span>الايمان معرفة بالقلب وإقرار باللسان و</span>
                    </h3>

                    <form class="ui form" method="post" action="/ajax">
                        {!! csrf_field() !!}
                        <input type="hidden" name="question_ID" value="">

                        <div class="grouped fields">
                            <div class="field">
                                <div class="ui radio checkbox">
                                    <input type="radio" name="answer" tabindex="0" class="hidden">
                                    <label>Apples</label>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui radio checkbox">
                                    <input type="radio" name="answer" tabindex="0" class="hidden">
                                    <label>Oranges</label>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui radio checkbox">
                                    <input type="radio" name="answer" tabindex="0" class="hidden">
                                    <label>Pears</label>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui radio checkbox">
                                    <input type="radio" name="answer" tabindex="0" class="hidden">
                                    <label>Grapefruit</label>
                                </div>
                            </div>
                        </div>

                        <div class="field" style="text-align: right;">
                            <button type="submit" name="sendAnswer" class="ui green big button">ارسال</button>
                            <button type="submit" name="delete" class="ui red big button">ترك السؤال</button>
                        </div>
                    </form>
                </div>

                <div class="ui segment">
                    <?php $i = 1; ?>
                    <h3 class="ui right aligned header">
                        <span>{{$i++ . '- '}}</span>
                        <span>الايمان معرفة بالقلب وإقرار باللسان و</span>
                    </h3>

                    <form class="ui form" method="post" action="/ajax">
                        {!! csrf_field() !!}
                        <input type="hidden" name="question_ID" value="">

                        <div class="grouped fields">
                            <div class="field">
                                <div class="ui radio checkbox">
                                    <input type="radio" name="answer" tabindex="0" class="hidden">
                                    <label>Apples</label>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui radio checkbox">
                                    <input type="radio" name="answer" tabindex="0" class="hidden">
                                    <label>Oranges</label>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui radio checkbox">
                                    <input type="radio" name="answer" tabindex="0" class="hidden">
                                    <label>Pears</label>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui radio checkbox">
                                    <input type="radio" name="answer" tabindex="0" class="hidden">
                                    <label>Grapefruit</label>
                                </div>
                            </div>
                        </div>

                        <div class="field" style="text-align: right;">
                            <button type="submit" name="sendAnswer" class="ui green big button">ارسال</button>
                            <button type="submit" name="delete" class="ui red big button">ترك السؤال</button>
                        </div>
                    </form>
                </div>

                <div class="ui segment">
                    <?php $i = 1; ?>
                    <h3 class="ui right aligned header">
                        <span>{{$i++ . '- '}}</span>
                        <span>الايمان معرفة بالقلب وإقرار باللسان و</span>
                    </h3>

                    <form class="ui form" method="post" action="/ajax">
                        {!! csrf_field() !!}
                        <input type="hidden" name="question_ID" value="">

                        <div class="grouped fields">
                            <div class="field">
                                <div class="ui radio checkbox">
                                    <input type="radio" name="answer" tabindex="0" class="hidden">
                                    <label>Apples</label>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui radio checkbox">
                                    <input type="radio" name="answer" tabindex="0" class="hidden">
                                    <label>Oranges</label>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui radio checkbox">
                                    <input type="radio" name="answer" tabindex="0" class="hidden">
                                    <label>Pears</label>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui radio checkbox">
                                    <input type="radio" name="answer" tabindex="0" class="hidden">
                                    <label>Grapefruit</label>
                                </div>
                            </div>
                        </div>

                        <div class="field" style="text-align: right;">
                            <button type="submit" name="sendAnswer" class="ui green big button">ارسال</button>
                            <button type="submit" name="delete" class="ui red big button">ترك السؤال</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

@section("script")
    <script>
        $('.ui.radio.checkbox').checkbox();
    </script>
@endsection