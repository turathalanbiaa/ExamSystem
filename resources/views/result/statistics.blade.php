@extends('result.CPmaster')
@section('result')

    <div class="ui inverted vertical masthead center aligned segment">
        <h2> احصائيات امتحان : {{$exam->Name}}</h2>
        <br>
        <div class="ui text container">


            <a href="/aa8363d57c99e7f220c94dea8192dd8c/all-examed-student/?examID={{$exam->ID}}&type=0"
               class="ui center aligned inverted test button header" style="padding: 20px; width: 90%">
                <h3>
                    الطلبة المسجلين = {{Count($enrolled_students)}}
                </h3>
            </a>
            <br>
            <a href="/aa8363d57c99e7f220c94dea8192dd8c/all-examed-student/?examID={{$exam->ID}}&type=1"
               class="ui center aligned inverted test button header" style="padding: 20px; width: 90%">
                <h3>
                    الطلبة الممتحنين = {{Count($examed_students)}}
                </h3>
            </a>
            <br>
            <a href="/aa8363d57c99e7f220c94dea8192dd8c/all-examed-student/?examID={{$exam->ID}}&type=2"
               class="ui center aligned inverted test button header" style="padding: 20px; width: 90%">
                <h3>
                    الطلبة الناجحين = {{Count($seccessed_students)}}
                </h3>
            </a>
            <br>
        </div>
        <br>

    </div>

@stop

