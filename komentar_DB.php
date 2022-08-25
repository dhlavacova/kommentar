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
//ulozeni dat (komentare) do databaze
if (isset($_POST['data']) && ($_POST['data'] !== '')) {
    $data = $_POST['data'];
    $statement = $pdo->prepare(
        "INSERT INTO kommentar.kommentar (kommentar_text) VALUE (?)"
    );
    $statement->execute([$data]);
}
//vytahnuti dat komentaru z databaze
$stmt = $pdo->query("SELECT kommentar_text FROM kommentar.kommentar");//Připravení dotazu
$vystup = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($vystup as $data){
    echo '<div class="p-2">'. $data['kommentar_text'] .'<br>' . '</div>';
}