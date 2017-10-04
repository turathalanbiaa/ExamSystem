@extends('result.master')

@section('result')

    <div class="ui inverted vertical masthead center aligned segment">


        <div class="ui text container">

            <h2> : نتيجة امتحانك هي </h2>

            <h1 class="ui center aligned inverted test button header" style="padding: 20px;">{{$examination->Mark}}</h1>

            <br>

            <h1>{{$examination->Mark >= 50 ? "ناجح" : "راسب"}}</h1>

        </div>

        <br>

        <a href="/" class="ui huge primary button">الرئيسية<i class="right arrow icon"></i></a>
    </div>


    <script>

        $('.test.button').transition('horizontal flip', '0ms');
        $('.test.button').transition('horizontal flip', '1400ms');

    </script>
@stop


