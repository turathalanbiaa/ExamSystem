/**
 * Created by Emad on 10/3/2017.
 */

$("button[data-action='leaveQuestion']").click(function ()
{
    var questionId = $(this).parent().parent().find('input[name=question_ID]:hidden').val();
    var _token = $(this).parent().parent().find('input[name=_token]:hidden').val();

    var checkbox = $(this).parent().parent().find(".ui.radio.checkbox");

    var button = $(this);
    button.addClass("disabled loading");



    $.ajax({
        type: "POST",
        url: '/leave',
        data: {questionId: questionId, _token:_token},
        timeout : 8000 ,
        datatype : 'json' ,
        success: function( result ) {
            if (result["success"] == false)
            {
                var text = "حدثت مشكلة اثناء ترك السؤال ! اعد المحاولة مرة اخرى";
                snackbar(text,3000,"warning");
            }

            if (result.success == true)
            {
                checkbox.checkbox('uncheck');
            }

            button.removeClass("disabled loading");
        },
        error: function() {
            var text = "حدثت مشكلة اثناء ترك السؤال ! اعد المحاولة مرة اخرى";
            snackbar(text,3000,"error");
            button.removeClass("disabled loading");
        } ,
        complete : function(){
            button.removeClass("disabled loading");
        }
    });
});