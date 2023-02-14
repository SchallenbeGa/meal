// Ajax
$(document).ready(function () {
let cpt=0;
let show = 0;
    $('#form_chat').on('submit', function (e) {
        e.preventDefault(); 
        if(show==0){
            $('#question').html('<h5 class="card-title placeholder-glow"> <p>Hmm qu\'est ce que je vais bien pouvoir te demander...</p><span class="placeholder col-4"></span></h5><p class="card-text placeholder-glow"><span class="placeholder col-4"></span><span class="placeholder col-4"></span><span class="placeholder col-4"></span><span class="placeholder col-4"></span><span class="placeholder col-4"></span><span class="placeholder col-4"></span><span class="placeholder col-6"></span><p class="card-text placeholder-glow"><span class="placeholder col-4"></span><span class="placeholder col-4"></span><span class="placeholder col-4"></span><p class="card-text placeholder-glow"><span class="placeholder col-4"></span><span class="placeholder col-4"></span></p>');
            show++;
        }else{
            $('#question').html('<h5 class="card-title placeholder-glow"> <p>Hmm t\'en veux encore...</p><span class="placeholder col-4"></span></h5><p class="card-text placeholder-glow"><span class="placeholder col-4"></span><span class="placeholder col-4"></span><span class="placeholder col-4"></span><span class="placeholder col-4"></span><span class="placeholder col-4"></span><span class="placeholder col-4"></span><span class="placeholder col-6"></span><p class="card-text placeholder-glow"><span class="placeholder col-4"></span><span class="placeholder col-4"></span><span class="placeholder col-4"></span><p class="card-text placeholder-glow"><span class="placeholder col-4"></span><span class="placeholder col-4"></span></p>');
        }
        $('#question').html('<h5 class="card-title placeholder-glow"> <p>Hmm qu\'est ce que je vais bien pouvoir te demander...</p><span class="placeholder col-4"></span></h5><p class="card-text placeholder-glow"><span class="placeholder col-4"></span><span class="placeholder col-4"></span><span class="placeholder col-4"></span><span class="placeholder col-4"></span><span class="placeholder col-4"></span><span class="placeholder col-4"></span><span class="placeholder col-6"></span><p class="card-text placeholder-glow"><span class="placeholder col-4"></span><span class="placeholder col-4"></span><span class="placeholder col-4"></span><p class="card-text placeholder-glow"><span class="placeholder col-4"></span><span class="placeholder col-4"></span></p>');
        $("#form_chat").css("display", "none");
        $("#question_display").css("display", "block");
        $.ajax({
            type: "POST",
            data: $('#form_start_chat').serialize(),
            success: function (response) {
                console.log(response);
                $('#question').text(response);
                $('#input_question').val(response);
                $("#result_buttons").css("display", "block");
                $("#again").css("display", "block");

            },
            error: function (error) {
                console.log(error);
                $("#error_server").css("display", "block");
            }
        });
    });
    $('#question_display').on('submit', function (e) {
        e.preventDefault();
        $("#question_display").css("display", "none");
        $("#answer_display").css("display", "block");
        $("#answer_display").append('<p id="p_question_'+cpt+'" class="fs-lg opacity-70 pb-4 mb-3"></p><textarea type="text" id="disabled_answer_'+cpt+'" class="form-control" rows="5" disabled></textarea><p id="p_answer_'+cpt+'" class="fs-lg opacity-70 pb-4 mb-3 mt-3 alert-info"></p>');
        $('#disabled_answer_'+cpt).val($('#input_answer').val());
        $('#p_question_'+cpt).text($('#input_question').val());
        $('#p_answer_'+cpt).html('<h5 class="card-title placeholder-glow"> <p>Chargement...</p><span class="placeholder col-4"></span></h5><p class="card-text placeholder-glow"><span class="placeholder col-4"></span><span class="placeholder col-4"></span><span class="placeholder col-4"></span><span class="placeholder col-4"></span><span class="placeholder col-4"></span><span class="placeholder col-4"></span><span class="placeholder col-6"></span><p class="card-text placeholder-glow"><span class="placeholder col-4"></span><span class="placeholder col-4"></span><span class="placeholder col-4"></span><p class="card-text placeholder-glow"><span class="placeholder col-4"></span><span class="placeholder col-4"></span></p>');
        $.ajax({
            type: "POST",
            url : $('#next').attr('action'),
            data: $('#next').serialize(),
            success: function (response) {
                console.log(response);
                $('#p_answer_'+cpt).text(response);
                $('#form_chat').submit();
                $('#input_answer').val("");
                cpt++;
            },
            error: function (error) {
                console.log(error);
                $("#error_server").css("display", "block");

            }
        });
    });
});
