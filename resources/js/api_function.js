

// Ajax
$(document).ready(function () {

    $('.form-generate-sdocument').on('submit', function (e) {

        var jobId = $(this).attr('id').split('-')[2];

        e.preventDefault();
        $("#spinner_loading_sdocument_"+ jobId).css("display", "block");
        $("#sdocument_generate_btn_"+ jobId).css("display", "none");
        $("#btn_history_"+ jobId).css("display", "none");
        $("#token_left").text(parseInt($( $("#token_left")).text()) - 1);
        $("#result_buttons_"+ jobId).css("display", "none");

        // Replace text-secondary to text-danger if 3 tokens left
        if (parseInt($( $("#token_left")).text()) <= 3) {
            $("#token_left").removeClass("text-secondary");
            $("#token_left").addClass("text-danger");
        }

        // If it's the last token change the text of token_left_text id 
        if (parseInt($( $("#token_left")).text()) == 1) {
            $("#token_left_text").text("Ceci est votre dernier token, pas de panique, vous pouvez en acheter d'autres !");
        }

        $("#sdocument_generate_btn_"+ jobId).text("Générer une autre lettre");

        // Récupérer les données cachées du job

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            data: $('#generate-sdocument-' + jobId).serialize(),
            url: "/api/sdocument/generator",
            success: function (response) {

            // Convertir la réponse de l'API en chaîne de caractères et remplacer les retours à la ligne par des balises <br>
            var motivation = response['motivation'].toString().replace(/\n/g, '<br>');

            // Affiche les boutons pour télécharger le PDF et le Word
            $("#result_buttons_"+ jobId).css("display", "block");

            $("#spinner_loading_sdocument_"+ jobId).css("display", "none");
            // Show generate button
            $("#sdocument_generate_btn_"+ jobId).css("display", "block");

            
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    // Fake sdocument home page (demo) / redirect to login page

    $('#form_generate_demo').on('submit', function (e) {
        e.preventDefault();

        // Show login form
        $("#login_form").css({
            display: "block",
            maxWidth: "500px"
          });          
        $("#form_generate_demo").css("display", "none");
        
    });

});
