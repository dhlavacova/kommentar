$(function () {
    kommentar_auschreiben();
    data_speichern_DB();
});
let kommentar;

function kommentar_auschreiben() {

    $('#button').on('click', function () {

        kommentar = $('#text').val();
        let neuer_kommentar = `<div class="p-2">${kommentar}</div>`;

      $('.komentare').append(neuer_kommentar);
        $('#text').val('');// es leert Textarea
    })
}

function data_speichern_DB() {

    $('#button').on('click', function (event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: "komentar_DB.php",
            data: {data: kommentar},
           //  success: function(data) {
           //      //if request if made successfully then the response represent the data
           //
           //      $(".komentare").append(data);
           // }
        })
    });

}
