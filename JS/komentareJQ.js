$(function () {
    vypis_komentar();
    uloz_do_DB();
});
let textarea;

function vypis_komentar() {

    $('#tlacitko').on('click', function () {

        textarea = $('#zprava').val();
        let novaZprava = `<div class="p-2">${textarea}</div>`;

      $('.komentare').append(novaZprava);
        $('#zprava').val('');// es leert Textarea
    })
}

function uloz_do_DB() {

    $('#tlacitko').on('click', function (event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: "komentar_DB.php",
            data: {data: textarea},
           //  success: function(data) {
           //      //if request if made successfully then the response represent the data
           //
           //      $(".komentare").append(data);
           // }
        })
    });

}
