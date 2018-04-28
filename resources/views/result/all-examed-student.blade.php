@extends('result.CPmaster')
@section('result')

    <div class="ui  vertical masthead center aligned segment">
        <h2>طلبة امتحان : {{$exam->Name}}</h2>
        <br>
        <br>
        <?php
        $i = 1;
        ?>

        @foreach($students as $student)







            <div class="ui  right  aligned container">

                <div class="ui  right aligned stackable grid"  style="background-color: #0d71bb; color: #ffffff">




                    <div class="four wide test button header  column">

                        <a href="/aa8363d57c99e7f220c94dea8192dd8c/show-answers/?user_id={{$student->user_id}}&examID={{$exam->ID}}"
                           class="ui center aligned inverted test button header" style="padding: 10px">
                            <h4>
                                عرض الاجوبة
                            </h4>


                        </a>
                    </div>

                    <div class="three wide test button header  column">
                        <h2> {{$student->code}}</h2>



                    </div>
                    <div class="seven wide  column">
                       <h2>{{$student->username}}</h2>

                    </div>
                    <div class="one wide  column" style="background-color: yellow; color:black;text-align: right">
                        <h2>  {{$student->Mark}}</h2>



                    </div>
                    <div class="one wide  column" style="background-color:#bab4bd; color:black;text-align: right" >
                        <h2>
                            <?php
                            echo $i;
                            ?>
                        </h2>


                    </div>




                </div>





                <br>
                <br>


            </div>
            <?php
            $i = $i + 1;
            ?>


        @endforeach

    </div>

    <script>

            $('.k.button').transition('horizontal flip', '0ms');
            $('.k.button').transition('horizontal flip', '1400ms');

        </script>
@stop

