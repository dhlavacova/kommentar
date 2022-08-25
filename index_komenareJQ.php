<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pridej Komentar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="CSS/komentareJQ.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body>
<div class="container-sm p-3 my-sm-5">

    <h1 class="text-center">Dein Kommentar</h1>
    <div class="row">
        <div class="komentare d-flex flex-column mb-3">

  <?php
           include('komentar_DB.php');// die Kommentaren werden aus DB (PHP) eingelesen ?>

        </div>
        <div class="row">
            <div class=" formular d-flex p-2">
                <form action="" method="post">
                    <label>Deine Nachricht:</label>
                    <br>
                    <textarea id="text" placeholder="Dein Kommentar :)" rows="4" cols="50"></textarea>
                    <br>

                    <button id="button" type="button" class="btn btn-primary">Absenden</button>

                </form>

    </div>


        </div>
    </div>
</div>
<script src="JS/komentareJQ.js" type="text/javascript "></script>
</body>
</html>