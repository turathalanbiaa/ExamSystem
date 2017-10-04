<!DOCTYPE html>
<html>
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>نتيجة الامتحان</title>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/styles/semantic.css')}}">

    <style type="text/css">


        .masthead .logo.item img {
            margin-right: 1em;
        }
        .masthead .ui.menu .ui.button {
            margin-left: 0.5em;
        }
        .masthead h1.ui.header {
            margin-bottom: 0em;
            font-size: 4em;
            font-weight: normal;
        }
        .masthead h2 {
            font-size: 1.7em;
            font-weight: normal;
        }

        .ui.vertical.stripe {
            padding: 8em 0em;
        }
        .ui.vertical.stripe h3 {
            font-size: 2em;
        }
        .ui.vertical.stripe .button + h3,
        .ui.vertical.stripe p + h3 {
            margin-top: 3em;
        }

        .ui.vertical.stripe p {
            font-size: 1.33em;
        }

        .quote.stripe.segment {
            padding: 0em;
        }
        .quote.stripe.segment .grid .column {
            padding-top: 5em;
            padding-bottom: 5em;
        }

        .footer.segment {
            padding: 5em 0em;
        }



        @media only screen and (max-width: 700px) {

            .masthead h2 {
                margin-top: 0.5em;
                font-size: 1.5em;
            }
        }


    </style>

    <script src="{{asset('assets/scripts/jquery.min.js')}}"></script>
    <script src="{{asset('assets/scripts/semantic.js')}}"></script>

</head>

<body>

<!-- Page Contents -->
<div class="pusher">

    @yield('result')

    <div class="ui vertical stripe quote segment">
        <div class="ui equal width stackable internally celled grid">

            <div class="center aligned row">

                <div class="column">
                    <h3>نأمل ان يكون اداء الامتحان كان بشكل سهل </h3>
                    <p>لا داعي ان تتكلف عناء الحضور في قاعة إمتحانية حقيقية.. نحن وفرنا عليك الجهد والوقت وقمنا بإنشاء قاعة إمتحانية إفتراضية من خلالها نمتحن طلبتنا الأعزاء وجعلنا الرقيب ضميرهم الحي.</p>
                </div>


                <div class="column">
                    <p>                    نحن لا نقيدك بأستخدام جهاز معين للوصول الى موقعنا ومحتواه بل يمكنك اختيار ما يناسبك من الأجهزة (كومبيوتر أو جهاز لوحي أو موبايل) – وجميعها ستجد فيها سهولة في الوصول الى موقعنا.</p>
                </div>

            </div>

        </div>
    </div>

</div>

</body>

</html>
