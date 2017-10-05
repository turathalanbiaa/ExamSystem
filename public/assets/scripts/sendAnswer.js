/**
 * Created by Emad on 10/3/2017.
 */

$("button[data-action='sendAnswer']").click(function ()
{
    var questionId = $(this).parent().parent().find('input[name=question_ID]:hidden').val();
    var answer = $(this).parent().parent().find('input[name=answer-'+questionId+']:checked').val();
    var _token = $(this).parent().parent().find('input[name=_token]:hidden').val();

    var checkbox = $(this).parent().parent().find(".ui.radio.checkbox");

    var button = $(this);
    button.addClass("disabled loading");


    $.ajax({
        type: "POST",
        url: '/answer',
        data: {questionId: questionId, answer: answer, _token:_token},
        timeout : 8000 ,
        datatype: 'json',
        success: function(result) {
            if (result["success"] == false)
            {
                var text = "لم تقم باختيار اي الجواب";
                snackbar(text,3000,"warning");
                checkbox.checkbox('uncheck');
            }

            button.removeClass("disabled loading");
        },
        error: function() {
            var text = "لم يتم ارسال الجواب";
            snackbar(text,3000,"error");
            checkbox.checkbox('uncheck');
            button.removeClass("disabled loading");
        } ,
        complete : function() {
            button.removeClass("disabled loading");
        }
    });


});