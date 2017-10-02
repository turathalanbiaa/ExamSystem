@extends("layout.layout")

@section("title")
    <title>الدخول الى الامتحان</title>
@endsection

@section("content")
    <div class="ui center aligned grid">
        <div class="eight wide column">
            <div class="lg-space"></div>
            <div class="lg-space"></div>

            <form class="ui login large form" method="post" action="">
                <h3 class="ui center aligned dividing green header" style="color: #ffffff;">تسجيل الدخول</h3>
                <div class="ui hidden divider"></div>

                {!! csrf_field() !!}
                <div class="field" style="text-align: right;">
                    <label for="code">الرقم الامتحاني</label>
                    <input type="text"  name="code" id="code">
                </div>


                <button type="submit" class="ui submit orange button">دخول</button>
            </form>

            <div class="lg-space"></div>
            <div class="lg-space"></div>
        </div>
    </div>
@endsection