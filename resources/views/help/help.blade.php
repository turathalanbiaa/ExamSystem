<!DOCTYPE html>
<html>
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>نتيجة الامتحان</title>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/styles/semantic.css')}}">
    <script src="{{asset('assets/scripts/jquery.min.js')}}"></script>
    <script src="{{asset('assets/scripts/semantic.js')}}"></script>

</head>
<body>


<div class="ui container centered">

            <div class="ui ordered vertical steps ">

                <div class="active step right alaigin ">
                    <div class="content ">
                        <div class="ui title">اسئلة الامتحان</div>
                        <br>
                        <div class="ui styled accordion">
                            <div class="title">
                                <i class="dropdown icon"></i>                                اسئلة الصح والخطأ
                            </div>
                            <div class="content">
                                <p class="transition hidden">يوجد ترك ضمني - تابع الملاحظات في بداية الاسئلة</p>
                            </div>
                            <div class="title">
                                <i class="dropdown icon"></i>الاختيارات
                            </div>
                            <div class="content ">
                                <p class="transition visible">يوجد ترك ضمني ايضأً - اذا اتممت الاجابة من هذا الجزء اضغط -ارسال الاجوب</p>
                            </div>

                        </div>

                    </div>
                </div>


                <div class="active step custom1">
                    <div class="content ">
                        <div class="ui title">المراجعة والتعديل</div>
                        <br>
                        <div class="ui styled accordion">
                            <div class="title">
                                <i class="dropdown icon"></i>تعديل اجابة
                            </div>
                            <div class="content">
                                <p class="transition hidden">ماعليك الا الرجوع الى اجابتك وتغييرها ثم الضغط على ارسال</p>
                            </div>
                            <div class="title ">
                                <i class="dropdown icon"></i>ترك سؤال
                            </div>
                            <div class="content ">
                                <p class="transition visible">يمكنك ترك السؤال من خلال الضغط على الزر " ترك " .. عليك التأكد من عدد الاسئلة التي يمكن تركها</p>
                            </div>

                        </div>

                    </div>
                </div>
                <br>
                <div class="active step">
                    <div class="content">
                        <div class="title">إرسال الاجوبة</div>
                        <div class="description">لايمكنك التراجع او تعديل جواب بعد ضغط هذا الزر</div>
                    </div>
                </div>
                <br>
                <div class="completed step">
                    <div class="content">
                        <div class="title">عرض النتيجة</div>
                        <div class="ui text">سوف يتم عرض نتيجة امتحانك</div>
                    </div>
                </div>
            </div>
        </div>


<script>
    $('.ui.accordion')
        .accordion()
    ;
</script>
</body>

</html>
