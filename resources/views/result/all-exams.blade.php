@extends('result.CPmaster')
@section('result')

    <div class="ui inverted vertical masthead center aligned segment">
        <h2> الامتحانات </h2>
        <br>
        <br>

        @foreach($exams as $exam)
            <div class="ui text container">


                <a href="/aa8363d57c99e7f220c94dea8192dd8c/statistics/{{$exam->ID}}"
                   class="ui center aligned inverted test button header" style="padding: 10px; width: 80%">
                    <h4>
                        {{$exam->Name}}
                        |
                        {{$exam->Date}}
                    </h4>


                </a>

                @if($exam->Status == 0)
                    <a href="/aa8363d57c99e7f220c94dea8192dd8c/status?examID={{$exam->ID}}&status=1"
                       class="ui red center aligned  k button " style="padding: 10px;margin-left: 5px">مغلق</a>
                @elseif($exam->Status == 1)
                    <a href="/aa8363d57c99e7f220c94dea8192dd8c/status?examID={{$exam->ID}}&status=2"
                       class="ui green center aligned k button " style="padding: 10px;margin-left: 5px">مفتوح</a>
                @elseif($exam->Status == 2)
                    <a href="/aa8363d57c99e7f220c94dea8192dd8c/status?examID={{$exam->ID}}&status=0"
                       class="ui  center aligned k button " style="padding: 10px;margin-left: 5px">منتهي</a>
                @endif


                <br>
                <br>


            </div>
        @endforeach
        <br>

    </div>


        <script>

            $('.k.button').transition('horizontal flip', '0ms');
            $('.k.button').transition('horizontal flip', '1400ms');

        </script>
@stop

