@extends("layout.layout")

@section("title")
    <title>انشاء الرقم الأمتحاني</title>
@endsection

@section("content")
    <div class="ui center aligned grid">
        <div class="eight wide column">
            <div class="lg-space"></div>
            <div class="lg-space"></div>

            @if(count($errors))
                <div class="ui error message" id="message">
                    <ul class="list">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form class="ui login large form" method="post" action="">
                <h3 class="ui center aligned dividing green header" style="color: #ffffff;">انشاء الرقم الامتحاني</h3>
                <div class="ui hidden divider"></div>

                {!! csrf_field() !!}
                <div class="field" style="text-align: right;">
                    <label for="name">اسم الطالب الثلاثي</label>
                    <input type="text"  name="name" id="name">
                </div>

                <div class="field" style="text-align: right;">
                    <label for="phone">رقم الهاتف او البريد الإلكتروني</label>
                    <input type="text"  name="phone" id="phone">
                </div>

                <button type="submit" class="ui submit orange button">حفظ</button>
            </form>

            <div class="lg-space"></div>
            <div class="lg-space"></div>
        </div>
    </div>
@endsection