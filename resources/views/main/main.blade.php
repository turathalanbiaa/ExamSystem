@extends("layout.layout")

@section("title")
    <title>الرقم الأمتحاني</title>
@endsection

@section("content")
    <div class="ui center aligned grid">
        <div class="sixteen wide column">
            <div class="ui card">
                <div class="image">
                    <img src="{{asset('assets/images/Courses.jpg')}}">
                </div>
                <div class="content">
                    <a class="header">Kristy</a>
                    <div class="meta">
                        <span class="date">Joined in 2013</span>
                    </div>
                    <div class="description">
                        Kristy is an art director living in New York.
                    </div>
                </div>
                <div class="extra content">
                    <a>
                        <i class="user icon"></i>
                        22 Friends
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection