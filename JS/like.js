$(function () {

    daumen = 0;
    $('img').on('click', function () {
        daumen = daumen + 1

        $('.daumen').text(daumen);
    });

    // daumen = 0;
    // $('img').on('click', function () {
    //     daumen = daumen + 1
    //
    //
    // })
})
