/**
 * Created by Emad on 10/3/2017.
 */

$("button[data-action='sendAnswer']").click(function ()
{
    var questionId = $(this).parent().parent().find('input[name=question_ID]:hidden').val();
    var answer = $(this).parent().parent().find('input[name=answer-'+questionId+']:checked').val();
    var _token = $(this).parent().parent().find('input[name=_token]:hidden').val();

    $.ajax({
        type: "POST",
        url: '/answer',
        data: {questionId: questionId, answer: answer, _token:_token},
        success: function( osm ) {
            console.log(osm);
        },
        errors: function( osm ) {
            console.log(osm);
        }
    });
});