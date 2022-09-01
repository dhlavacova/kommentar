$(function () {
    kommentar_auschreiben();
    data_speichern_DB();
    like();
});
let kommentar;
let daumen = 0

function kommentar_auschreiben() {

    $('#button').on('click', function () {

        kommentar = $('#text').val();


        let neuer_kommentar = `<div class= 'beitrag p-2'>${kommentar}<div><img src="img/like.svg" alt="like" width= "15" height="12"> <div id="">
    </div></div></div>`;

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

function like() {
    $('.like').on('click', function () {
        let id = $(this).parent().attr('id');//najde v rodici id cislo
        let likeElement = $(this); // vytahne v kterem elementru jsi...pomuze proti dvojimu kliknuti
        let likeCountElement = $(this).parent().children('.like_count'); //vyjdu na rodice a z rodice hledam dite kolik ma like

        let count = likeCountElement.text(); // v count mam ulozeny aktualni pocet bodu

        likeCountElement.text(++count); //vypise pocet like

        // TODO 1. ajax, stejne jako v data_speichern_DB, poslu ID a COUNT

        // Chces ulozit like do databaze?
        // Potrebuji zavolat server/php aby mi ulozil do databaze like, potrebuji poslat ID komentare?

        // TODO 2. Kdyz dam like, tak mi javascript nepovoli dat dalsi, toggle
    });
}


