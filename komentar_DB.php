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
        "INSERT INTO kommentar.kommentar (kommentar_text,daumen, active_like) VALUE (?,?,?)"
    );
    $statement->execute([$data, 0,0]);
}

//die like wird gespeichert
if (isset ($_POST['id']) &&$_POST['odesli']) {
    $id = $_POST['id'];
   $odesli = $_POST['odesli'];
  if
  ($odesli ===0) {
       $statement = $pdo->prepare(
           'UPDATE kommentar.kommentar set daumen =daumen+1, active_like=? where  id_kommentar=?'
                 );
       $statement->execute([1,$id]);
   }
   else ($odesli===1) {
       $stmt = $pdo->prepare(
           'UPDATE kommentar.kommentar set daumen =daumen-1, active_like=? where  id_kommentar=?'
       )
       $stmt->execute([0, $id]);
   }
}




// Die Kommentaren sind aus DB erhielten
$stmt = $pdo->query("SELECT kommentar_text, id_kommentar, daumen, active_like FROM kommentar.kommentar");
$vystup = $stmt->fetchAll(PDO::FETCH_ASSOC); // Erhalt alle kommentaren (fetch - nur 1 Kommentar)
foreach ($vystup as $data) {
    // $daumen=0 ; // TODO ziskat pocet liku
    if ($data['active_like']===1){
    echo "<div class= 'beitrag p-2 '>" . (strip_tags($data['kommentar_text'])) .
        "<div class='like active' id = '{$data['id_kommentar']}'>
                
            <span class='like_count'>{$data['daumen']}</span> 
            </div>
        </div>";
}
    else {
        echo "<div class= 'beitrag p-2 '>" . (strip_tags($data['kommentar_text'])) .
            "<div class='like' id = '{$data['id_kommentar']}'>
                
            <span class='like_count'>{$data['daumen']}</span> 
            </div>
        </div>";
    }
}

