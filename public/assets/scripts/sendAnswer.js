/**
 * Created by Emad on 10/3/2017.
 */

$("button[data-action='sendAnswer']").click(function ()
{
    var questionId = $(this).parent().parent().find('input[name=question_ID]:hidden').val();
    var answer = $(this).parent().parent().find('input[name=answer-'+questionId+']:checked').val();
    var _token = $(this).parent().parent().find('input[name=_token]:hidden').val();

    var allRadio = $(this).parent().parent().find("input[type='radio']");

    var dimmer = $(this).parent().parent().find(".dimmer");
    dimmer.addClass("active");

    $.ajax({
        type: "POST",
        url: '/answer',
        data: {questionId: questionId, answer: answer, _token:_token},
        timeout : 8000 ,
        datatype: 'json',
        success: function(result) {
            if (result["success"] == false)
            {
                allRadio.prop('checked' , false);
                snackbar("لم يتم ارسال الاجابة , تحقق من الاتصال بالانترنت" , 3000 , "warning");
            }
        },
        error: function() {
            allRadio.prop('checked' , false);
            snackbar("لم يتم ارسال الاجابة , تحقق من الاتصال بالانترنت" , 3000 , "warning");
        } ,
        complete : function() {
            dimmer.removeClass("active");
        }
    });


});