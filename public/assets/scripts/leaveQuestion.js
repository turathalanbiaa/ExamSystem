/**
 * Created by Emad on 10/3/2017.
 */

$("button[data-action='leaveQuestion']").click(function ()
{
    var questionId = $(this).parent().parent().find('input[name=question_ID]:hidden').val();
    var _token = $(this).parent().parent().find('input[name=_token]:hidden').val();

    var allRadio = $(this).parent().parent().find("input[type='radio']");

    var dimmer = $(this).parent().parent().find(".dimmer");
    dimmer.addClass("active");

    $.ajax({
        type: "POST",
        url: '/leave',
        data: {questionId: questionId, _token:_token},
        timeout : 8000 ,
        datatype : 'json' ,
        success: function( result ) {
            if (result["success"] == false)
            {
                var text = "لم يتم ترك السؤال , تحقق من الاتصال بالانترنت";
                snackbar(text,3000,"warning");
            }

            if (result.success == true)
            {
                allRadio.prop('checked' , false);
            }
        },
        error: function() {
            var text = "حدثت مشكلة اثناء ترك السؤال ! اعد المحاولة مرة اخرى";
            snackbar(text,3000,"error");
        } ,
        complete : function(){
            dimmer.removeClass("active");
        }
    });


});