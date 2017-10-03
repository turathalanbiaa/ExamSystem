/**
 * Created by Emad on 10/3/2017.
 */

$("button[data-action='leaveQuestion']").click(function ()
{
    var questionId = $(this).parent().parent().find('input[name=question_ID]:hidden').val();
    var _token = $(this).parent().parent().find('input[name=_token]:hidden').val();

    $.ajax({
        type: "POST",
        url: '/leaveQuestion',
        data: {questionId: questionId, _token:_token},
        success: function( msg ) {
        }
    });
});