@extends('result.master')

@section('result')

    <div class="ui inverted vertical masthead center aligned segment">


        <div class="ui text container">
            <h2> : نتيجة امتحانك هي </h2>

            <h1 class="ui center aligned inverted test button header" style="padding: 20px;">85 %</h1>
            <br>

            <h1>ناجح</h1>
        </div>

        <br> <br> <br> <br>

        <div class="ui huge primary button">مغادرة<i class="right arrow icon"></i></div>
    </div>


    <script>
        $('.test.button')
            .transition('horizontal flip', '0ms')
        ;
        $('.test.button')
            .transition('horizontal flip', '3000ms')
        ;
    </script>
@stop


