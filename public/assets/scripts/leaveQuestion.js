/**
 * Created by Emad on 10/3/2017.
 */

$("button[data-action='leaveQuestion']").click(function ()
{
    var questionId = $(this).parent().parent().find('input[name=question_ID]:hidden').val();
    var _token = $(this).parent().parent().find('input[name=_token]:hidden').val();

    $.ajax({
        type: "POST",
        url: '/leave',
        data: {questionId: questionId, _token:_token},
        success: function( result ) {
            if (result["success"] == false)
            {
                var text = "حدثت مشكلة اثناء ترك السؤال ! اعد المحاولة مرة اخرى";
                snackbar(text,3000,"warning");
            }

            if (result['success'] == true)
            {
                var text = "تم ترك الجواب";
                snackbar(text,3000,"success");
            }
        },
        errors: function() {
            var text = "حدثت مشكلة اثناء ترك السؤال ! اعد المحاولة مرة اخرى";
            snackbar(text,3000,"error");
        }
    });
});