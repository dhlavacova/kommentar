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


        let neuer_kommentar = `<div class= 'beitrag p-2'>${kommentar}<div class="like"><span class='like_count'>0</span> 
    </div></div>`;

        $('.komentare').append(neuer_kommentar);
        $('#text').val('');// es leert Textarea
    })
}

function data_speichern_DB() {

    $('#button').on('click', function (event) {
        location.reload()
        $.ajax({
            type: 'POST',
            url: "komentar_DB.php",
            data: {'data': kommentar},
            //  success: function(data) {
            //      //Wenn die Anfrage erfolgreich ausgeführt wird, repräsentiert die Antwort die Daten
            //
            //      $(".komentare").append(data);
            // }
        })
    });
}

function like() {
    $('.like').on('click', function () {

        let id = $(this).attr('id');//najde v rodici id cislo
        let likeElement = $(this); // vytahne v kterem elementru jsi...pomuze proti dvojimu kliknuti
        let likeCountElement = $(this).children('.like_count'); //vyjdu na rodice a z rodice hledam dite kolik ma like

        let count = likeCountElement.text(); // v count mam ulozeny aktualni pocet bodu
// hasClass ma tridu aktivni pak odecti, jinak pricti
        var odesli=0;

if ($(this).hasClass('active')){
    --count;
    odesli=0;
}
else {
    ++count;
    odesli=1;
}
        likeCountElement.text(count); //vypise pocet like

        $(this).toggleClass('active');


        $.ajax({
            type: 'POST',
            url: 'komentar_DB.php',
            data: {'id': id, 'odesli':odesli},
        })
        // TODO 1. ajax, stejne jako v data_speichern_DB, poslu ID a COUNT

        // Chces ulozit like do databaze?
        // Potrebuji zavolat server/php aby mi ulozil do databaze like, potrebuji poslat ID komentare?

        // TODO 2. Kdyz dam like, tak mi javascript nepovoli dat dalsi, toggle
    });
}


