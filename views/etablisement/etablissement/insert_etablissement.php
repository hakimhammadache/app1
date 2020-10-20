<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = "dbvic";
            
    //On essaie de se connecter
     $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
 ?>

<?php


$name = htmlspecialchars(trim($_POST['name']));
$lat = htmlspecialchars(trim($_POST['lat']));
$lng = htmlspecialchars(trim($_POST['lng']));
$cmne = htmlspecialchars(trim($_POST['cmne']));
$nat_etab = htmlspecialchars(trim($_POST['nat_etab']));
$etat_phy = htmlspecialchars(trim($_POST['etat_phy']));


$db->exec("INSERT INTO etabissement (nom_etab,localisation_lng,localisation_lat,id_commune,id_natur_etab,id_etat_ph) VALUES ('$name','$lng','$lat','$cmne','$nat_etab','$etat_phy');");
if ($db) {

  echo "ok";

}
$db = NULL;
?>