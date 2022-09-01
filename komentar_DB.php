<?php


$host = "localhost";
$db = 'kommentar';
$user = "dana";
$password = "dana";
try {
    $dsn = "mysql:host=$host;port=3306;dbname=$db;";
    // make a database connection
    $pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
    die($e->getMessage());
}
// Die Data (Kommentaren) werden in DB gespeichert
if (isset($_POST['data']) && ($_POST['data'] !== '')) {
    $data = $_POST['data'];
    $statement = $pdo->prepare(
        "INSERT INTO kommentar.kommentar (kommentar_text) VALUE (?)"
    );
    $statement->execute([$data]);
}
// Die Kommentaren sind aus DB erhielten
$stmt = $pdo->query("SELECT kommentar_text, id  FROM kommentar.kommentar");
$vystup = $stmt->fetchAll(PDO::FETCH_ASSOC); // Erhalt alle kommentaren (fetch - nur 1 Kommentar)
foreach($vystup as $data){
    $pocetLike = 0; // TODO ziskat pocet liku
    echo '<div class=" beitrag p-2 ">'. (strip_tags($data['kommentar_text'])) . '<br>' .
            "<div id = '{$data['id']}'>
                <img src='img/like.svg' class='like' alt='like' width= '15' height='12' >
                <span class='like_count'>$pocetLike</span>
            </div>
        </div>";
}