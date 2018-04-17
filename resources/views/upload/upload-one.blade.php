@extends("layout.layout")

@section("title")
    <title>صح او خظأ</title>
@endsection

@section("content")
    <div class="ui one column grid">

        @if(count($errors))
            <div class="column">
                <div class="ui error message" id="message">
                    <div class="ui center aligned header">
                        @foreach($errors->all() as $error)
                            <span>{{ $error }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        @if(session("Message"))
            <div class="column">
                <div class="ui success fadeIn animated message">
                    <h2 style="text-align: center;">{{session("Message")}}</h2>
                </div>
            </div>
        @endif

        <div class="column">
            <div class="ui segment">
                <div class="ui green dividing header">اضافة سؤال جديد</div>
                <div class="ui hidden divider"></div>
                <div class="ui hidden divider"></div>

                <form class="ui big form" method="post" action="/emad/upload-one">
                    {!! csrf_field() !!}
                    <div class="field">
                        <label for="question">السؤال</label>
                        <textarea name="question" id="question" rows="5"></textarea>
                    </div>

                    <div class="grouped fields">
                        <label for="correctAnswer">أختر الجواب الصحيح</label>
                        <div class="field">
                            <div class="ui radio checkbox">
                                <input type="radio" name="correctAnswer" value="صح" tabindex="0" class="hidden">
                                <label>صح</label>
                            </div>
                        </div>

                        <div class="field">
                            <div class="ui radio checkbox">
                                <input type="radio" name="correctAnswer" value="خطأ" tabindex="0" class="hidden">
                                <label>خطأ</label>
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <button type="submit" class="ui teal button">ارسال</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section("script")
    <script>
        $('.ui.checkbox').checkbox();
    </script>
@endsection